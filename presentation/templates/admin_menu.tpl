{* admin_menu.tpl *}
{load_presentation_object filename="admin_menu" assign="obj"}
<ul id="admin-nav">
	<li><a href="{$obj->mLinkToStoreFront}">STOREFRONT</a></li>
    <li><a href="{$obj->mLinkToStoreAdmin}">CATALOG</a></li>
    <li><a href="{$obj->mLinkToStockControlAdmin}">STOCK CONTROL</a></li>
	<li><a href="{$obj->mLinkToAttributesAdmin}">PRODUCTS ATTRIBUTES</a></li>
    <li><a href="{$obj->mLinkToCartsAdmin}">CARTS</a></li>
    <li><a href="{$obj->mLinkToOrdersAdmin}">ORDERS</a></li>
	<li><a href="{$obj->mLinkToCustomersAdmin}">CUSTOMERS</a></li>
	<li><a href="{$obj->mLinkToSuppliersAdmin}">SUPPLIERS</a></li>
	<li><a href="{$obj->mLinkToShippingAdmin}">SHIPPING</a></li>
	<li><a href="{$obj->mLinkToLogout}">LOGOUT</a></li>
</ul>
