<?php
	/* Main class, used to obtain order information,
	run pipeline sections, audit orders, etc. */
	class OrderProcessor
	{
		public $mOrderInfo;
		public $mOrderDetailsInfo;
		public $mCustomerInfo;
		public $mContinueNow;
		
		private $_mCurrentPipelineSection;
		private $_mOrderProcessStage;
		
		// Class constructor
		public function __construct($orderId)
		{
			// Get order
			$this->mOrderInfo = Orders::GetOrderInfo($orderId);
			
			if (empty ($this->mOrderInfo['shippingID']))
				$this->mOrderInfo['shippingID'] = -1;

			// Get order details
			$this->mOrderDetailsInfo = Orders::GetOrderDetails($orderId);
			
			// Get customer associated with the processed order
			$this->mCustomerInfo = Customer::Get($this->mOrderInfo['customerID']);
			
			$credit_card = new SecureCard();
			$credit_card->LoadEncryptedDataAndDecrypt(
			$this->mCustomerInfo['creditCard']);
			$this->mCustomerInfo['creditCard'] = $credit_card;
		}
		
		/* Process is called from presentation/checkout_info.php and
		presentation/admin_orders.php to process an order */
		public function Process()
		{
			// Configure processor
			$this->mContinueNow = true;
			
			// Log start of execution
			$this->CreateAudit('Order Processor started.', 10000);
			
			// Process pipeline section
			try
			{
				while ($this->mContinueNow)
				{
					$this->mContinueNow = false;
					$this->_GetCurrentPipelineSection();
					$this->_mCurrentPipelineSection->Process($this);
				}
			}
			catch(Exception $e)
			{
				$this->MailAdmin('Order Processing error occurred.',
				'Exception: "' . $e->getMessage() . '" on ' .
				$e->getFile() . ' line ' . $e->getLine(),
				$this->_mOrderProcessStage);
				$this->CreateAudit('Order Processing error occurred.', 10002);
				throw new Exception('Error occurred, order aborted. ' .
				'Details mailed to administrator.');
			}
			$this->CreateAudit('Order Processor finished.', 10001);
		}
		
		// Adds audit message
		public function CreateAudit($message, $code)
		{
			Orders::CreateAudit($this->mOrderInfo['orderID'], $message, $code);
		}
		
		// Builds e-mail message
		public function MailAdmin($subject, $message, $sourceStage)
		{
			$to = ADMIN_EMAIL;
			$headers = 'From: ' . ORDER_PROCESSOR_EMAIL . "\r\n";
			$body = 'Message: ' . $message . "\n" .
			'Source: ' . $sourceStage . "\n" .
			'Order ID: ' . $this->mOrderInfo['orderID'];
			
			$result = mail($to, $subject, $body, $headers);
			if ($result === false)
			{
				throw new Exception ('Failed sending this mail to administrator:' .
				"\n" . $body);
			}
		}
		
		// Gets current pipeline section
		private function _GetCurrentPipelineSection()
		{
			if ($this->mOrderInfo['orderStatus'] == 'Received')
			{
				$this->_mOrderProcessStage = $this->mOrderInfo['orderStatus'];
				$this->_mCurrentPipelineSection = new PsInitialNotification();
			}
			elseif ($this->mOrderInfo['orderStatus'] == 'Checking Funds')
			{
				$this->_mOrderProcessStage = $this->mOrderInfo['orderStatus'];
				$this->_mCurrentPipelineSection = new PsCheckFunds();
			}
			elseif ($this->mOrderInfo['orderStatus'] == 'Notifying Stock Check')
			{
				$this->_mOrderProcessStage = $this->mOrderInfo['orderStatus'];
				$this->_mCurrentPipelineSection = new PsCheckStock();
			}
			elseif ($this->mOrderInfo['orderStatus'] == 'Awaiting Stock Confirmation')
			{
				$this->_mOrderProcessStage = $this->mOrderInfo['orderStatus'];
				$this->_mCurrentPipelineSection = new PsStockOk();
			}
			elseif ($this->mOrderInfo['orderStatus'] == 'Awaiting Payment')
			{
				$this->_mOrderProcessStage = $this->mOrderInfo['orderStatus'];
				$this->_mCurrentPipelineSection = new PsTakePayment();
			}
			elseif ($this->mOrderInfo['orderStatus'] == 'Notifying Warehouse Despatch')
			{
				$this->_mOrderProcessStage = $this->mOrderInfo['orderStatus'];
				$this->_mCurrentPipelineSection = new PsShipGoods();
			}
			elseif ($this->mOrderInfo['orderStatus'] == 'Awaiting Despatch Confirmation')
			{
				$this->_mOrderProcessStage = $this->mOrderInfo['orderStatus'];
				$this->_mCurrentPipelineSection = new PsShipOk();
			}
			elseif ($this->mOrderInfo['orderStatus'] == 'Notifying Customer')
			{
				$this->_mOrderProcessStage = $this->mOrderInfo['orderStatus'];
				$this->_mCurrentPipelineSection = new PsFinalNotification();
			}
			elseif ($this->mOrderInfo['orderStatus'] == 'Complete')
			{
				$this->_mOrderProcessStage = 100;
				throw new Exception('Order already been completed.');
			}
			else
			{
				$this->_mOrderProcessStage = 100;
				throw new Exception('Unknown pipeline section requested.');
			}
		}
		
		// Set order status
		public function UpdateOrderStatus($status)
		{
			Orders::UpdateOrderStatus($this->mOrderInfo['orderID'], $status);
			$this->mOrderInfo['orderStatus'] = $status;
		}
		
		// Set order's authorisation code and reference code
		public function SetAuthCodeAndReference($authCode, $reference)
		{
			Orders::SetOrderAuthCodeAndReference($this->mOrderInfo['orderID'],
			$authCode, $reference);
			$this->mOrderInfo['authCode'] = $authCode;
			$this->mOrderInfo['reference'] = $reference;
		}
		
		// Set order's ship date
		public function SetDateShipped()
		{
			Orders::SetDateShipped($this->mOrderInfo['orderID']);
			$this->mOrderInfo['shippedOn'] = date('Y-m-d');
		}
		
		// Send e-mail to the customer
		public function MailCustomer($subject, $body)
		{
			$to = $this->mCustomerInfo['emailAddress'];
			$headers = 'From: ' . CUSTOMER_SERVICE_EMAIL . "\r\n";
			$result = mail($to, $subject, $body, $headers);
			
			if ($result === false)
			{
				throw new Exception ('Unable to send e-mail to customer.');
			}
		}
		
		// Send e-mail to the supplier
		public function MailSupplier($subject, $body)
		{
			$to = SUPPLIER_EMAIL;
			$headers = 'From: ' . ORDER_PROCESSOR_EMAIL . "\r\n";
			$result = mail($to, $subject, $body, $headers);
			
			if ($result === false)
			{
				throw new Exception ('Unable to send e-mail to warehouse.');
			}
		}
		
		// Returns a string that contains the customer's address
		public function GetCustomerAddressAsString()
		{
			$new_line = "\n";
			$address_details = $this->mCustomerInfo['firstname'] . ' ' . $this->mCustomerInfo['surname'] . $new_line .
			$this->mCustomerInfo['addressLineOne'] . $new_line .
			$this->mCustomerInfo['town'] . $new_line .
			$this->mCustomerInfo['city'] . $new_line .
			$this->mCustomerInfo['county'] . $new_line .
			$this->mCustomerInfo['postcode'];
			return $address_details;
		}
		
		// Returns a string that contains the order details
		public function GetOrderAsString($withCustomerDetails = true)
		{
			$total_cost = 0.00;
			$order_details = '';
			$new_line = "\n";
			
			if ($withCustomerDetails)
			{
				$order_details = 'Customer address:' . $new_line .
				$this->GetCustomerAddressAsString() .
				$new_line . $new_line;
				$order_details .= 'Customer credit card:' . $new_line .
				$this->mCustomerInfo['creditCard']->CardNumberX .
				$new_line . $new_line;
			}
			
			foreach ($this->mOrderDetailsInfo as $order_detail)
			{
				$order_details .= $order_detail['orderQuantity'] . ' ' .
				$order_detail['itemName'] . '(' .
				$order_detail['attributes'] . ') £' .
				$order_detail['price'] . ' each, total cost £' .
				number_format($order_detail['subtotal'],
				2, '.', '') . $new_line;
				$total_cost += $order_detail['subtotal'];
			}
			
			// Add shipping cost
			if ($this->mOrderInfo['shippingID'] != -1)
			{
				$order_details .= 'Shipping: ' . $this->mOrderInfo['shippingType'] .
				$new_line;
				$total_cost += $this->mOrderInfo['shippingCost'];
			}
			
			$order_details .= $new_line . 'Total order cost: £' .
			number_format($total_cost, 2, '.', '');
			return $order_details;
		}	
			
			
			
	}
?>