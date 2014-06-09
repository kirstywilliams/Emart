<?php
// Business tier class for reading product catalog information
class Catalog
{
	// Defines product display options
	public static $mProductDisplayOptions = array ('Default', // 0
												'On Catalog', // 1
												'On Department', // 2
												'On Both'); // 3

	// Retrieves all departments
	public static function GetDepartments()
	{
		// Build SQL query
		$sql = 'CALL catalog_get_departments_list()';
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql);
	}
	
	// Retrieves complete details for the specified department
	public static function GetDepartmentDetails($departmentID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_department_details(:departmentID)';
		// Build the parameters array
		$params = array (':departmentID' => $departmentID);
		// Execute the query and return the results
		return DatabaseHandler::GetRow($sql, $params);
	}
	
	// Retrieves list of categories that belong to a department
	public static function GetCategoriesInDepartment($departmentID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_categories_list(:departmentID)';
		// Build the parameters array
		$params = array (':departmentID' => $departmentID);
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Retrieves complete details for the specified category
	public static function GetCategoryDetails($categoryID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_category_details(:categoryID)';
		// Build the parameters array
		$params = array (':categoryID' => $categoryID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetRow($sql, $params);
	}
	
	/* Calculates how many pages of products could be filled by the
	number of products returned by the $countSql query
	(HELPER CLASS) */
	private static function HowManyPages($countSql, $countSqlParams)
	{
		// Create a hash for the sql query
		$queryHashCode = md5($countSql . var_export($countSqlParams, true));
		
		// Verify if we have the query results in cache
		if (isset ($_SESSION['last_count_hash']) &&
			isset ($_SESSION['how_many_pages']) &&
			$_SESSION['last_count_hash'] === $queryHashCode)
		{
			// Retrieve the the cached value
			$how_many_pages = $_SESSION['how_many_pages'];
		}
		else
		{
			// Execute the query
			$items_count = DatabaseHandler::GetOne($countSql, $countSqlParams);
			
			// Calculate the number of pages
			$how_many_pages = ceil($items_count / PRODUCTS_PER_PAGE);
			
			// Save the query and its count result in the session
			$_SESSION['last_count_hash'] = $queryHashCode;
			$_SESSION['how_many_pages'] = $how_many_pages;
		}
		
		// Return the number of pages
		return $how_many_pages;
	}
	
	// Retrieves list of products that belong to a category
	public static function GetProductsInCategory(
			$categoryID, $pageNo, &$rHowManyPages)
	{
		// Query that returns the number of products in the category
		$sql = 'CALL catalog_count_products_in_category(:categoryID)';

		// Build the parameters array
		$params = array (':categoryID' => $categoryID);
	
		// Calculate the number of pages required to display the products
		$rHowManyPages = Catalog::HowManyPages($sql, $params);
		
		// Calculate the start item
		$start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;

		// Retrieve the list of products
		$sql = 'CALL catalog_get_products_in_category(
				:categoryID, :short_product_description_length,
				:products_per_page, :start_item)';

		// Build the parameters array
		$params = array (':categoryID' => $categoryID,
				':short_product_description_length' =>
				SHORT_PRODUCT_DESCRIPTION_LENGTH,
				':products_per_page' => PRODUCTS_PER_PAGE,
				':start_item' => $start_item);
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Retrieves the list of products for the department page
	public static function GetProductsOnDepartment(
			$departmentID, $pageNo, &$rHowManyPages)
	{
		// Query that returns the number of products in the department page
		$sql = 'CALL catalog_count_products_on_department(:departmentID)';
		
		// Build the parameters array
		$params = array (':departmentID' => $departmentID);
		
		// Calculate the number of pages required to display the products
		$rHowManyPages = Catalog::HowManyPages($sql, $params);
		
		// Calculate the start item
		$start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;
		
		// Retrieve the list of products
		$sql = 'CALL catalog_get_products_on_department(
				:departmentID, :short_product_description_length,
				:products_per_page, :start_item)';

		// Build the parameters array
		$params = array (
				':departmentID' => $departmentID,
				':short_product_description_length' =>
				SHORT_PRODUCT_DESCRIPTION_LENGTH,
				':products_per_page' => PRODUCTS_PER_PAGE,
				':start_item' => $start_item);
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Retrieves the list of products on catalog page
	public static function GetProductsOnCatalog($pageNo, &$rHowManyPages)
	{
		// Query that returns the number of products for the front catalog page
		$sql = 'CALL catalog_count_products_on_catalog()';

		// Calculate the number of pages required to display the products
		$rHowManyPages = Catalog::HowManyPages($sql, null);
		
		// Calculate the start item
		$start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;

		// Retrieve the list of products
		$sql = 'CALL catalog_get_products_on_catalog(
				:short_product_description_length,
				:products_per_page, :start_item)';

		// Build the parameters array
		$params = array (
				':short_product_description_length' =>
				SHORT_PRODUCT_DESCRIPTION_LENGTH,
				':products_per_page' => PRODUCTS_PER_PAGE,
				':start_item' => $start_item);

		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Retrieves complete product details
	public static function GetProductDetails($itemID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_product_details(:itemID)';
		
		// Build the parameters array
		$params = array (':itemID' => $itemID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetRow($sql, $params);
	}
	
	// Retrieves product locations
	public static function GetProductLocations($itemID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_product_locations(:itemID)';
		
		// Build the parameters array
		$params = array (':itemID' => $itemID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Retrieves product attributes
	public static function GetProductAttributes($itemID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_product_attributes(:itemID)';
		
		// Build the parameters array
		$params = array (':itemID' => $itemID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Retrieves department name
	public static function GetDepartmentName($departmentID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_department_name(:departmentID)';
		
		// Build the parameters array
		$params = array (':departmentID' => $departmentID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetOne($sql, $params);
	}
	
	// Retrieves category name
	public static function GetCategoryName($categoryID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_category_name(:categoryID)';
		
		// Build the parameters array
		$params = array (':categoryID' => $categoryID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetOne($sql, $params);
	}
	
	// Retrieves product name
	public static function GetProductName($itemID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_product_name(:itemID)';
		
		// Build the parameters array
		$params = array (':itemID' => $itemID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetOne($sql, $params);
	}
	
	// Retrieves all departments with their descriptions
	public static function GetDepartmentsWithDescriptions()
	{
		// Build the SQL query
		$sql = 'CALL catalog_get_departments()';
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql);
	}
	
	// Add a department
	public static function AddDepartment($departmentName, $departmentManager, 
										$departmentNumber, $departmentDescription)
	{
		// Build the SQL query
		$sql = 'CALL catalog_add_department(:department_name, :department_manager, 
		:department_number, :department_description)';
		// Build the parameters array
		$params = array (':department_name' => $departmentName,
		':department_manager' => $departmentManager,
		':department_number' => $departmentNumber,
		':department_description' => $departmentDescription);
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Updates department details
	public static function UpdateDepartment($departmentId, $departmentName, $departmentManager, $departmentNumber,
	$departmentDescription)
	{
		// Build the SQL query
		$sql = 'CALL catalog_update_department(:department_id, :department_name, :department_manager, :department_number,
		:department_description)';
		// Build the parameters array
		$params = array (':department_id' => $departmentId,
		':department_name' => $departmentName,
		':department_manager' => $departmentManager,
		':department_number' => $departmentNumber ,
		':department_description' => $departmentDescription);
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Deletes a department
	public static function DeleteDepartment($departmentID)
	{
		// Build the SQL query
		$sql = 'CALL catalog_delete_department(:department_id)';
		// Build the parameters array
		$params = array (':department_id' => $departmentID);
		// Execute the query and return the results
		return DatabaseHandler::GetOne($sql, $params);
	}
	
	// Gets categories in a department
	public static function GetDepartmentCategories($departmentID)
	{
		// Build the SQL query
		$sql = 'CALL catalog_get_department_categories(:department_id)';
		
		// Build the parameters array
		$params = array (':department_id' => $departmentID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Adds a category
	public static function AddCategory($departmentID, $categoryName,
											$categoryDescription)
	{
		// Build the SQL query
		$sql = 'CALL catalog_add_category(:department_id, :category_name,
		:category_description)';
		
		// Build the parameters array
		$params = array (':department_id' => $departmentID,
		':category_name' => $categoryName,
		':category_description' => $categoryDescription);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Updates a category
	public static function UpdateCategory($categoryID, $categoryName,
											$categoryDescription)
	{
		// Build the SQL query
		$sql = 'CALL catalog_update_category(:category_id, :category_name,
		:category_description)';
		
		// Build the parameters array
		$params = array (':category_id' => $categoryID,
		':category_name' => $categoryName,
		':category_description' => $categoryDescription);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Deletes a category
	public static function DeleteCategory($categoryID)
	{
		// Build the SQL query
		$sql = 'CALL catalog_delete_category(:category_id)';
		
		// Build the parameters array
		$params = array (':category_id' => $categoryID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetOne($sql, $params);
	}	
	
	// Retrieves all attributes
	public static function GetAttributes()
	{
		// Build the SQL query
		$sql = 'CALL catalog_get_attributes()';
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql);
	}
	
	// Add an attribute
	public static function AddAttribute($attributeName)
	{
		// Build the SQL query
		$sql = 'CALL catalog_add_attribute(:attribute_name)';
		
		// Build the parameters array
		$params = array (':attribute_name' => $attributeName);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}

	// Updates attribute name
	public static function UpdateAttribute($attributeID, $attributeName)
	{
		// Build the SQL query
		$sql = 'CALL catalog_update_attribute(:attribute_id, :attribute_name)';

		// Build the parameters array
		$params = array (':attribute_id' => $attributeID,
						':attribute_name' => $attributeName);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Deletes an attribute
	public static function DeleteAttribute($attributeID)
	{
		// Build the SQL query
		$sql = 'CALL catalog_delete_attribute(:attribute_id)';
		
		// Build the parameters array
		$params = array (':attribute_id' => $attributeID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetOne($sql, $params);
	}

	// Retrieves details for the specified attribute
	public static function GetAttributeDetails($attributeID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_attribute_details(:attribute_id)';

		// Build the parameters array
		$params = array (':attribute_id' => $attributeID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetRow($sql, $params);
	}
		
	// Gets atribute values
	public static function GetAttributeValues($attributeID)
	{
		// Build the SQL query
		$sql = 'CALL catalog_get_attribute_values(:attribute_id)';
		
		// Build the parameters array
		$params = array (':attribute_id' => $attributeID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Adds an attribute value
	public static function AddAttributeValue($attributeID, $attributeValue)
	{
		// Build the SQL query
		$sql = 'CALL catalog_add_attribute_value(:attribute_id, :value)';
		
		// Build the parameters array
		$params = array (':attribute_id' => $attributeID,
						':value' => $attributeValue);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
		
	// Updates an attribute value
	public static function UpdateAttributeValue(
				$attributeValueID, $attributeValue)
	{
		// Build the SQL query
		$sql = 'CALL catalog_update_attribute_value(
				:attributeValueID, :value)';
		
		// Build the parameters array
		$params = array (':attributeValueID' => $attributeValueID,
							':value' => $attributeValue);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}

	// Deletes an attribute value
	public static function DeleteAttributeValue($attributeValueID)
	{
		// Build the SQL query
		$sql = 'CALL catalog_delete_attribute_value(:attributeValueID)';

		// Build the parameters array
		$params = array (':attributeValueID' => $attributeValueID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetOne($sql, $params);
	}	
	
	// Gets products in a category
	public static function GetCategoryProducts($categoryID)
	{
		// Build the SQL query
		$sql = 'CALL catalog_get_category_products(:categoryID)';
		
		// Build the parameters array
		$params = array (':categoryID' => $categoryID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Creates a product and assigns it to a category
	public static function AddProductToCategory($categoryID, $productName,
		$productBriefDescription, $productLongDescription, $productPrice, $currentQty, $idealQty)
	{
		// Build the SQL query
		$sql = 'CALL catalog_add_product_to_category(:categoryID, :itemName,
				:briefDescription, :longDescription, :price, :current_qty, :ideal_qty)';
		
		// Build the parameters array
		$params = array (':categoryID' => $categoryID,
						':itemName' => $productName,
						':briefDescription' => $productBriefDescription,
						':longDescription' => $productLongDescription,
						':product_price' => $productPrice,
						':current_qty' => $currentQty,
						':ideal_qty' => $idealQty);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Updates a product
	public static function UpdateProduct($itemID, $productName,
							$productBriefDescription, $productLongDescription, 
							$productSupplier, $productPrice,
							$productDiscountedPrice)
	{
		// Build the SQL query
		$sql = 'CALL catalog_update_product(:product_id, :product_name,
											:product_brief_description, 
											:product_long_description, 
											:product_supplier, :product_price, 
											:product_discounted_price)';

		// Build the parameters array
		$params = array (':product_id' => $itemID,
		':product_name' => $productName,
		':product_brief_description' => $productBriefDescription,
		':product_long_description' => $productLongDescription,
		':product_supplier' => $productSupplier,
		':product_price' => $productPrice,
		':product_discounted_price' => $productDiscountedPrice);

		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Removes a product from the product catalog
	public static function DeleteProduct($itemID)
	{
		// Build SQL query
		$sql = 'CALL catalog_delete_product(:product_id)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}

	// Unassigns a product from a category
	public static function RemoveProductFromCategory($itemID, $categoryID)
	{
		// Build SQL query
		$sql = 'CALL catalog_remove_product_from_category(
								:product_id, :category_id)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID,
						':category_id' => $categoryID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetOne($sql, $params);
	}

	// Retrieves the list of categories a product belongs to
	public static function GetCategories()
	{
		// Build SQL query
		$sql = 'CALL catalog_get_categories()';
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql);
	}

	// Retrieves product info
	public static function GetProductInfo($itemID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_product_info(:product_id)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetRow($sql, $params);
	}
	
	// Retrieves the list of categories a product belongs to
	public static function GetCategoriesForProduct($itemID)
	{
		// Build SQL query
		$sql = 'CALL catalog_get_categories_for_product(:product_id)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID);
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Assigns a product to a category
	public static function SetProductDisplayOption($itemID, $display)
	{
		// Build SQL query
		$sql = 'CALL catalog_set_product_display_option(
					:product_id, :display)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID,
						':display' => $display);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Assigns a product to a category
	public static function AssignProductToCategory($itemID, $categoryID)
	{
		// Build SQL query
		$sql = 'CALL catalog_assign_product_to_category(
							:product_id, :category_id)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID,
						':category_id' => $categoryID);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Moves a product from one category to another
	public static function MoveProductToCategory($itemID, $sourceCategoryId,
												$targetCategoryId)
	{
		// Build SQL query
		$sql = 'CALL catalog_move_product_to_category(:product_id,
		:source_category_id, :target_category_id)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID,
						':source_category_id' => $sourceCategoryId,
						':target_category_id' => $targetCategoryId);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Gets the catalog attributes that are not assigned to the specified product
	public static function GetAttributesNotAssignedToProduct($itemID)
	{
		// Build the SQL query
		$sql = 'CALL catalog_get_attributes_not_assigned_to_product(:product_id)';

		// Build the parameters array
		$params = array (':product_id' => $itemID);
	
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql, $params);
	}
	
	// Assign an attribute value to the specified product
	public static function AssignAttributeValueToProduct($itemID,
	$attributeValueId)
	{
		// Build SQL query
		$sql = 'CALL catalog_assign_attribute_value_to_product(
						:product_id, :attributeValueID)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID,
						':attributeValueID' => $attributeValueId);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Removes a product attribute value
	public static function RemoveProductAttributeValue($itemID,
												$attributeValueId)
	{
		// Build SQL query
		$sql = 'CALL catalog_remove_product_attribute_value(
						:product_id, :attributeValueID)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID,
						':attributeValueID' => $attributeValueId);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Changes the name of the product thumbnail image file in the database
	public static function SetImage($itemID, $imageName)
	{
		// Build SQL query
		$sql = 'CALL catalog_set_image(:product_id, :image_name)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID, ':image_name' => $imageName);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}

	// Changes the name of the second (large) product image file in the database
	public static function SetImage2($itemID, $imageName)
	{
		// Build SQL query
		$sql = 'CALL catalog_set_image_2(:product_id, :image_name)';
		
		// Build the parameters array
		$params = array (':product_id' => $itemID, ':image_name' => $imageName);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Retrieves all shipping methods
	public static function GetShipping()
	{
		// Build the SQL query
		$sql = 'CALL shipping_get_shipping()';
		
		// Execute the query and return the results
		return DatabaseHandler::GetAll($sql);
	}
	
	// Add a shipping method
	public static function AddShipping($shippingType, $shippingCost)
	{
		// Build the SQL query
		$sql = 'CALL shipping_add_shipping(:shipping_type, :shipping_cost)';
		
		// Build the parameters array
		$params = array (':shipping_type' => $shippingType, ':shipping_cost' => $shippingCost);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}

	// Updates shipping method information
	public static function UpdateShipping($shippingID, $shippingType, $shippingCost)
	{
		// Build the SQL query
		$sql = 'CALL shipping_update_shipping(:shipping_id, :shipping_type, :shipping_cost)';

		// Build the parameters array
		$params = array (':shipping_id' => $shippingID,
						':shipping_type' => $shippingType,
						':shipping_cost' => $shippingCost);
		
		// Execute the query
		DatabaseHandler::Execute($sql, $params);
	}
	
	// Deletes an attribute
	public static function DeleteShipping($shippingID)
	{
		// Build the SQL query
		$sql = 'CALL shipping_delete_shipping(:shipping_id)';
		
		// Build the parameters array
		$params = array (':shipping_id' => $shippingID);
		
		// Execute the query and return the results
		DatabaseHandler::Execute($sql, $params);
	}
}
?>