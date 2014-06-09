<?php
	
	// Business tier class that manages stock control functionality
	class StockControl
	{
		public static $mStockStatusOptions = array ('Stocked',
													'Medium',
													'Reorder',
													'OutOfStock');
													
		// Get the details for a stock
		public static function GetStockDetails($itemId)
		{
			// Build the SQL query
			$sql = 'CALL stock_get_item(:item_id)';
			
			// Build the parameters array
			$params = array (':item_id' => $itemId);
			
			// Execute the query and return the results
			return DatabaseHandler::GetRow($sql, $params);
		}
		
		public static function UpdateStock($itemId, $ideal_qty, $current_qty)
		{
			
			// Build the SQL query
			$sql = 'CALL stock_update_stock(:item_id, :ideal_qty, :current_qty)';
			
			// Build the parameters array
			$params = array (':item_id' => $itemId,	':ideal_qty' => $ideal_qty, ':current_qty' => $current_qty);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Gets all suppliers names with their associated id
		public static function GetStock()
		{
			// Build the SQL query
			$sql = 'CALL stock_get_stock()';
			
			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql);
		}
		
	}
?>