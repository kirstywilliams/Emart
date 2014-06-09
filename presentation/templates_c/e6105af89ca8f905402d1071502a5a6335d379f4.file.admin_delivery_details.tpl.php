<?php /* Smarty version Smarty-3.1.8, created on 2012-05-13 02:38:32
         compiled from "C:\emart/presentation/templates\admin_delivery_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319054faefed62ea895-78306556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6105af89ca8f905402d1071502a5a6335d379f4' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_delivery_details.tpl',
      1 => 1336869504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319054faefed62ea895-78306556',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4faefed6394952_46837799',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4faefed6394952_46837799')) {function content_4faefed6394952_46837799($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_delivery_details",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToDeliveryAdmin;?>
">
	<div class="innerheading">
		Editing delivery: ID #<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDeliveryID;?>

		[<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSupplierDeliveriesAdmin;?>
">back to deliveries ...</a> ]
	</div>
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</div><?php }?>
	<table class="borderless-records">
		<tr>
			<td class="bold-text">Supplier Name:</td>
			<td>
				<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDeliveries['supplierName'];?>
" 
				readonly="readonly" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Date:</td>
			<td><input type="text" name="delivery_date"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDeliveries['dateOfDelivery'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Time:</td>
			<td><input type="text" name="delivery_time"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDeliveries['timeOfDelivery'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td></td>
			<td align="right">
				<input type="submit" name="UpdateDeliveryInfo" value="Update info" />
				<input style="color:red; font-weight:bold" type="submit" name="RemoveDelivery"
				value="Remove delivery from database" />
			</td>
		</tr>
	</table>
</form><?php }} ?>