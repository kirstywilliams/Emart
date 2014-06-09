<?php /* Smarty version Smarty-3.1.8, created on 2012-05-14 01:35:18
         compiled from "C:\emart/presentation/templates\admin_stock_control.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51954fb045368778d2-59815110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35685fc4fc43d0e60f3ac4db836d19caf9dbdc90' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_stock_control.tpl',
      1 => 1336950588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51954fb045368778d2-59815110',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fb04536b5b330_43677844',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb04536b5b330_43677844')) {function content_4fb04536b5b330_43677844($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_stock_control",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="heading">eMart Stock</div>
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStockControlAdmin;?>
">
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>
		<div class="errorMessage">
			<?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>

		</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock){?>
		<table class="records">
			<tr>
				<th>Item ID</th>
				<th>Item Name</th>
				<th>Status</th>
				<th>Tools</th>
			</tr>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mStock) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<?php $_smarty_tpl->tpl_vars['status'] = new Smarty_variable($_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['status'], null, 0);?>
				<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemName'];?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['status']=='Stocked'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStockStatusOptions[0];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['status']=='Medium'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStockStatusOptions[1];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['status']=='Reorder'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStockStatusOptions[2];?>
</td>
				<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['status']=='OutOfStock'){?>
					<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStockStatusOptions[3];?>
</td>
				<?php }?>
				<td align="right">
					<input type="submit" name="submit_edit_prod_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStock[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['itemID'];?>
" value="View Details" />
				</td>
				</tr>
			<?php endfor; endif; ?>
		</table>
	<?php }?>
	</form><?php }} ?>