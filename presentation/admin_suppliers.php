<?php

	/* Presentation tier class that supports supplier administration
	functionality */
	class AdminSuppliers
	{
		// Public variables available in smarty template
		public $mSuppliersCount;
		public $mSuppliers;
		public $mErrorMessage;
		public $mLinkToSuppliersAdmin;
		
		// Private attributes
		private $_mAction;
		private $_mActionedSupplierID;
		
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
					$this->_mActionedSupplierID = (int)substr($key, $last_underscore + 1);
					break;
				}
				
			$this->mLinkToSuppliersAdmin = Link::ToSuppliersAdmin();
			$this->mSuppliers = Supplier::GetSuppliersList();
		}
		
		public function init()
		{									
			// If adding a new supplier ...
			if ($this->_mAction == 'add_supp')
			{
				$supplier_name = $_POST['supplier_name'];
				$supplier_email = $_POST['supplier_email'];
				$supplier_address_line_one = $_POST['supplier_address_line_one'];
				$supplier_town = $_POST['supplier_town'];
				$supplier_city = $_POST['supplier_city'];
				$supplier_county = $_POST['supplier_county'];
				$supplier_postcode = $_POST['supplier_postcode'];
				$supplier_telephone = $_POST['supplier_telephone'];
				
				if ($supplier_name == null)
					$this->mErrorMessage = 'Name is empty';
				if ($supplier_email == null || !preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$supplier_email))
					$this->mErrorMessage = 'Please correct the email address';
				if ($supplier_address_line_one == null)
					$this->mErrorMessage = 'Street Address is empty';
				if ($supplier_town == null)
					$this->mErrorMessage = 'Town is empty';
				if ($supplier_city == null)
					$this->mErrorMessage = 'City is empty';
				if ($supplier_county == null)
					$this->mErrorMessage = 'County is empty';
				if ($supplier_postcode == null || strlen($supplier_postcode) > 8)
					$this->mErrorMessage = 'Please correct the post code';
				if ($supplier_telephone == null || strlen($supplier_telephone) > 11)
					$this->mErrorMessage = 'Please correct the telephone number';
			
				if ($this->mErrorMessage == null)
				{	
					Supplier::AddSupplier($supplier_name, $supplier_email,
										$supplier_address_line_one, $supplier_town,
										$supplier_city, $supplier_county,
										$supplier_postcode, $supplier_telephone);
					
					header('Location: ' . htmlspecialchars_decode(
					$this->mLinkToSuppliersAdmin));
				}
			}
			
			// If we want to see a suppliers details
			if ($this->_mAction == 'edit_supp')
			{
				header('Location: ' . htmlspecialchars_decode(
					Link::ToSupplierAdmin($this->_mActionedSupplierID)));
			
				exit();
			}
			
			$this->mSuppliers = Supplier::GetSuppliersList();
			$this->mSuppliersCount = count($this->mSuppliers);
		}
	}
?>