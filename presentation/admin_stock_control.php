 <?php
	// Class that deals with warehouse stock level administration
	class AdminStockControl
	{
		// Public variables available in smarty template
		public $mStock;
		public $mErrorMessage = '';
		public $mLinkToStockControlAdmin;
		public $mStockStatusOptions;
		
		// Private attributes
		private $_mAction;
		private $_mActionedItemID;
		
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
					(e.g 'edit_prod' from 'submit_edit_prod_1') */
					$this->_mAction = substr($key, strlen('submit_'),
							$last_underscore - strlen('submit_'));
					
					/* Get the item id targeted by submit button
					(the number at the end of submit button name)
					e.g '1' from 'submit_edit_prod_1' */
					$this->_mActionedItemID = (int)substr($key, $last_underscore + 1);
					break;
				}
				
			$this->mLinkToStockControlAdmin = Link::ToStockControlAdmin();
			$this->mStock = StockControl::GetStock();
			$this->mStockStatusOptions = StockControl::$mStockStatusOptions;
		}
		
		public function init()
		{			
			// If we want to see a products details
			if ($this->_mAction == 'edit_prod')
			{
				header('Location: ' . htmlspecialchars_decode(
					Link::ToStockDetailsAdmin($this->_mActionedItemID)));
			
				exit();
			}
		}
	}
?>