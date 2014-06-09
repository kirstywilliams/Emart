<?php
	class CustomerDetails
	{
		// Public attributes
		public $mEditMode = 0;
		public $mEmail;
		public $mFirstName;
		public $mSurname;
		public $mPassword;
		public $mTelephone;
		public $mAddressLineOne;
		public $mTown;
		public $mCity;
		public $mCounty;
		public $mPostCode;
		
		public $mFirstNameError = 0;
		public $mSurnameError = 0;
		public $mEmailAlreadyTaken = 0;
		public $mEmailError = 0;
		public $mPasswordError = 0;
		public $mPasswordConfirmError = 0;
		public $mPasswordMatchError = 0;
		public $mAddressLineOneError = 0;
		public $mTownError = 0;
		public $mCityError = 0;
		public $mCountyError = 0;
		public $mPostCodeError = 0;
		public $mTelephoneError = 0;
		
		public $mLinkToAccountDetails;
		public $mLinkToCancelPage;
		
		// Private attributes
		private $_mErrors = 0;
		
		// Class constructor
		public function __construct()
		{
			// Check if we have new user or editing existing customer details
			if (Customer::IsAuthenticated())
				$this->mEditMode = 1;
			
			if ($this->mEditMode == 0)
				$this->mLinkToAccountDetails = Link::ToRegisterCustomer();
			else
				$this->mLinkToAccountDetails = Link::ToAccountDetails();
			
			// Set the cancel page
			if (isset ($_SESSION['customer_cancel_link']))
				$this->mLinkToCancelPage = $_SESSION['customer_cancel_link'];
			else
				$this->mLinkToCancelPage = Link::ToIndex();
			
			// Check if we have submitted data
			if (isset ($_POST['sendit']))
			{
				// First name cannot be empty
				if (empty ($_POST['firstname']))
				{
					$this->mFirstNameError = 1;
					$this->_mErrors++;
				}
				else
					$this->mFirstName = $_POST['firstname'];
					
				// Surname cannot be empty
				if (empty ($_POST['surname']))
				{
					$this->mSurnameError = 1;
					$this->_mErrors++;
				}
				else
					$this->mSurname = $_POST['surname'];
				
				
				if (($this->mEditMode == 0 && empty ($_POST['email'])))
				
				{
					$this->mEmailError = 1;
					$this->_mErrors++;
				}
				else
					$this->mEmail = $_POST['email'];
				
				// Password cannot be empty
				if (empty ($_POST['password']))
				{
					$this->mPasswordError = 1;
					$this->_mErrors++;
				}
				else
					$this->mPassword = $_POST['password'];
				
				// Password confirm cannot be empty
				if (empty ($_POST['passwordConfirm']))
				{
					$this->mPasswordConfirmError = 1;
					$this->_mErrors++;
				}
				else
					$password_confirm = $_POST['passwordConfirm'];
				
				// Password and password confirm should be the same
				if (!isset ($password_confirm) ||
				$this->mPassword != $password_confirm)
				{
					$this->mPasswordMatchError = 1;
					$this->_mErrors++;
				}
				
				// Telephone cannot be empty
				if (empty ($_POST['telephone']))
				{
					$this->mTelephoneError = 1;
					$this->_mErrors++;
				}
				else
					$this->mTelephone = $_POST['telephone'];
				
				// Street Address cannot be empty
				if (empty ($_POST['addressLineOne']))
				{
					$this->mAddressLineOneError = 1;
					$this->_mErrors++;
				}
				else
					$this->mAddressLineOne = $_POST['addressLineOne'];
					
				// Town cannot be empty
				if (empty ($_POST['town']))
				{
					$this->mTownError = 1;
					$this->_mErrors++;
				}
				else
					$this->mTown = $_POST['town'];
				
				// City cannot be empty
				if (empty ($_POST['city']))
				{
					$this->mCityError = 1;
					$this->_mErrors++;
				}
				else
					$this->mCity = $_POST['city'];
					
				// County cannot be empty
				if (empty ($_POST['county']))
				{
					$this->mCountyError = 1;
					$this->_mErrors++;
				}
				else
					$this->mCounty = $_POST['county'];
					
				// Postcode cannot be empty
				if (empty ($_POST['postcode']))
				{
					$this->mPostCodeError = 1;
					$this->_mErrors++;
				}
				else
					$this->mPostCode = $_POST['postcode'];
			}
		}
		
		public function init()
		{
			// If we have submitted data and no errors in submitted data
			if ((isset ($_POST['sendit'])) && ($this->_mErrors == 0))
			{
				// Check if we have any customer with submitted email...
				$customer_read = Customer::GetLoginInfo($this->mEmail);
				
				/* ...if we have one and we are in 'new user' mode then
				email already taken error */
				if ((!(empty ($customer_read['customerID']))) &&
				($this->mEditMode == 0))
				{
					$this->mEmailAlreadyTaken = 1;
					return;
				}
				
				// We have a new user or we are updating an existing user's details
				if ($this->mEditMode == 0)
				{
					Customer::Add($this->mFirstName, $this->mSurname, $this->mEmail, $this->mPassword,
									$this->mAddressLineOne, $this->mTown, $this->mCity, $this->mCounty, 
									$this->mPostCode, $this->mTelephone);
				}
				else
					Customer::UpdateAccountDetails($this->mFirstName, $this->mSurname, $this->mEmail,
					$this->mPassword,$this->mTelephone, $this->mAddressLineOne, 
					$this->mTown, $this->mCity, $this->mCounty, $this->mPostCode);
				
				header('Location:' . $this->mLinkToCancelPage);
				exit();
			}
			
			if ($this->mEditMode == 1 && !isset ($_POST['sendit']))
			{
				// We are editing an existing customer's details
				$customer_data = Customer::Get();
				$this->mFirstName = $customer_data['firstname'];
				$this->mSurname = $customer_data['surname'];
				$this->mEmail = $customer_data['emailAddress'];
				$this->mTelephone = $customer_data['telephoneNumber'];
				$this->mAddressLineOne = $customer_data['addressLineOne'];
				$this->mTown = $customer_data['town'];
				$this->mCity = $customer_data['city'];
				$this->mCounty = $customer_data['county'];
				$this->mPostCode = $customer_data['postcode'];
			}
		}
	}
?>