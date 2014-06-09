 <?php
	class Link
	{
		public static function Build($link, $type = 'http')
		{
			$base = (($type == 'http' || USE_SSL == 'no') ? 'http://' : 'https://') .
				getenv('SERVER_NAME');
			
			// If HTTP_SERVER_PORT is defined and different than default
			if (defined('HTTP_SERVER_PORT') && HTTP_SERVER_PORT != '80' &&
				strpos($base, 'https') === false)
			{
				// Append server port
				$base .= ':' . HTTP_SERVER_PORT;
			}
			
			$link = $base . VIRTUAL_LOCATION . $link;
			// Escape html
			return htmlspecialchars($link, ENT_QUOTES);
		}
		
		public static function ToDepartment($departmentID, $page = 1)
		{
			$link = self::CleanUrlText(Catalog::GetDepartmentName($departmentID)) .
			'-d' . $departmentID . '/';
			
			if ($page > 1)
				$link .= 'page-' . $page . '/';

			return self::Build($link);
		}
		
		public static function ToCategory($departmentID, $categoryID, $page = 1)
		{
			$link = self::CleanUrlText(Catalog::GetDepartmentName($departmentID)) .
				'-d' . $departmentID . '/' .
				self::CleanUrlText(Catalog::GetCategoryName($categoryID)) .
				'-c' . $categoryID . '/';
					
			if ($page > 1)
				$link .= 'page-' . $page . '/';
			
			return self::Build($link);self::Build($link);
		}
		
		public static function ToProduct($itemID)
		{
			$link = self::CleanUrlText(Catalog::GetProductName($itemID)) .
				'-p' . $itemID . '/';
			
			return self::Build($link);
		}
		
		public static function ToCustomer($customerID)
		{
			$link = '-c' . $customerID . '/';
			
			return self::Build($link);
		}
		
		public static function ToSupplier($supplierID)
		{
			$link = '-s' . $supplierID . '/';
			
			return self::Build($link);
		}
		
		public static function ToIndex($page = 1)
		{
			$link = '';
			if ($page > 1)
				$link .= 'page-' . $page . '/';
			return self::Build($link);
		}
		
		public static function QueryStringToArray($queryString)
		{
			$result = array();
			if ($queryString != '')
			{
				$elements = explode('&', $queryString);
				
				foreach($elements as $key => $value)
				{
					$element = explode('=', $value);
					$result[urldecode($element[0])] =
					isset($element[1]) ? urldecode($element[1]) : '';
				}
			}
			return $result;
		}
		
		// Prepares a string to be included in an URL
		public static function CleanUrlText($string)
		{
			// Remove all characters that aren't a-z, 0-9, dash, underscore or space
			$not_acceptable_characters_regex = '#[^-a-zA-Z0-9_ ]#';
			$string = preg_replace($not_acceptable_characters_regex, '', $string);
			
			// Remove all leading and trailing spaces
			$string = trim($string);
			
			// Change all dashes, underscores and spaces to dashes
			$string = preg_replace('#[-_ ]+#', '-', $string);
			
			// Return the modified string
			return strtolower($string);
		}

		// Redirects to proper URL if not already there
		public static function CheckRequest()
		{
			$proper_url = '';
			
			if (isset ($_GET['AddProduct']) || isset ($_GET['CartAction']) || isset ($_GET['AjaxRequest']) ||
				isset ($_POST['Login']) || isset ($_GET['Logout']) ||
				isset ($_GET['RegisterCustomer']) ||
				isset ($_GET['PaymentDetails']) ||
				isset ($_GET['AccountDetails']) || 
				isset ($_GET['Checkout']) ||
				isset ($_GET['OrderDone']) || 
				isset ($_GET['OrderError']) ||
				isset ($_GET['AboutUs']) ||
				isset ($_GET['ContactUs']) ||
				isset ($_GET['ContactDone']) ||
				isset ($_GET['ContactError']) ||
				isset ($_GET['Terms']) ||
				isset ($_GET['PrivacyPolicy']) ||
				isset ($_GET['FAQ']) ||
				isset ($_GET['AddCustomer']) ||
				isset ($_GET['AddSupplier']))
			{
				return ;
			}
			
			// Obtain proper URL for category pages
			if (isset ($_GET['DepartmentID']) && isset ($_GET['CategoryID']))
			{
				if (isset ($_GET['Page']))
					$proper_url = self::ToCategory($_GET['DepartmentID'],
                        $_GET['CategoryID'], $_GET['Page']);
				else
					$proper_url = self::ToCategory($_GET['DepartmentID'],
                        $_GET['CategoryID']);
			}
			
			// Obtain proper URL for department pages
			elseif (isset ($_GET['DepartmentID']))
			{
				if (isset ($_GET['Page']))
					$proper_url = self::ToDepartment($_GET['DepartmentID'],
                        $_GET['Page']);
				else
					$proper_url = self::ToDepartment($_GET['DepartmentID']);
			}
			
			// Obtain proper URL for product pages
			elseif (isset ($_GET['ItemID']))
			{
				$proper_url = self::ToProduct($_GET['ItemID']);
			}
			
			// Obtain proper URL for customer pages
			elseif (isset ($_GET['CustomerID']))
			{
				$proper_url = self::ToCustomer($_GET['CustomerID']);
			}
			
			// Obtain proper URL for supplier pages
			elseif (isset ($_GET['SupplierID']))
			{
				$proper_url = self::ToSupplier($_GET['SupplierID']);
			}
			
			// Obtain proper URL for the home page
			else
			{
				if (isset($_GET['Page']))
					$proper_url = self::ToIndex($_GET['Page']);
				else
					$proper_url = self::ToIndex();
			}

			/* Remove the virtual location from the requested URL
			so we can compare paths */
			$requested_url = self::Build(substr($_SERVER['REQUEST_URI'], 
                        strlen(VIRTUAL_LOCATION)));

			// 404 redirect if the requested product, category or department doesn’t exist
			if (strstr($proper_url, '/-'))
			{
				// Clean output buffer
				ob_clean();
		
				// Load the 404 page
				include '404.php';
		
				// Clear the output buffer and stop execution
				flush(); 
				ob_flush(); 
				ob_end_clean(); 
				exit();
			}

			// 301 redirect to the proper URL if necessary
			if ($requested_url != $proper_url)
			{
				// Clean output buffer
				ob_clean();
			
				// Redirect 301 
				header('HTTP/1.1 301 Moved Permanently');
				header('Location: ' . $proper_url);
			
				// Clear the output buffer and stop execution
				flush();
				ob_flush();
				ob_end_clean();
				exit();
			}
		}
		
		// Create a shopping cart link
		public static function ToCart($action = 0, $target = null)
		{
			$link = '';
			
			switch ($action)
			{
				case ADD_PRODUCT:
					$link = 'index.php?CartAction=' . ADD_PRODUCT . '&ProductId=' . $target;
					break;
				case REMOVE_PRODUCT:
					$link = 'index.php?CartAction=' .
							REMOVE_PRODUCT . '&ProductId=' . $target;
					break;
				case UPDATE_PRODUCTS_QUANTITIES:
					$link = 'index.php?CartAction=' . UPDATE_PRODUCTS_QUANTITIES;
					break;
				case SAVE_PRODUCT_FOR_LATER:
					$link = 'index.php?CartAction=' .
							SAVE_PRODUCT_FOR_LATER . '&ProductId=' . $target;
					break;
				case MOVE_PRODUCT_TO_CART:
					$link = 'index.php?CartAction=' .
							MOVE_PRODUCT_TO_CART . '&ProductId=' . $target;
					break;
				default:
					$link = 'cart-details/';
			}
			return self::Build($link);
		}
		
		// Create link to admin page
		public static function ToAdmin($params = '')
		{
			$link = 'admin.php';
			if ($params != '')
				$link .= '?' . $params;
			return self::Build($link, 'https');
		}	
		
		// Create logout link
		public static function ToLogout()
		{
			return self::ToAdmin('Page=Logout');
		}
		
		// Create link to the departments administration page
		public static function ToDepartmentsAdmin()
		{
			return self::ToAdmin('Page=Departments');
		}
		
		// Create link to the categories administration page
		public static function ToDepartmentCategoriesAdmin($departmentID)
		{
			$link = 'Page=Categories&DepartmentID=' . $departmentID;
			return self::ToAdmin($link);
		}
		
		// Create link to the attributes administration page
		public static function ToAttributesAdmin()
		{
			return self::ToAdmin('Page=Attributes');
		}
		
		// Create link to the attribute values administration page
		public static function ToAttributeValuesAdmin($attributeId)
		{
			$link = 'Page=AttributeValues&AttributeId=' . $attributeId;
			return self::ToAdmin($link);
		}
		
		// Create link to the shipping administration page
		public static function ToShippingAdmin()
		{
			return self::ToAdmin('Page=Shipping');
		}
		
		// Create link to a products administration page
		public static function ToCategoryProductsAdmin($departmentID, $categoryID)
		{
			$link = 'Page=Products&DepartmentID=' . $departmentID .
					'&CategoryID=' . $categoryID;
			
			return self::ToAdmin($link);
		}
		
		// Create link to product details administration page
		public static function ToProductAdmin($departmentID, $categoryID, $itemID)
		{
			$link = 'Page=ProductDetails&DepartmentID=' . $departmentID .
					'&CategoryID=' . $categoryID . '&ItemID=' . $itemID;
			return self::ToAdmin($link);
		}
		
		// Create link to a supplier delivery administration page
		public static function ToSupplierDeliveriesAdmin($supplierID)
		{
			$link = 'Page=Deliveries&SupplierID=' . $supplierID;
			
			return self::ToAdmin($link);
		}
		
		// Create link to supplier delivery details administration page
		public static function ToDeliveryAdmin($supplierID, $deliveryID)
		{
			$link = 'Page=DeliveryDetails&SupplierID=' . $supplierID . '&DeliveryID=' . $deliveryID;
			return self::ToAdmin($link);
		}
		
		// Create link to a customers administration page
		public static function ToCustomersAdmin()
		{
			$link = 'Page=Customers';
			
			return self::ToAdmin($link);
		}
		
		// Create link to customer details administration page
		public static function ToCustomerAdmin($customerID)
		{
			$link = 'Page=CustomerDetails&CustomerID=' . $customerID;
			return self::ToAdmin($link);
		}
		
		// Create link to a suppliers administration page
		public static function ToSuppliersAdmin()
		{
			$link = 'Page=Suppliers';
			
			return self::ToAdmin($link);
		}
		
		// Create link to supplier details administration page
		public static function ToSupplierAdmin($supplierID)
		{
			$link = 'Page=SupplierDetails&SupplierID=' . $supplierID;
			return self::ToAdmin($link);
		}
					
		// Create link to shopping carts administration page
		public static function ToCartsAdmin()
		{
			return self::ToAdmin('Page=Carts');
		}	

		// Create link to orders administration page
		public static function ToOrdersAdmin()
		{
			return self::ToAdmin('Page=Orders');
		}
		
		// Create link to the order details administration page
		public static function ToOrderDetailsAdmin($orderId)
		{
			$link = 'Page=OrderDetails&OrderId=' . $orderId;
			return self::ToAdmin($link);
		}
		
		// Create link to a stock control administration page
		public static function ToStockControlAdmin()
		{
			$link = 'Page=StockControl';
			
			return self::ToAdmin($link);
		}
		
		// Create link to stock details administration page
		public static function ToStockDetailsAdmin($itemID)
		{
			$link = 'Page=StockDetails&ItemID=' . $itemID;
			return self::ToAdmin($link);
		}
		
		// Creates a link to the register customer page
		public static function ToRegisterCustomer()
		{
			return self::Build('register-customer/', 'https');
		}
		
		// Creates a link to the update customer account details page
		public static function ToAccountDetails()
		{
			return self::Build('account-details/', 'https');
		}
		
		// Creates a link to the update customer credit card details page
		public static function ToPaymentDetails()
		{
			return self::Build('payment-details/', 'https');
		}
		
		// Creates a link to the checkout page
		public static function ToCheckout()
		{
			return self::Build('checkout/', 'https');
		}
		
		// Creates a link to the order done page
		public static function ToOrderDone()
		{
			return self::Build('order-done/');
		}
		
		// Creates a link to the order error page
		public static function ToOrderError()
		{
			return self::Build('order-error/');
		}
		
		// Creates a link to about us page
		public static function ToAboutUs()
		{
			return self::Build('about-us/');
		}
		
		// Creates a link to contact us page
		public static function ToContactUs()
		{
			return self::Build('contact-us/');
		}
		
		// Creates a link to the contact done page
		public static function ToContactDone()
		{
			return self::Build('contact-done/');
		}
		
		// Creates a link to the contact done page
		public static function ToContactError()
		{
			return self::Build('contact-error/');
		}
		
		// Creates a link to the terms and conditions page
		public static function ToTerms()
		{
			return self::Build('terms/');
		}
		
		// Creates a link to the privacy policy page
		public static function ToPrivacyPolicy()
		{
			return self::Build('privacy-policy/');
		}
		
		// Creates a link to the faq page
		public static function ToFAQ()
		{
			return self::Build('faq/');
		}
					
	}
?>