<?php
	/* Presentation tier class that supports customer administration
	functionality */
	class AdminCustomers
	{
		// Public variables available in smarty template
		public $mCustomersCount;
		public $mCustomers;
		public $mErrorMessage;
		public $mLinkToCustomersAdmin;
		
		// Private attributes
		private $_mAction;
		private $_mActionedCustomerID;
		
		// Class constructor
		public function __construct()
		{			
			foreach ($_POST as $key => $value)
				// If a submit button was clicked ...
				if (substr($key, 0, 6) == 'submit')
				{
					/* Get the position of the last '_' underscore from submit button name
					e.g strtpos('submit_edit_prod_1', '_') is 17 */
					$last_underscore = strrpos($key, '_');
					
					/* Get the scope of submit button
					(e.g 'edit_cust' from 'submit_edit_cust_1') */
					$this->_mAction = substr($key, strlen('submit_'),
							$last_underscore - strlen('submit_'));
					
					/* Get the customer id targeted by submit button
					(the number at the end of submit button name)
					e.g '1' from 'submit_edit_cust_1' */
					$this->_mActionedCustomerID = (int)substr($key, $last_underscore + 1);
					break;
				}
				
			$this->mLinkToCustomersAdmin = Link::ToCustomersAdmin();
			$this->mCustomers = Customer::GetCustomersList();
		}
		
		public function init()
		{									
			// If adding a new customer ...
			if ($this->_mAction == 'add_cust')
			{
				$customer_firstname = $_POST['customer_first_name'];
				$customer_surname = $_POST['customer_surname'];
				$customer_email = $_POST['customer_email'];
				$customer_password = $_POST['customer_password'];
				$customer_address_line_one = $_POST['customer_address_line_one'];
				$customer_town = $_POST['customer_town'];
				$customer_city = $_POST['customer_city'];
				$customer_county = $_POST['customer_county'];
				$customer_postcode = $_POST['customer_postcode'];
				$customer_telephone = $_POST['customer_telephone'];
				
				if ($customer_firstname == null)
					$this->mErrorMessage = 'First name is empty';
				if ($customer_surname == null)
					$this->mErrorMessage = 'Surname is empty';
				if ($customer_email == null || !preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][_\.0-9a-zA-Z-]*)$/i",$customer_email))
					$this->mErrorMessage = 'Please correct the email address';
				if ($customer_password == null)
					$this->mErrorMessage = 'Password is empty';
				if ($customer_address_line_one == null)
					$this->mErrorMessage = 'Street Address is empty';
				if ($customer_town == null)
					$this->mErrorMessage = 'Town is empty';
				if ($customer_city == null)
					$this->mErrorMessage = 'City is empty';
				if ($customer_county == null)
					$this->mErrorMessage = 'County is empty';
				if ($customer_postcode == null || strlen($customer_postcode) > 8)
					$this->mErrorMessage = 'Please correct the post code';
				if ($customer_telephone == null || strlen($customer_telephone) > 11)
					$this->mErrorMessage = 'Please correct the telephone number';
			
				if ($this->mErrorMessage == null)
				{
					require_once BUSINESS_DIR . 'password_hasher.php';
					
					$hashed_password = PasswordHasher::Hash($customer_password);
					
					Customer::AddCustomer($customer_firstname, $customer_surname,
										$customer_email, $hashed_password, $customer_password,
										$customer_address_line_one, $customer_town,
										$customer_city, $customer_county,
										$customer_postcode, $customer_telephone);
					
					header('Location: ' . htmlspecialchars_decode(
					$this->mLinkToCustomersAdmin));
				}
			}
			
			// If we want to see a customers details
			if ($this->_mAction == 'edit_cust')
			{
				header('Location: ' . htmlspecialchars_decode(
					Link::ToCustomerAdmin($this->_mActionedCustomerID)));
			
				exit();
			}
			$this->mCustomers = Customer::GetCustomersList();
			$this->mCustomersCount = count($this->mCustomers);
		}
	}
?>