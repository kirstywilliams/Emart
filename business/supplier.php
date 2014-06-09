<?php
	
	// Business tier class that manages supplier accounts functionality
	class Supplier
	{

		// Get the details for a supplier
		public static function GetSupplierDetails($supplierId)
		{
			// Build the SQL query
			$sql = 'CALL supplier_get_supplier(:supplier_id)';
			
			// Build the parameters array
			$params = array (':supplier_id' => $supplierId);
			
			// Execute the query and return the results
			return DatabaseHandler::GetRow($sql, $params);
		}
		
		/* Adds a new supplier account */
		public static function AddSupplier($name, $email, $addressLineOne,
											$town, $city, $county, $postcode, 
											$telephone)
		{			
			// Build the SQL query
			$sql = 'CALL supplier_add(:name, :email, :addressLineOne, :town, 
									:city, :county, :postcode, :telephone)';
			
			// Build the parameters array
			$params = array (':name' => $name, ':email' => $email,
							':addressLineOne' => $addressLineOne, ':town' => $town, 
							':city' => $city, ':county' => $county, 
							':postcode' => $postcode, ':telephone' => $telephone);
			
			// Execute the query and get the customer_id
			$customer_id = DatabaseHandler::GetOne($sql, $params);
		}
		
		public static function UpdateSupplier($supplierId, $name, $email, $telephone, 
												$addressLineOne, $town, $city, $county, 
												$postcode)
		{
			
			// Build the SQL query
			$sql = 'CALL supplier_update_account(:supplier_id, :name, :email,
												:telephone, :addressLineOne, :town, 
												:city, :county, :postcode)';
			
			// Build the parameters array
			$params = array (':supplier_id' => $supplierId, ':name' => $name,
							':email' => $email, ':telephone' => $telephone,
							':addressLineOne' => $addressLineOne, ':town' => $town, 
							':city' => $city, ':county' => $county, ':postcode' => $postcode);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Remove supplier from the database
		public static function RemoveSupplier($supplierId)
		{
			//Build the SQL Query
			$sql = 'CALL supplier_delete_supplier(:supplier_id)';
			
			// Build the parameters array
			$params = array (':supplier_id' => $supplierId);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Gets all suppliers names with their associated id
		public static function GetSuppliersList()
		{
			// Build the SQL query
			$sql = 'CALL supplier_get_supplier_list()';
			
			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql);
		}
		
		// Gets suppliers deliveries
		public static function GetSupplierDeliveries($supplierId)
		{
			// Build the SQL Query
			$sql = 'CALL supplier_get_deliveries(:supplier_id)';
			
			// Build the parameters array
			$params = array (':supplier_id' => $supplierId);
			
			// Execute the query
			return DatabaseHandler::GetAll($sql, $params);
			
		}
		
		// Adds a delivery for a supplier
		public static function AddDeliveryToSupplier($supplier_id, $date, $time)
		{
			// Build the SQL Query
			$sql = 'CALL supplier_add_delivery(:supplier_id, :date, :time)';
			
			// Build the parameters array
			$params = array (':supplier_id' => $supplier_id, ':date' => $date, ':time' => $time);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Gets delivery information
		public static function GetDeliveryInfo($delivery_id)
		{
			// Build the SQL Query
			$sql = 'CALL supplier_get_delivery_info(:delivery_id)';
			
			// Build the parameters array
			$params = array (':delivery_id' => $delivery_id);
			
			// Execute the query
			return DatabaseHandler::GetRow($sql, $params);
		}
		
		// Removes a delivery from the database
		public static function RemoveDelivery($delivery_id)
		{
			// Build the SQL Query
			$sql = 'CALL supplier_remove_delivery(:delivery_id)';
			
			// Build the parameters array
			$params = array (':delivery_id' => $delivery_id);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Updates a delivery's info
		public static function UpdateDeliveryInfo($delivery_id, $date, $time)
		{
			// Build the SQL Query
			$sql = 'CALL supplier_update_delivery(:delivery_id, :date, :time)';
			
			// Build the parameters array
			$params = array (':delivery_id' => $delivery_id, ':date' => $date, ':time' => $time);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
	}
?>