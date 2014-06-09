<?php
// Handles product details
class Product
{
	// Public variables to be used in Smarty template
	public $mStock;
	public $mProductLocations;
	public $mLinkToContinueShopping;
	public $mLocations;
	public $mEditActionTarget;
	public $mShowEditButton;
	
	// Private stuff
	private $_mItemID;
	
	// Class constructor
	public function __construct()
	{
		// Variable initialization
		if (isset ($_GET['ItemID']))
			$this->_mItemID = (int)$_GET['ItemID'];
		else
			trigger_error('ItemID not set');
			
		// Show Edit button for administrators
		if (!(isset ($_SESSION['admin_logged'])) ||
		$_SESSION['admin_logged'] != true)
			$this->mShowEditButton = false;
		else
			$this->mShowEditButton = true;
	}

	public function init()
	{
		// Get product details from business tier
		$this->mStock = Catalog::GetProductDetails($this->_mItemID);
		
		if (isset ($_SESSION['link_to_continue_shopping']))
		{
			$continue_shopping =
				Link::QueryStringToArray($_SESSION['link_to_continue_shopping']);
			$page = 1;

			if (isset ($continue_shopping['Page']))
				$page = (int)$continue_shopping['Page'];
			if (isset ($continue_shopping['CategoryID']))
				$this->mLinkToContinueShopping =
				Link::ToCategory((int)$continue_shopping['DepartmentID'],
				(int)$continue_shopping['CategoryID'], $page);
			elseif (isset ($continue_shopping['DepartmentID']))
				$this->mLinkToContinueShopping =
				Link::ToDepartment((int)$continue_shopping['DepartmentID'], $page);
			else
				$this->mLinkToContinueShopping = Link::ToIndex($page);
		}
		
		if ($this->mStock['bigImage'])
			$this->mStock['bigImage'] =
			Link::Build('product_images/' . $this->mStock['bigImage']);
			
		$this->mStock['attributes'] =
		Catalog::GetProductAttributes($this->mStock['itemID']);		
			
		$this->mLocations = Catalog::GetProductLocations($this->_mItemID);
		
		// Create the Add to Cart link
		$this->mStock['link_to_add_product'] =
				Link::ToCart(ADD_PRODUCT, $this->_mItemID);

		// Build links for product departments and categories pages
		for ($i = 0; $i < count($this->mLocations); $i++)
		{
			$this->mLocations[$i]['link_to_department'] =
			Link::ToDepartment($this->mLocations[$i]['departmentID']);
			
			$this->mLocations[$i]['link_to_category'] =
			Link::ToCategory($this->mLocations[$i]['departmentID'],
			
			$this->mLocations[$i]['categoryID']);
		}
		
		// Prepare the Edit button
		$this->mEditActionTarget =
				Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));
		
		if (isset ($_SESSION['admin_logged']) &&
					$_SESSION['admin_logged'] == true &&
					isset ($_POST['submit_edit']))
		{
			$product_locations = $this->mLocations;
			if (count($product_locations) > 0)
			{
				$department_id = $product_locations[0]['departmentID'];
				$category_id = $product_locations[0]['categoryID'];
				header('Location: ' .
						htmlspecialchars_decode(
						Link::ToProductAdmin($department_id,
											$category_id,
											$this->_mItemId)));
			}
		}
	}
}
?>
			
			