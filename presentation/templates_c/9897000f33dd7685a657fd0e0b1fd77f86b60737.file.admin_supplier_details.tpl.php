<?php /* Smarty version Smarty-3.1.8, created on 2012-05-13 00:24:22
         compiled from "C:\emart/presentation/templates\admin_supplier_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:255834faed7abb024e6-84143044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9897000f33dd7685a657fd0e0b1fd77f86b60737' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_supplier_details.tpl',
      1 => 1336861459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255834faed7abb024e6-84143044',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4faed7abc14541_64180314',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4faed7abc14541_64180314')) {function content_4faed7abc14541_64180314($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_supplier_details",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSupplierAdmin;?>
">
	<div class="innerheading">
		Editing supplier: ID #<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers['supplierID'];?>

		[<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSuppliersAdmin;?>
">back to suppliers ...</a> ]
	</div>
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</div><?php }?>
	<table class="borderless-records">
		<tr>
			<td class="bold-text">Company Name:</td>
			<td><input type="text" name="supplier_name"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers['supplierName'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Email address:</td>
			<td><input type="text" name="supplier_email"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers['emailAddress'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Telephone number:</td>
			<td><input type="text" name="supplier_telephone"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers['telephoneNumber'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text"><div style="float:left">Company Address: </div>
			<div style="float:right;text-align:right;margin-right:10px" width="50%">
			Street<br/>
			Town<br/>
			City<br/>
			County<br/>
			Postcode<br/><br/>
			</div></td>
			<td>
				<input name="supplier_address_line_one" type="text" size="50"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers['addressLineOne'];?>
" /><br/>
				
				<input name="supplier_town" type="text" size="50"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers['town'];?>
" /><br/>
				
				<input name="supplier_city" type="text" size="50"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers['city'];?>
" /><br/>
				
				<input name="supplier_county" type="text" size="50"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers['county'];?>
" /><br/>
				
				<input name="supplier_postcode" type="text" size="25"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSuppliers['postcode'];?>
" /><br/><br/>
			</td>
		</tr>
		<tr>
			<td></td>
			<td align="right">
				<input type="submit" name="EditSupplierDeliveries" value="View Deliveries" />
				<input type="submit" name="UpdateSupplierInfo" value="Update info" />
				<input style="color:red; font-weight:bold" type="submit" name="RemoveFromDatabase"
				value="Remove supplier from database" />
			</td>
		</tr>
	</table>
</form><?php }} ?>