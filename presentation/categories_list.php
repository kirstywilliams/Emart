<?php
// Manages the categories list
class CategoriesList
{
	// Public variables for the smarty template
	public $mSelectedCategory = 0;
	public $mSelectedDepartment = 0;
	public $mCategories;

	// Constructor reads query string parameter
	public function __construct()
	{
	
		if (!isset($_GET['ItemID']))
		{
			if (isset ($_GET['DepartmentID']))
				$this->mSelectedDepartment = (int)$_GET['DepartmentID'];
			else
				trigger_error('DepartmentID not set');

			if (isset ($_GET['CategoryID']))
				$this->mSelectedCategory = (int)$_GET['CategoryID'];
		}
		else
		{
			$continue_shopping =
			Link::QueryStringToArray($_SESSION['link_to_continue_shopping']);
			
			if (array_key_exists('DepartmentID', $continue_shopping))
				$this->mSelectedDepartment =
				(int)$continue_shopping['DepartmentID'];
			else
				trigger_error('DepartmentID not set');
				
			if (array_key_exists('CategoryID', $continue_shopping))
				$this->mSelectedCategory =
				(int)$continue_shopping['CategoryID'];
		}
	}
	
	public function init()
	{
		$this->mCategories =
				Catalog::GetCategoriesInDepartment($this->mSelectedDepartment);

		// Building links for the category pages
		for ($i = 0; $i < count($this->mCategories); $i++)
			$this->mCategories[$i]['link_to_category'] =
				Link::ToCategory($this->mSelectedDepartment,
				$this->mCategories[$i]['categoryID']);
	}
}
?>