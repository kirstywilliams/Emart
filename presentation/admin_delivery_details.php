<?php
	// Class that deals with delivery administration
	class AdminDeliveryDetails
	{
		// Public attributes
		public $mDeliveries;
		public $mSupplierName;
		public $mErrorMessage;
		public $mLinkToSupplierDeliveriesAdmin;
		public $mLinkToDeliveryAdmin;
		public $mDeliveryID;
		
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
				
			// Need to have DeliveryID in the query string
			if (!isset ($_GET['DeliveryID']))
				trigger_error('DeliveryID not set');
			else
				$this->mDeliveryID = (int)$_GET['DeliveryID'];

			$this->mLinkToSupplierDeliveriesAdmin =
					Link::ToSupplierDeliveriesAdmin($this->_mSupplierID);
			$this->mLinkToDeliveryAdmin =
					Link::ToDeliveryAdmin($this->_mSupplierID, $this->mDeliveryID);
		}
		
		public function init()
		{
			
			// If updating delivery info ...
			if (isset ($_POST['UpdateDeliveryInfo']))
			{
				$date = $_POST['delivery_date'];
				$time = $_POST['delivery_time'];
			
				if ($date == null || (!preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/",$date)))
					$this->mErrorMessage = 'Date is empty';
				if ($time != null && (!preg_match("/^([0-9]{2}):([0-9]{2}):([0-9]{2})$/",$time)))
					$this->mErrorMessage = 'Please empty time field, if delivery has no date, or correct';
			
				if ($this->mErrorMessage == null)
				{
					Supplier::UpdateDeliveryInfo($this->mDeliveryID, $date, $time);
				}
			}
			
			// If removing the delivery ...
			if (isset ($_POST['RemoveDelivery']))
			{
				Supplier::RemoveDelivery($this->mDeliveryID);
				
				header('Location: ' . htmlspecialchars_decode(
						$this->mLinkToSupplierDeliveriesAdmin));
				exit();

			}
			
			// Get delivery info
			$this->mDeliveries = Supplier::GetDeliveryInfo($this->mDeliveryID);
		}
	}
?>