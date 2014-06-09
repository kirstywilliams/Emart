<?php
	// Presentation tier class that deals with administering order details
	class AdminOrderDetails
	{
		// Public variables available in smarty template
		public $mOrderId;
		public $mOrderInfo;
		public $mOrderDetails;
		public $mEditEnabled;
		public $mOrderStatusOptions;
		public $mLinkToAdmin;
		public $mLinkToOrdersAdmin;
		public $mCustomerInfo;
		public $mTotalCost;
		public $mProcessButtonText;
		public $mAuditTrail;
		
		// Class constructor
		public function __construct()
		{
			// Get the back link from session
			$this->mLinkToOrdersAdmin = $_SESSION['link_to_orders_admin'];
			$this->mLinkToAdmin = Link::ToAdmin();
			
			// We receive the order ID in the query string
			if (isset ($_GET['OrderId']))
				$this->mOrderId = (int) $_GET['OrderId'];
			else
				trigger_error('OrderId paramater is required');
			
			$this->mOrderStatusOptions = Orders::$mOrderStatusOptions;
		}
		
		// Initializes class members
		public function init()
		{
			if (isset ($_GET['submitUpdate']))
			{
				Orders::UpdateOrder($this->mOrderId, $_GET['status'],
				$_GET['comments'], $_GET['authCode'], $_GET['reference'], 
				$_GET['customerFirstName'], $_GET['customerSurname'], 
				$_GET['addressLineOne'], $_GET['addressTown'], $_GET['addressCity'],
				$_GET['addressCounty'], $_GET['addressPostCode'],
				$_GET['customerEmail'], $_GET['customerTelephone']);
			}			
			
			if (isset ($_GET['submitProcessOrder']))
			{
				$processor = new OrderProcessor($this->mOrderId);
				$processor->Process();
			}
			
			$this->mOrderInfo = Orders::GetOrderInfo($this->mOrderId);
			$this->mOrderDetails = Orders::GetOrderDetails($this->mOrderId);
			$this->mCustomerInfo = Customer::Get($this->mOrderInfo['customerID']);
			
			$this->mTotalCost = $this->mOrderInfo['totalAmount'];
			$this->mTotalCost += $this->mOrderInfo['shippingCost'];
			$this->mAuditTrail = Orders::GetAuditTrail($this->mOrderId);
			
			// Format the values
			$this->mTotalCost = number_format($this->mTotalCost, 2, '.', '');
			
			if ($this->mOrderInfo['orderStatus'] == 'Awaiting Stock Confirmation')
				$this->mProcessButtonText = 'Confirm Stock for Order';
			elseif ($this->mOrderInfo['orderStatus'] == 'Awaiting Despatch Confirmation')
				$this->mProcessButtonText = 'Confirm Shipment for Order';
			
			// Value which specifies whether to enable or disable edit mode
			if (isset ($_GET['submitEdit']))
				$this->mEditEnabled = true;
			else
				$this->mEditEnabled = false;
		}
	}
?>