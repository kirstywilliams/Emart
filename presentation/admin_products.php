 <?php
	// Class that deals with products administration from a specific category
	class AdminProducts
	{
		// Public variables available in smarty template
		public $mProductsCount;
		public $mStock;
		public $mErrorMessage;
		public $mDepartmentID;
		public $mCategoryID;
		public $mCategoryName;
		public $mLinkToDepartmentCategoriesAdmin;
		public $mLinkToCategoryProductsAdmin;
		
		// Private attributes
		private $_mAction;
		private $_mActionedItemID;
		
		// Class constructor
		public function __construct()
		{
			if (isset ($_GET['DepartmentID']))
				$this->mDepartmentID = (int)$_GET['DepartmentID'];
			else
				trigger_error('DepartmentID not set');
			
			if (isset ($_GET['CategoryID']))
				$this->mCategoryID = (int)$_GET['CategoryID'];
			else
				trigger_error('CategoryID not set');

			$category_details = Catalog::GetCategoryDetails($this->mCategoryID);
			$this->mCategoryName = $category_details['categoryName'];

			foreach ($_POST as $key => $value)
				// If a submit button was clicked ...
				if (substr($key, 0, 6) == 'submit')
				{
					/* Get the position of the last '_' underscore from submit button name
					e.g strtpos('submit_edit_prod_1', '_') is 17 */
					$last_underscore = strrpos($key, '_');
					
					/* Get the scope of submit button
					(e.g 'edit_dep' from 'submit_edit_prod_1') */
					$this->_mAction = substr($key, strlen('submit_'),
							$last_underscore - strlen('submit_'));
					
					/* Get the product id targeted by submit button
					(the number at the end of submit button name)
					e.g '1' from 'submit_edit_prod_1' */
					$this->_mActionedItemID = (int)substr($key, $last_underscore + 1);
					break;
				}
			
			$this->mLinkToDepartmentCategoriesAdmin =
					Link::ToDepartmentCategoriesAdmin($this->mDepartmentID);
			
			$this->mLinkToCategoryProductsAdmin =
					Link::ToCategoryProductsAdmin($this->mDepartmentID, $this->mCategoryID);
		}
		
		public function init()
		{
			// If adding a new product ...
			if ($this->_mAction == 'add_prod')
			{
				$product_name = $_POST['product_name'];
				$product_brief_description = $_POST['product_brief_description'];
				$product_long_description = $_POST['product_long_description'];
				$product_price = $_POST['product_price'];
				$current_qty = $_POST['current_qty'];
				$ideal_qty = $_POST['ideal_qty'];
			
				if ($product_name == null)
					$this->mErrorMessage = 'Product name is empty';
				if ($product_brief_description == null)
					$this->mErrorMessage = 'Product brief description is empty';
			
				if ($product_price == null || !is_numeric($product_price))
					$this->mErrorMessage = 'Product price must be a number!';
					
				if (!((string)(int)$current_qty == (string)$current_qty))
					$this->mErrorMessage = 'Current quantity must be a number';
				
				if (!((string)(int)$ideal_qty == (string)$ideal_qty))
					$this->mErrorMessage = 'Ideal quantity must be a number';
			
				if ($this->mErrorMessage == null)
				{
					Catalog::AddProductToCategory($this->mCategoryID, $product_name,
												$product_brief_description, $product_long_description, 
												$product_price, $current_qty, $ideal_qty);

					header('Location: ' . htmlspecialchars_decode(
						$this->mLinkToCategoryProductsAdmin));
				}
			}
			
			// If we want to see a product details
			if ($this->_mAction == 'edit_prod')
			{
				header('Location: ' . htmlspecialchars_decode(
					Link::ToProductAdmin($this->mDepartmentID,
					$this->mCategoryID,
					$this->_mActionedItemID)));
			
				exit();
			}
			$this->mStock = Catalog::GetCategoryProducts($this->mCategoryID);
			$this->mProductsCount = count($this->mStock);
		}
	}
?>