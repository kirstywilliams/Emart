<?php /* Smarty version Smarty-3.1.8, created on 2012-05-14 02:07:40
         compiled from "C:\emart/presentation/templates\admin_stock_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:291674fb04c14940e80-81051654%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd897efa7be59fbf52eb2ff7a6764ea56d8cd1622' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_stock_details.tpl',
      1 => 1336954057,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '291674fb04c14940e80-81051654',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fb04c14ae92d0_77731171',
  'variables' => 
  array (
    'obj' => 0,
    'selected' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb04c14ae92d0_77731171')) {function content_4fb04c14ae92d0_77731171($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
if (!is_callable('smarty_function_html_options')) include 'C:\\emart/libs/smarty/plugins\\function.html_options.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_stock_details",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStockDetailsAdmin;?>
">
	<div class="innerheading">
		Editing item: ID #<?php echo $_smarty_tpl->tpl_vars['obj']->value->mItemID;?>

		[<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStockControlAdmin;?>
">back to stock control ...</a> ]
	</div>
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</div><?php }?>
	<table class="borderless-records">
		<tr>
			<td class="bold-text">Item Name:</td>
			<td><input type="text" name="item_name" disabled="disabled"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStockDetails['itemName'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Current Quantity:</td>
			<td><input type="text" name="current_qty"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStockDetails['currentQuantity'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Ideal Quantity:</td>
			<td><input type="text" name="ideal_qty"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStockDetails['idealQuantity'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Status: </td>
			<td>
				<select name="status" disabled="disabled" >
					<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStockDetails['status']=='Stocked'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(0, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mStockDetails['status']=='Medium'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(1, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mStockDetails['status']=='Reorder'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(2, null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['obj']->value->mStockDetails['status']=='OutOfStock'){?>
						<?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable(3, null, 0);?>
					<?php }?>
			
					<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['obj']->value->mStockStatusOptions,'selected'=>$_smarty_tpl->tpl_vars['selected']->value),$_smarty_tpl);?>

				</select>
			</td>
		</tr>
		<tr>
			<td class="bold-text">Supplier ID:</td>
			<td><input type="text" name="supplier" disabled="disabled"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStockDetails['supplierID'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td></td>
			<td align="right">
				<input type="submit" name="UpdateStockInfo" value="Update info" />
			</td>
		</tr>
	</table>
</form><?php }} ?>