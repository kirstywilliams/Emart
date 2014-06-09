<?php
	class CustomerLogged
	{
		// Public attributes
		public $mCustomerName;
		public $mPaymentAction = 'Add';
		public $mLinkToAccountDetails;
		public $mLinkToPaymentDetails;
		public $mLinkToLogout;
		public $mSelectedMenuItem;
		
		// Class constructor
		public function __construct()
		{
			$this->mLinkToAccountDetails = Link::ToAccountDetails();
			$this->mLinkToPaymentDetails = Link::ToPaymentDetails();
			$this->mLinkToLogout = Link::Build('index.php?Logout');
			
			if (isset ($_GET['AccountDetails']))
				$this->mSelectedMenuItem = 'account';
			elseif (isset ($_GET['PaymentDetails']))
				$this->mSelectedMenuItem = 'payment-details';
		}
		
		public function init()
		{
			if (isset ($_GET['Logout']))
			{
				Customer::Logout();
				header('Location:' . $_SESSION['link_to_last_page_loaded']);
				exit();
			}
			
			$customer_data = Customer::Get();
			
			$this->mCustomerName = $customer_data['firstname'];
			
			if (!(empty ($customer_data['creditCard'])))
				$this->mPaymentAction = 'Change';
		}
	}
?>