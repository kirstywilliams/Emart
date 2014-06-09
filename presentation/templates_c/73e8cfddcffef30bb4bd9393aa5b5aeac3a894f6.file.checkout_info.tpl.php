<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 20:08:09
         compiled from "C:\emart/presentation/templates\checkout_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162844fa1484d5dddb8-57910442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73e8cfddcffef30bb4bd9393aa5b5aeac3a894f6' => 
    array (
      0 => 'C:\\emart/presentation/templates\\checkout_info.tpl',
      1 => 1363374367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162844fa1484d5dddb8-57910442',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fa1484d71aa95_48556723',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa1484d71aa95_48556723')) {function content_4fa1484d71aa95_48556723($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"checkout_info",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCheckout;?>
">
<h3>Your order consists of the following items:</>
<table class="standard-table">
	<tr>
		<th>Product Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Subtotal</th>
	</tr>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mCartItems) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemName'];?>
 <br/><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['quantity'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartItems[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['subtotal'];?>
</td>
		</tr>
	<?php endfor; endif; ?>
</table>
<div>
	Total amount:
	<font class="price">&pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTotalAmount;?>
<br/><br/></font>
</div>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mNoCreditCard=='yes'){?>
	<div class="error">No credit card details stored.</div>
<?php }else{ ?>
	<div><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCreditCardNote;?>
<br/><br/></div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mNoShippingAddress=='yes'){?>
	<div class="error">Shipping address required to place order.</div>
<?php }else{ ?>
	<div>
		Shipping address: <br/>
		&nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['addressLineOne'];?>
<br/>
		&nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['town'];?>
<br/>
		&nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['city'];?>
<br/>
		&nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['county'];?>
<br/>
		&nbsp;<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomerData['postcode'];?>
<br/><br/>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mNoCreditCard!='yes'&&$_smarty_tpl->tpl_vars['obj']->value->mNoShippingAddress!='yes'){?>
	<div>
		Shipping type:
		<select name="shipping">
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mShippingInfo) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShippingInfo[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingID'];?>
">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShippingInfo[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingType'];?>

			</option>
		<?php endfor; endif; ?>
		</select>
	</div>
<?php }?>
<input type="submit" name="place_order" value="Place Order"
<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOrderButtonVisible;?>
 /> |
<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCart;?>
">Edit Shopping Cart</a> |
<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping;?>
">Continue Shopping</a>
</form><?php }} ?>