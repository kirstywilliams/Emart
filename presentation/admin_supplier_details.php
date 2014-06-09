<?php

	// Class that deals with supplier administration
	class AdminSupplierDetails
	{
		// Public attributes
		public $mSuppliers;
		public $mErrorMessage;
		public $mEditDelivery;
		public $mLinkToSuppliersAdmin;
		public $mLinkToSupplierAdmin;
		
		// Private attributes
		private $_mSupplierID;
		
		// Class constructor
		public function __construct()
		{				
			// Need to have SupplierID in the query string
			if (!isset ($_GET['SupplierID']))
				trigger_error('SupplierID not set');
			else
				$this->_mSupplierID = (int)$_GET['SupplierID'];				
				
			$this->mLinkToSuppliersAdmin = Link::ToSuppliersAdmin();
			$this->mLinkToSupplierAdmin = Link::ToSupplierAdmin($this->_mSupplierID);
		}
		
		public function init()
		{	
			// If updating supplier info ...
			if (isset ($_POST['UpdateSupplierInfo']))
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
				if ($supplier_email == null || !preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $supplier_email))
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
					Supplier::UpdateSupplier($this->_mSupplierID, $supplier_name, $supplier_email,
										$supplier_telephone, $supplier_address_line_one, $supplier_town,
										$supplier_city, $supplier_county, $supplier_postcode);
				}
			}
			
			// If removing the supplier from database ...
			if (isset ($_POST['RemoveFromDatabase']))
			{
				Supplier::RemoveSupplier($this->_mSupplierID);
				header('Location: ' . htmlspecialchars_decode(
						$this->mLinkToSuppliersAdmin));
				exit();
			}
			
			// If editing supplier's deliveries ...
			if (isset ($_POST['EditSupplierDeliveries']))
			{
				header('Location: ' .
				htmlspecialchars_decode(
				Link::ToSupplierDeliveriesAdmin($this->_mSupplierID)));
				exit();
			}
			
			// Get supplier info
			$this->mSuppliers = Supplier::GetSupplierDetails($this->_mSupplierID);
		}
	}
?>