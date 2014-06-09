<?php /* Smarty version Smarty-3.1.8, created on 2012-05-15 17:25:08
         compiled from "C:\emart/presentation/templates\admin_shipping.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165754fb27514a5bcb0-59389622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad911e5cd82b4ff394dfe087896cbe8302e1e6c8' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_shipping.tpl',
      1 => 1337095506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165754fb27514a5bcb0-59389622',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fb27514c92f47_95277283',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb27514c92f47_95277283')) {function content_4fb27514c92f47_95277283($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?> 
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_shipping",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="heading">eMart Shipping Methods</div>
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToShippingAdmin;?>
">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>
			<div class="errorMessage">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>

			</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mShippingCount==0){?>
			<div class="noitemsfound">
				There are no shipping methods in your database!
			</div><!-- end noitemsfound -->
		<?php }else{ ?>
			<table class="records">
				<tr>
				<th width="500px">Shipping Type</th>
				<th width ="200px">Shipping Cost</th>
				<th width="160px">Tools</th>
				</tr>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mShipping) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditShipping==$_smarty_tpl->tpl_vars['obj']->value->mShipping[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingID']){?>
						<tr>
							<td>
								<input type="text" name="type" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShipping[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingType'];?>
" size="30" />
							</td>
							<td>
								<input type="text" name="cost" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShipping[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingCost'];?>
" size="30" />
							</td>
							<td>
								<input type="submit" name="submit_update_ship_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShipping[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingID'];?>
" value="Update" />
								<input type="submit" name="cancel" value="Cancel" />
								<input type="submit" name="submit_delete_ship_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShipping[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingID'];?>
" value="Delete" />
							</td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mShipping[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingType'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mShipping[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingCost'];?>
</td>
							<td>
								<input type="submit" name="submit_edit_ship_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShipping[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingID'];?>
" value="Edit" />
								<input type="submit" name="submit_delete_ship_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mShipping[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['shippingID'];?>
" value="Delete" />
							</td>
						</tr>
					<?php }?>
				<?php endfor; endif; ?>
			</table>
		<?php }?>
		<div class="subtitle">
			Add new shipping type:
		</div>
		<p>
			<input type="text" name="shipping_type" value="[type]" size="30" />
			<input type="text" name="shipping_cost" value="[cost]" size="30" />
			<input type="submit" name="submit_add_ship_0" value="Add" />
		</p>
	</form><?php }} ?>