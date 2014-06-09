<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 20:21:13
         compiled from "C:\emart/presentation/templates\customer_logged.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205904fa0475382f680-63093907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c98e856c0929dbff027f7dab457bb847ff5583c' => 
    array (
      0 => 'C:\\emart/presentation/templates\\customer_logged.tpl',
      1 => 1363375270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205904fa0475382f680-63093907',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fa04753929980_23686806',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa04753929980_23686806')) {function content_4fa04753929980_23686806($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"customer_logged",'assign'=>"obj"),$_smarty_tpl);?>

<div class="box">
	<h3>Welcome, <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerName;?>
 </h3>
	<div>
		<a <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSelectedMenuItem=='account'){?> class="selected" <?php }?>
		href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAccountDetails;?>
">
		Update Account Details
		</a>
	</div>
	<div>
		<a <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSelectedMenuItem=='payment-details'){?> class="selected" <?php }?>
		href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToPaymentDetails;?>
">
		<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPaymentAction;?>
 Payment Details
		</a>
	</div>
	<div>
		<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLogout;?>
">
		Logout
		</a>
	</div>
</div><?php }} ?>