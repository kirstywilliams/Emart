 <?php
	// Class that deals with products administration from a specific category
	class AdminDeliveries
	{
		// Public variables available in smarty template
		public $mDeliveriesCount;
		public $mDeliveries;
		public $mErrorMessage;
		public $mSupplierID;
		public $mSupplierName;
		public $mLinkToSupplierAdmin;
		public $mLinkToSupplierDeliveriesAdmin;
		
		// Private attributes
		private $_mAction;
		private $_mActionedDeliveryID;
		
		// Class constructor
		public function __construct()
		{			
			if (isset ($_GET['SupplierID']))
				$this->mSupplierID = (int)$_GET['SupplierID'];
			else
				trigger_error('SupplierID not set');

			$supplier_details = Supplier::GetSupplierDetails($this->mSupplierID);
			$this->mSupplierName = $supplier_details['supplierName'];

			foreach ($_POST as $key => $value)
				// If a submit button was clicked ...
				if (substr($key, 0, 6) == 'submit')
				{
					/* Get the position of the last '_' underscore from submit button name
					e.g strtpos('submit_edit_del_1', '_') is 16 */
					$last_underscore = strrpos($key, '_');
					
					/* Get the scope of submit button
					(e.g 'edit_supp' from 'submit_edit_prod_1') */
					$this->_mAction = substr($key, strlen('submit_'),
							$last_underscore - strlen('submit_'));
					
					/* Get the delivery id targeted by submit button
					(the number at the end of submit button name)
					e.g '1' from 'submit_edit_del_1' */
					$this->_mActionedDeliveryID = (int)substr($key, $last_underscore + 1);
					break;
				}
			
			$this->mLinkToSupplierAdmin =
					Link::ToSupplierAdmin($this->mSupplierID);
			
			$this->mLinkToSupplierDeliveriesAdmin =
					Link::ToSupplierDeliveriesAdmin($this->mSupplierID);
		}
		
		public function init()
		{
			// If adding a new delivery ...
			if ($this->_mAction == 'add_del')
			{
				$date = $_POST['delivery_date'];
				$time = $_POST['delivery_time'];
			
				if ($date == null || (!preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/",$date)))
					$this->mErrorMessage = 'Date is empty';
				if ($time != null && (!preg_match("/^([0-9]{2}):([0-9]{2}):([0-9]{2})$/",$time)))
					$this->mErrorMessage = 'Please empty time field, if delivery has no date, or correct';
			
				if ($this->mErrorMessage == null)
				{
					Supplier::AddDeliveryToSupplier($this->mSupplierID, $date, $time);

					header('Location: ' . htmlspecialchars_decode(
						$this->mLinkToSupplierDeliveriesAdmin));
				}
			}
			
			// If we want to see a deliveries details
			if ($this->_mAction == 'edit_del')
			{
				header('Location: ' . htmlspecialchars_decode(
					Link::ToDeliveryAdmin($this->mSupplierID,
					$this->_mActionedDeliveryID)));
			
				exit();
			}
			
			$this->mDeliveries = Supplier::GetSupplierDeliveries($this->mSupplierID);
			$this->mDeliveriesCount = count($this->mDeliveries);
		}
	}
?>