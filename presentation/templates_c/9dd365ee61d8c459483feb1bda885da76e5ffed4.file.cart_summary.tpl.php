<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 20:15:21
         compiled from "C:\emart/presentation/templates\cart_summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207614f9bd6292b6721-72023417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dd365ee61d8c459483feb1bda885da76e5ffed4' => 
    array (
      0 => 'C:\\emart/presentation/templates\\cart_summary.tpl',
      1 => 1363374920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207614f9bd6292b6721-72023417',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f9bd629416bb2_43044302',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f9bd629416bb2_43044302')) {function content_4f9bd629416bb2_43044302($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"cart_summary",'assign'=>"obj"),$_smarty_tpl);?>


	<div class="box" id="cart-summary">
		<h3>Cart Summary</h3>
		<div id="updating">Updating...</div>
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEmptyCart){?>
			<div class="empty-cart">Your shopping cart is empty!</div>
		<?php }else{ ?>
			<table class="cart-summary standard-table">
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mItems) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<td width="30" valign="top" align="right">
								<?php echo $_smarty_tpl->tpl_vars['obj']->value->mItems[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['quantity'];?>
 x
							</td>
							<td class="cart-summary-attributes">
								<?php echo $_smarty_tpl->tpl_vars['obj']->value->mItems[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemName'];?>
 <br/><?php echo $_smarty_tpl->tpl_vars['obj']->value->mItems[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['attributes'];?>

							</td>
						</tr>
					<?php endfor; endif; ?>
					<tr>
						<td colspan="2">
							<span class="price">&pound<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTotalAmount;?>

                            </span>
							<span style="float:right">
								[ <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartDetails;?>
">View details</a> ]
							</span>
						</td>
					</tr>
				</tbody>
			</table>
		<?php }?>
	</div>
<?php }} ?>