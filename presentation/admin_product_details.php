<?php
	// Class that deals with product administration
	class AdminProductDetails
	{
		// Public attributes
		public $mStock;
		public $mErrorMessage;
		public $mProductCategoriesString;
		public $mProductDisplayOptions;
		public $mProductAttributes;
		public $mCatalogAttributes;
		public $mAssignOrMoveTo;
		public $mRemoveFromCategories;
		public $mRemoveFromCategoryButtonDisabled = false;
		public $mLinkToCategoryProductsAdmin;
		public $mLinkToProductDetailsAdmin;
		
		// Private attributes
		private $_mItemID;
		private $_mCategoryID;
		private $_mDepartmentID;
		
		// Class constructor
		public function __construct()
		{
			// Need to have DepartmentID in the query string
			if (!isset ($_GET['DepartmentID']))
				trigger_error('DepartmentID not set');
			else
				$this->_mDepartmentID = (int)$_GET['DepartmentID'];
				
			// Need to have CategoryID in the query string
			if (!isset ($_GET['CategoryID']))
				trigger_error('CategoryID not set');
			else
				$this->_mCategoryID = (int)$_GET['CategoryID'];
				
			// Need to have ItemID in the query string
			if (!isset ($_GET['ItemID']))
				trigger_error('ItemID not set');
			else
				$this->_mItemID = (int)$_GET['ItemID'];

			$this->mProductDisplayOptions = Catalog::$mProductDisplayOptions;
			$this->mLinkToCategoryProductsAdmin =
					Link::ToCategoryProductsAdmin($this->_mDepartmentID, $this->_mCategoryID);
			$this->mLinkToProductDetailsAdmin =
					Link::ToProductAdmin($this->_mDepartmentID,
										$this->_mCategoryID,
										$this->_mItemID);
		}
		
		public function init()
		{
			// If uploading a product picture ...
			if (isset ($_POST['Upload']))
			{
				/* Check whether we have write permission on the
				product_images folder */
				if (!is_writeable(SITE_ROOT . '/product_images/'))
				{
					echo "Can't write to the product_images folder";
					exit();
				}
				
				// If the error code is 0, the file was uploaded ok
				if ($_FILES['ImageUpload']['error'] == 0)
				{
					/* Use the move_uploaded_file PHP function to move the file
					from its temporary location to the product_images folder */
					move_uploaded_file($_FILES['ImageUpload']['tmp_name'],
										SITE_ROOT . '/product_images/' .
										$_FILES['ImageUpload']['name']);

					// Update the product's information in the database
					Catalog::SetImage($this->_mItemID,
							$_FILES['ImageUpload']['name']);
				}

				// If the error code is 0, the file was uploaded ok
				if ($_FILES['Image2Upload']['error'] == 0)
				{
					/* Use the move_uploaded_file PHP function to move the file
					from its temporary location to the product_images folder */
					move_uploaded_file($_FILES['Image2Upload']['tmp_name'],
										SITE_ROOT . '/product_images/' .
										$_FILES['Image2Upload']['name']);
				
					// Update the product's information in the database
					Catalog::SetImage2($this->_mItemID,
					$_FILES['Image2Upload']['name']);
				}
			}
			
			// If updating product info ...
			if (isset ($_POST['UpdateProductInfo']))
			{
				$product_name = $_POST['name'];
				$product_brief_description = $_POST['briefDescription'];
				$product_long_description = $_POST['longDescription'];
				$product_supplier = $_POST['supplier'];
				$product_price = $_POST['price'];
				$product_discounted_price = $_POST['discounted_price'];
				if ($product_name == null)
					$this->mErrorMessage = 'Product name is empty';
				if ($product_brief_description == null)
					$this->mErrorMessage = 'Product brief description is empty';
				if ($product_price == null || !is_numeric($product_price))
					$this->mErrorMessage = 'Product price must be a number!';
				if ($product_discounted_price == null || !is_numeric($product_discounted_price))
					$this->mErrorMessage = 'Product discounted price must be a number!';
				if ($this->mErrorMessage == null)
					Catalog::UpdateProduct($this->_mItemID, $product_name,
											$product_brief_description, 
											$product_long_description, 
											$product_supplier, 
											$product_price, 
											$product_discounted_price);
			}
			
			// If removing the product from a category ...
			if (isset ($_POST['RemoveFromCategory']))
			{
				$target_category_id = $_POST['TargetCategoryIdRemove'];
				$still_exists = Catalog::RemoveProductFromCategory(
								$this->_mItemID, $target_category_id);
				if ($still_exists == 0)
				{
					header('Location: ' . htmlspecialchars_decode(
							$this->mLinkToCategoryProductsAdmin));
					exit();
				}
			}
			
			// If setting product display option ...
			if (isset ($_POST['SetProductDisplayOption']))
			{
				$product_display = $_POST['ProductDisplay'];
				Catalog::SetProductDisplayOption($this->_mItemID, $product_display);
			}
			
			// If removing the product from catalog ...
			if (isset ($_POST['RemoveFromCatalog']))
			{
				Catalog::DeleteProduct($this->_mItemID);
				header('Location: ' . htmlspecialchars_decode(
						$this->mLinkToCategoryProductsAdmin));
				exit();
			}
			
			// If assigning the product to another category ...
			if (isset ($_POST['Assign']))
			{
				$target_category_id = $_POST['TargetCategoryIdAssign'];
				Catalog::AssignProductToCategory($this->_mItemID,
												$target_category_id);
			}
			
			// If moving the product to another category ...
			if (isset ($_POST['Move']))
			{
				$target_category_id = $_POST['TargetCategoryIdMove'];
				Catalog::MoveProductToCategory($this->_mItemID,
											$this->_mCategoryID, $target_category_id);
				header('Location: ' . htmlspecialchars_decode(
						Link::ToProductAdmin($this->_mDepartmentID,
											$target_category_id, $this->_mItemID)));
				exit();
			}
			
			// If assigning an attribute value to the product ...
			if (isset ($_POST['AssignAttributeValue']))
			{
				$target_attribute_value_id = $_POST['TargetAttributeValueIdAssign'];
				Catalog::AssignAttributeValueToProduct($this->_mItemID,
				$target_attribute_value_id);
			}
			
			// If removing an attribute value from the product ...
			if (isset ($_POST['RemoveAttributeValue']))
			{
				$target_attribute_value_id = $_POST['TargetAttributeValueIdRemove'];
				Catalog::RemoveProductAttributeValue($this->_mItemID,
				$target_attribute_value_id);
			}
			
			// If moving the product to another category ...
			if (isset ($_POST['Move']))
			{
				$target_category_id = $_POST['TargetCategoryIdMove'];
				Catalog::MoveProductToCategory($this->_mItemID,
												$this->_mCategoryID, 
												$target_category_id);
				header('Location: ' . htmlspecialchars_decode(
						Link::ToProductAdmin($this->_mDepartmentID,
											$target_category_id,
											$this->_mItemID)));
				exit();
			}
			
			// Get product info
			$this->mStock = Catalog::GetProductInfo($this->_mItemID);
			$product_categories = Catalog::GetCategoriesForProduct($this->_mItemID);
			$product_attributes = Catalog::GetProductAttributes($this->_mItemID);
			
			for ($i = 0; $i < count($product_attributes); $i++)
				$this->mProductAttributes[$product_attributes[$i]['attributeValueID']] =
											$product_attributes[$i]['attribute_name'] . ': ' .
											$product_attributes[$i]['attribute_value'];
			
			$catalog_attributes = Catalog::GetAttributesNotAssignedToProduct($this->_mItemID);
			
			for ($i = 0; $i < count($catalog_attributes); $i++)
				$this->mCatalogAttributes[$catalog_attributes[$i]['attributeValueID']] =
											$catalog_attributes[$i]['attribute_name'] . ': ' .
											$catalog_attributes[$i]['attribute_value'];
			
			if (count($product_categories) == 1)
				$this->mRemoveFromCategoryButtonDisabled = true;
				
			// Show the categories the product belongs to
			for ($i = 0; $i < count($product_categories); $i++)
				$temp1[$product_categories[$i]['categoryID']] =
						$product_categories[$i]['categoryName'];

			$this->mRemoveFromCategories = $temp1;
			$this->mProductCategoriesString = implode(', ', $temp1);
			$all_categories = Catalog::GetCategories();
			
			for ($i = 0; $i < count($all_categories); $i++)
				$temp2[$all_categories[$i]['categoryID']] =
						$all_categories[$i]['categoryName'];
			
			$this->mAssignOrMoveTo = array_diff($temp2, $temp1);
		}
	}
?>