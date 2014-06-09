<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 19:46:34
         compiled from "C:\emart/presentation/templates\cart_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:255354f9bdb0430eff4-09120142%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '602f7e788ce7f93dee5a1a5ceb2244a38772d0cd' => 
    array (
      0 => 'C:\\emart/presentation/templates\\cart_details.tpl',
      1 => 1363373192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255354f9bdb0430eff4-09120142',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f9bdb04470b29_65068371',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f9bdb04470b29_65068371')) {function content_4f9bdb04470b29_65068371($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"cart_details",'assign'=>"obj"),$_smarty_tpl);?>

<div id="updating">Updating...</div>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsCartNowEmpty==1){?>
	<h2>Your shopping cart is empty!<h2>
      <div id="bolded-line"></div>
<?php }else{ ?>
	<h3>These are the products in your shopping cart:</h3>
    <div id="bolded-line"></div>
	<form class="cart-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mUpdateCartTarget;?>
"
	onsubmit="return executeCartAction(this);">
		<table class="standard-table">
			<tr>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				<th width="100px">Tools</th>
			</tr>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mCartProducts) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<td>
						<input name="productId[]" type="hidden"
							value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['productID'];?>
" />
						<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemName'];?>
<br/>
						<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes'];?>

					</td>
					<td>&pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['price'];?>
</td>
					<td>
						<input type="text" name="quantity[]" size="5"
							value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['quantity'];?>
" />
					</td>
					<td>&pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['subtotal'];?>
</td>
					<td>
						<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['save'];?>
"
							onclick="return executeCartAction(this);">Save for later</a>
						<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['remove'];?>
"
							onclick="return executeCartAction(this);">Remove</a>
					</td>
				</tr>
			<?php endfor; endif; ?>
		</table>
		<table class="standard-table">
			<tr>
				<td align="right">
                	Total amount: &pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTotalAmount;?>

					<input style="margin-left:20px;" class="button light" type="submit" name="update" value="Update" />
				</td>
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowCheckoutLink){?>
					<td align="right">
						<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCheckout;?>
">Checkout</a>
					</td>
				<?php }?>
			</tr>
		</table>
	</form>
<?php }?>

<?php if (($_smarty_tpl->tpl_vars['obj']->value->mIsCartLaterEmpty==0)){?>
	<br/><br/>
	<h3>Saved products to buy later:</h3>
	<table class="standard-table">
		<tr>
			<th>Product Name</th>
			<th>Price</th>
			<th width="100px">Tools</th>
		</tr>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
			<tr>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['itemName'];?>
<br/>
					<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['attributes'];?>

				</td>
				<td>
					&pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['price'];?>

				</td>
				<td>
					<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['move'];?>
"
						onclick="return executeCartAction(this);">Move to cart</a>
					<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSavedCartProducts[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['remove'];?>
"
						onclick="return executeCartAction(this);">Remove</a>
				</td>
			</tr>
		<?php endfor; endif; ?>
	</table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping){?>
	<p><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping;?>
">Continue Shopping </a></p>
<?php }?><?php }} ?>