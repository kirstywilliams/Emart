<?php
// Deals with retrieving department details
class Department
{
	// Public variables for the smarty template
	public $mName;
	public $mDescription;
	public $mEditActionTarget;
	public $mEditAction;
	public $mEditButtonCaption;
	public $mShowEditButton;
	
	// Private members
	private $_mDepartmentID;
	private $_mCategoryID;
	
	// Class constructor
	public function __construct()
	{
		// We need to have DepartmentID in the query string
		if (isset ($_GET['DepartmentID']))
			$this->_mDepartmentID = (int)$_GET['DepartmentID'];
		else
			trigger_error('DepartmentID not set');
		
		/* If CategoryID is in the query string we save it
		(casting it to integer to protect against invalid values) */
		if (isset ($_GET['CategoryID']))
			$this->_mCategoryID = (int)$_GET['CategoryID'];
			
		// Show Edit button if the user is administrator
		if (!(isset ($_SESSION['admin_logged'])) ||
					$_SESSION['admin_logged'] != true)
			$this->mShowEditButton = false;
		else
			$this->mShowEditButton = true;
	}
	
	public function init()
	{
		// If visiting a department ...
		$department_details =
			Catalog::GetDepartmentDetails($this->_mDepartmentID);
		$this->mName = $department_details['name'];
		$this->mDescription = $department_details['description'];
		
		// If visiting a category ...
		if (isset ($this->_mCategoryID))
		{
			$category_details =
				Catalog::GetCategoryDetails($this->_mCategoryID);
			$this->mName = $this->mName . ' &raquo; ' .
				$category_details['categoryName'];
			$this->mDescription = $category_details['description'];
			$this->mEditActionTarget =
					Link::ToDepartmentCategoriesAdmin($this->_mDepartmentID);
			$this->mEditAction = 'edit_cat_' . $this->_mCategoryID;
			$this->mEditButtonCaption = 'Edit Category Details';
		}
		else
		{
			$this->mEditActionTarget = Link::ToDepartmentsAdmin();
			$this->mEditAction = 'edit_dept_' . $this->_mDepartmentID;
			$this->mEditButtonCaption = 'Edit Department Details';
		}
	}
}
?>