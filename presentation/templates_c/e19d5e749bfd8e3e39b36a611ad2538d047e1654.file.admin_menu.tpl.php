<?php /* Smarty version Smarty-3.1.8, created on 2012-05-15 17:17:24
         compiled from "C:\emart/presentation/templates\admin_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:217704f835f022d1e23-37550117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e19d5e749bfd8e3e39b36a611ad2538d047e1654' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_menu.tpl',
      1 => 1337093804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217704f835f022d1e23-37550117',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f835f02364d12_50368341',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f835f02364d12_50368341')) {function content_4f835f02364d12_50368341($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_menu",'assign'=>"obj"),$_smarty_tpl);?>

<div class="status">
	<div class="status_store_front"><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStoreFront;?>
">STOREFRONT</a></div>
	<div class="status_logout"><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLogout;?>
">LOGOUT</a></div>
	<div class="status_menu"> |
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStoreAdmin;?>
">CATALOG</a> |
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStockControlAdmin;?>
">STOCK CONTROL</a> |
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAttributesAdmin;?>
">PRODUCTS ATTRIBUTES</a> |
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartsAdmin;?>
">CARTS</a> |
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToOrdersAdmin;?>
">ORDERS</a> |
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCustomersAdmin;?>
">CUSTOMERS</a> |
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSuppliersAdmin;?>
">SUPPLIERS</a> |
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToShippingAdmin;?>
">SHIPPING</a> |
	</div>
</div><?php }} ?>