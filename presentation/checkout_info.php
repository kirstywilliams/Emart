<?php
	// Class that supports the checkout page
	class CheckoutInfo
	{
		// Public attributes
		public $mCartItems;
		public $mTotalAmount;
		public $mCreditCardNote;
		public $mOrderButtonVisible;
		public $mNoShippingAddress = 'no';
		public $mNoCreditCard = 'no';
		public $mPlainCreditCard;
		public $mShippingRegion;
		public $mLinkToCheckout;
		public $mLinkToCart;
		public $mLinkToContinueShopping;
		public $mShippingInfo;
		
		// Class constructor
		public function __construct()
		{
			$this->mLinkToCheckout = Link::ToCheckout();
			$this->mLinkToCart = Link::ToCart();
			$this->mLinkToContinueShopping = $_SESSION['link_to_last_page_loaded'];
		}
		
		public function init()
		{
			// Set members for use in the Smarty template
			$this->mCartItems = ShoppingCart::GetCartProducts(GET_CART_PRODUCTS);
			$this->mTotalAmount = ShoppingCart::GetTotalAmount();
			$this->mCustomerData = Customer::Get();
			
			// If the Place Order button was clicked, save the order to database ...
			if(isset ($_POST['place_order']))
			{

				// Create the order and get the order ID
				$order_id = ShoppingCart::CreateOrder(
				$this->mCustomerData['customerID'],
				(int)$_POST['shipping']);
	
				// On success head to an order successful page
				$redirect_to = Link::ToOrderDone();
				
				// Create new OrderProcessor instance
				$processor = new OrderProcessor($order_id);
				try
				{
					$processor->Process();
				}
				catch (Exception $e)
				{
					// If an error occurs, head to an error page
					$redirect_to = Link::ToOrderError();
				}
				
				// Redirection to the order processing result page
				header('Location: ' . $redirect_to);
				
				exit();
			}
			
			// We allow placing orders only if we have complete customer details
			if (empty ($this->mCustomerData['creditCard']))
			{
				$this->mOrderButtonVisible = 'disabled="disabled"';
				$this->mNoCreditCard = 'yes';
			}
			else
			{
				$this->mPlainCreditCard = Customer::DecryptCreditCard(
				$this->mCustomerData['creditCard']);
				$this->mCreditCardNote = 'Credit card to use: ' . $this->mPlainCreditCard['card_type'] . '<br />Card number: ' . $this->mPlainCreditCard['card_number_x'];
			}
			
			if (empty ($this->mCustomerData['addressLineOne']))
			{
				$this->mOrderButtonVisible = 'disabled="disabled"';
				$this->mNoShippingAddress = 'yes';
			}
			
			if ($this->mNoCreditCard == 'no' && $this->mNoShippingAddress == 'no')
			{
				$this->mShippingInfo = Orders::GetShippingInfo();
			}
		}
	}
?>