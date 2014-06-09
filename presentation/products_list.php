<?php
class ProductsList
{
	// Public variables to be read from Smarty template
	public $mPage = 1;
	public $mrTotalPages;
	public $mLinkToNextPage;
	public $mLinkToPreviousPage;
	public $mProductListPages = array();
	public $mStock;
	public $mEditActionTarget;
	public $mShowEditButton;
	
	// Private members
	private $_mDepartmentID;
	private $_mCategoryID;
	
	// Class constructor
	public function __construct()
	{
		
		// Get DepartmentID from query string casting it to int
		if (isset ($_GET['DepartmentID']))
			$this->_mDepartmentID = (int)$_GET['DepartmentID'];
		
		// Get CategoryID from query string casting it to int
		if (isset ($_GET['CategoryID']))
			$this->_mCategoryID = (int)$_GET['CategoryID'];
		
		// Get Page number from query string casting it to int		
		if (isset ($_GET['Page']))
			$this->mPage = (int)$_GET['Page'];
		
		if ($this->mPage < 1)
			trigger_error('Incorrect Page value');
			
		// Save page request for continue shopping functionality
		$_SESSION['link_to_continue_shopping'] = $_SERVER['QUERY_STRING'];
		
		// Show Edit button for administrators
		if (!(isset ($_SESSION['admin_logged'])) ||
					$_SESSION['admin_logged'] != true)
			$this->mShowEditButton = false;
		else
			$this->mShowEditButton = true;
	}
	
	public function init()
	{
		// Prepare the Edit button
		$this->mEditActionTarget =
				Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));
		if (isset ($_SESSION['admin_logged']) &&
					$_SESSION['admin_logged'] == true &&
					isset ($_POST['itemID']))
		{
			if (isset ($this->_mDepartmentID) && isset ($this->_mCategoryID))
				header('Location: ' .
						htmlspecialchars_decode(
						Link::ToProductAdmin($this->_mDepartmentID,
											$this->_mCategoryID,
											(int)$_POST['itemID'])));
			else
			{
				$product_locations =
						Catalog::GetProductLocations((int)$_POST['itemID']);
				
				if (count($product_locations) > 0)
				{
					$department_id = $product_locations[0]['departmentID'];
					$category_id = $product_locations[0]['categoryID'];
					header('Location: ' .
								htmlspecialchars_decode(
								Link::ToProductAdmin($department_id,
													$category_id,
												(int)$_POST['itemID'])));
				}
			}
		}
		
		/* If browsing a category, get the list of products by calling
		the GetProductsInCategory() business tier method */
		if (isset ($this->_mCategoryID))
			$this->mStock = Catalog::GetProductsInCategory(
			$this->_mCategoryID, $this->mPage, $this->mrTotalPages);
		/* If browsing a department, get the list of products by calling
		the GetProductsOnDepartment() business tier method */
		elseif (isset ($this->_mDepartmentID))
			$this->mStock = Catalog::GetProductsOnDepartment(
			$this->_mDepartmentID, $this->mPage, $this->mrTotalPages);
			
		/* If browsing the first page, get the list of products by
		calling the GetProductsOnCatalog() business tier method */
		else
			$this->mStock = Catalog::GetProductsOnCatalog(
			$this->mPage, $this->mrTotalPages);
			
		/* If there are subpages of products, display navigation
		controls */
		if ($this->mrTotalPages > 1)
		{
			// Build the Next link
			if ($this->mPage < $this->mrTotalPages)
			{
				if (isset($this->_mCategoryID))
					$this->mLinkToNextPage =
					Link::ToCategory($this->_mDepartmentID, $this->_mCategoryID,
					$this->mPage + 1);
				elseif (isset($this->_mDepartmentID))
					$this->mLinkToNextPage =
					Link::ToDepartment($this->_mDepartmentID, $this->mPage + 1);
					
				else
					$this->mLinkToNextPage = Link::ToIndex($this->mPage + 1);
			}
			
			// Build the Previous link
			if ($this->mPage > 1)
			{
				if (isset($this->_mCategoryID))
					$this->mLinkToPreviousPage =
					Link::ToCategory($this->_mDepartmentID, $this->_mCategoryID,
					$this->mPage - 1);
				elseif (isset($this->_mDepartmentID))
					$this->mLinkToPreviousPage =
					Link::ToDepartment($this->_mDepartmentID, $this->mPage - 1);
				else
				$this->mLinkToPreviousPage = Link::ToIndex($this->mPage - 1);
			}
			
			// Build the pages links
			for ($i = 1; $i <= $this->mrTotalPages; $i++)
				if (isset($this->_mCategoryID))
					$this->mProductListPages[] =
					Link::ToCategory($this->_mDepartmentID, $this->_mCategoryID, $i);
				elseif (isset($this->_mDepartmentID))
					$this->mProductListPages[] =
					Link::ToDepartment($this->_mDepartmentID, $i);
				else
					$this->mProductListPages[] = Link::ToIndex($i);
		}
		
		/* 404 redirect if the page number is larger than
		the total number of pages */
		if ($this->mPage > $this->mrTotalPages && !empty($this->mrTotalPages))
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
		
		// Build links for product details pages
		for ($i = 0; $i < count($this->mStock); $i++)
		{
			$this->mStock[$i]['link_to_product'] =
			Link::ToProduct($this->mStock[$i]['itemID']);
			
			if ($this->mStock[$i]['thumbImage'])
				$this->mStock[$i]['thumbImage'] =
				Link::Build('product_images/' . $this->mStock[$i]['thumbImage']);
				
			// Create the Add to Cart link
			$this->mStock[$i]['link_to_add_product'] =
					Link::ToCart(ADD_PRODUCT, $this->mStock[$i]['itemID']);
				
			$this->mStock[$i]['attributes'] =
			Catalog::GetProductAttributes($this->mStock[$i]['itemID']);
		}
	}
}
?>