<?php
	// Business tier class for the orders
	class Orders
	{
		public static $mOrderStatusOptions = array ('Received',
													'Checking Funds',
													'Notifying Stock Check',
													'Awaiting Stock Confirmation',
													'Awaiting Payment',
													'Notifying Warehouse Despatch',
													'Awaiting Despatch Confirmation',
													'Notifying Customer',
													'Complete',
													'Cancelled');
		private $orderStatus = '';
		
		// Get the most recent $how_many orders
		public static function GetMostRecentOrders($how_many)
		{
			// Build the SQL query
			$sql = 'CALL orders_get_most_recent_orders(:how_many)';
			
			// Build the parameters array
			$params = array (':how_many' => $how_many);
			
			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql, $params);
		}
		
		// Get orders between two dates
		public static function GetOrdersBetweenDates($startDate, $endDate)
		{
			// Build the SQL query
			$sql = 'CALL orders_get_orders_between_dates(:start_date, :end_date)';
			
			// Build the parameters array
			$params = array (':start_date' => $startDate, ':end_date' => $endDate);
			
			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql, $params);
		}
		
		// Gets orders by status
		public static function GetOrdersByStatus($status)
		{
			// Build the SQL query
			$sql = 'CALL orders_get_orders_by_status(:status)';
			
			// Build the parameters array
			$params = array (':status' => $status);
			
			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql, $params);
		}
		
		// Gets the details of a specific order
		public static function GetOrderInfo($orderId)
		{
			// Build the SQL query
			$sql = 'CALL orders_get_order_info(:order_id)';
			
			// Build the parameters array
			$params = array (':order_id' => $orderId);
			
			// Execute the query and return the results
			return DatabaseHandler::GetRow($sql, $params);
		}

		// Gets the products that belong to a specific order
		public static function GetOrderDetails($orderId)
		{
			// Build the SQL query
			$sql = 'CALL orders_get_order_details(:order_id)';
			
			// Build the parameters array
			$params = array (':order_id' => $orderId);
	
			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql, $params);
		}

		// Updates order details
		public static function UpdateOrder($orderId, $status, $comments, $authCode, $reference,
						$customerFirstName, $customerSurname, $addressLineOne, 
						$addressTown, $addressCity, $addressCounty, $addressPostCode,
						$customerEmail, $customerTelephone)
		{
			// Build the SQL query
			$sql = 'CALL orders_update_order(:order_id, :status, :comments, :authCode, :reference,
					:customer_firstname, :customer_surname, :address_line_one, 
					:address_town, :address_city, :address_county, 
					:address_postcode, :customer_email, :customer_telephone)';
					
			if ($status == 0)
				$orderStatus = 'Received';
			elseif($status == 1)
				$orderStatus = 'Checking Funds';
			elseif($status == 2)
				$orderStatus = 'Notifying Stock Check';
			elseif($status == 3)
				$orderStatus = 'Awaiting Stock Confirmation';
			elseif($status == 4)
				$orderStatus = 'Awaiting Payment';
			elseif($status == 5)
				$orderStatus = 'Notifying Warehouse Despatch';
			elseif($status == 6)
				$orderStatus = 'Awaiting Despatch Confirmation';
			elseif($status == 7)
				$orderStatus = 'Notifying Customer';
			elseif($status == 8)
				$orderStatus = 'Complete';
			elseif($status == 9)
				$orderStatus = 'Cancelled';
			
			// Build the parameters array
			$params = array (':order_id' => $orderId,
							':status' => $orderStatus,
							':comments' => $comments,
							':authCode' => $authCode,
							':reference' => $reference,
							':customer_firstname' => $customerFirstName,
							':customer_surname' => $customerSurname,
							':address_line_one' => $addressLineOne,
							':address_town' => $addressTown,
							':address_city' => $addressCity,
							':address_county' => $addressCounty,
							':address_postcode' => $addressPostCode,
							':customer_email' => $customerEmail,
							':customer_telephone' => $customerTelephone);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Gets all orders placed by a specified customer
		public static function GetByCustomerId($customerId)
		{
			// Build the SQL query
			$sql = 'CALL orders_get_by_customer_id(:customer_id)';
			
			// Build the parameters array
			$params = array (':customer_id' => $customerId);
			
			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql, $params);
		}
		
		// Get short details for an order
		public static function GetOrderShortDetails($orderId)
		{
			// Build the SQL query
			$sql = 'CALL orders_get_order_short_details(:order_id)';

			// Build the parameters array
			$params = array (':order_id' => $orderId);

			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql, $params);
		}
		
		// Retrieves the shipping details
		public static function GetShippingInfo()
		{
			// Build the SQL query
			$sql = 'CALL orders_get_shipping_info()';
			
			// Build the parameters array
			$params = array ();
			
			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql, $params);
		}
		
		// Creates audit record
		public static function CreateAudit($orderId, $message, $code)
		{
			// Build the SQL query
			$sql = 'CALL orders_create_audit(:order_id, :message, :code)';
			
			// Build the parameters array
			$params = array (':order_id' => $orderId,
			':message' => $message,
			':code' => $code);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Updates the order pipeline status of an order
		public static function UpdateOrderStatus($orderId, $status)
		{
			// Build the SQL query
			$sql = 'CALL orders_update_status(:order_id, :status)';
			
			// Build the parameters array
			$params = array (':order_id' => $orderId, ':status' => $status);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Sets order's authorization code
		public static function SetOrderAuthCodeAndReference ($orderId, $authCode,
		$reference)
		{
			// Build the SQL query
			$sql = 'CALL orders_set_auth_code(:order_id, :auth_code, :reference)';
			
			// Build the parameters array
			$params = array (':order_id' => $orderId,
			':auth_code' => $authCode,
			':reference' => $reference);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Set order's ship date
		public static function SetDateShipped($orderId)
		{
			// Build the SQL query
			$sql = 'CALL orders_set_date_shipped(:order_id)';
			
			// Build the parameters array
			$params = array (':order_id' => $orderId);
			
			// Execute the query
			DatabaseHandler::Execute($sql, $params);
		}
		
		// Gets the audit table entries associated with a specific order
		public static function GetAuditTrail($orderId)
		{
			// Build the SQL query
			$sql = 'CALL orders_get_audit_trail(:order_id)';
			
			// Build the parameters array
			$params = array (':order_id' => $orderId);
			
			// Execute the query and return the results
			return DatabaseHandler::GetAll($sql, $params);
		}
	}
?>