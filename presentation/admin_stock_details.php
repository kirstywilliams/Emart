<?php
	// Presentation tier class that deals with administering stock details
	class AdminStockDetails
	{
		// Public variables available in smarty template
		public $mItemID;
		public $mStockDetails;
		public $mStockStatusOptions;
		public $mLinkToStockControlAdmin;
		public $mLinkToStockDetailsAdmin;
		public $mErrorMessage = '';
		
		// Class constructor
		public function __construct()
		{
			// Need to have ItemID in the query string
			if (!isset ($_GET['ItemID']))
				trigger_error('ItemID not set');
			else
				$this->mItemID = (int)$_GET['ItemID'];				
				
			$this->mLinkToStockControlAdmin = Link::ToStockControlAdmin();
			$this->mLinkToStockDetailsAdmin = Link::ToStockDetailsAdmin($this->mItemID);
			
			$this->mStockStatusOptions = StockControl::$mStockStatusOptions;
		}
		
		// Initializes class members
		public function init()
		{
			// If updating stock info ...
			if (isset ($_POST['UpdateStockInfo']))
			{
				$current_qty = $_POST['current_qty'];
				$ideal_qty = $_POST['ideal_qty'];
				
				if (!((string)(int)$current_qty == (string)$current_qty))
					$this->mErrorMessage = 'Current quantity must be a number';
				
				if (!((string)(int)$ideal_qty == (string)$ideal_qty))
					$this->mErrorMessage = 'Ideal quantity must be a number';
					
				if ($this->mErrorMessage == null)
					StockControl::UpdateStock($this->mItemID, $ideal_qty, $current_qty);
			}			
			
			$this->mStockDetails = StockControl::GetStockDetails($this->mItemID);
		}
	}
?>