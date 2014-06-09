<?php
class AdminMenu
{
	public $mLinkToStoreAdmin;
	public $mLinkToAttributesAdmin;
	public $mLinkToCartsAdmin;
	public $mLinkToOrdersAdmin;
	public $LinkToCustomersAdmin;
	public $LinkToSuppliersAdmin;
	public $LinkToStockControlAdmin;
	public $LinkToShippingAdmin;
	public $mLinkToStoreFront;
	public $mLinkToLogout;
	
	public function __construct()
	{
		$this->mLinkToStoreAdmin = Link::ToAdmin();
		$this->mLinkToAttributesAdmin = Link::ToAttributesAdmin();
		$this->mLinkToCartsAdmin = Link::ToCartsAdmin();
		$this->mLinkToOrdersAdmin = Link::ToOrdersAdmin();
		$this->mLinkToCustomersAdmin = Link::ToCustomersAdmin();
		$this->mLinkToSuppliersAdmin = Link::ToSuppliersAdmin();
		$this->mLinkToShippingAdmin = Link::ToShippingAdmin();
		$this->mLinkToStockControlAdmin = Link::ToStockControlAdmin();
		
		if (isset ($_SESSION['link_to_store_front']))
			$this->mLinkToStoreFront = $_SESSION['link_to_store_front'];
		else
			$this->mLinkToStoreFront = Link::ToIndex();
		
		$this->mLinkToLogout = Link::ToLogout();
	}
}
?>