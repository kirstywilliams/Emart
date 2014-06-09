<?php
// Class that supports attributes admin functionality
class AdminShipping
{
	// Public variables available in smarty template
	public $mShippingCount;
	public $mShipping;
	public $mErrorMessage;
	public $mEditShipping;
	public $mLinkToShippingAdmin;
	
	// Private members
	private $_mAction;
	private $_mActionedShippingId;
	
	// Class constructor
	public function __construct()
	{
		// Parse the list with posted variables
		foreach ($_POST as $key => $value)
			// If a submit button was clicked ...
			if (substr($key, 0, 6) == 'submit')
			{
				/* Get the position of the last '_' underscore from submit
				button name e.g strtpos('submit_edit_attr_1', '_') is 17 */
				$last_underscore = strrpos($key, '_');
				
				/* Get the scope of submit button
				(e.g 'edit_ship' from 'submit_edit_ship_1') */
				$this->_mAction = substr($key, strlen('submit_'),
				$last_underscore - strlen('submit_'));
				
				/* Get the attribute id targeted by submit button
				(the number at the end of submit button name)
				e.g '1' from 'submit_edit_ship_1' */
				$this->_mActionedShippingId = substr($key, $last_underscore + 1);
				break;
			}
			
			$this->mLinkToShippingAdmin = Link::ToShippingAdmin();
	}
	
	public function init()
	{
		// If adding a new attribute ...
		if ($this->_mAction == 'add_ship')
		{
			$shipping_type = $_POST['shipping_type'];
			if ($shipping_type == null)
				$this->mErrorMessage = 'Shipping type required';
				
			if ($shipping_cost == null || !is_numeric($shipping_cost))
					$this->mErrorMessage = 'Shipping cost must be a number!';
			
			if ($this->mErrorMessage == null)
			{
				Catalog::AddShipping($shipping_type, $shipping_cost);
				header('Location: ' . $this->mLinkToShippingAdmin);
			}
		}
		
		// If editing an existing shipping method ...
		if ($this->_mAction == 'edit_ship')
			$this->mEditShipping = $this->_mActionedShippingId;
		
		// If updating an attribute ...
		if ($this->_mAction == 'update_ship')
		{
			$shipping_type = $_POST['type'];
			$shipping_cost = $_POST['cost'];
			
			if ($shipping_type == null)
				$this->mErrorMessage = 'Shipping type required';
				
			if ($shipping_cost == null || !is_numeric($shipping_cost))
					$this->mErrorMessage = 'Shipping cost must be a number!';

			if ($this->mErrorMessage == null)
			{
				Catalog::UpdateShipping($this->_mActionedShippingId,
						$shipping_type, $shipping_cost);
				
				header('Location: ' . $this->mLinkToShippingAdmin);
			}
		}

		// If deleting a shipping method ...
		if ($this->_mAction == 'delete_ship')
		{
			Catalog::DeleteShipping($this->_mActionedShippingId);
			
			header('Location: ' . $this->mLinkToShippingAdmin);
		}
		
		// Load the list of shipping methods
		$this->mShipping = Catalog::GetShipping();
		$this->mShippingCount = count($this->mShipping);
	}
}
?>