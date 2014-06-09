<?php /* Smarty version Smarty-3.1.8, created on 2012-05-12 23:39:15
         compiled from "C:\emart/presentation/templates\admin_customer_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49384fae5199743bf7-82007723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '469f4b281bc379250eea063d4cc0fb0b6b934316' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_customer_details.tpl',
      1 => 1336858714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49384fae5199743bf7-82007723',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fae519991a4a6_98527791',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae519991a4a6_98527791')) {function content_4fae519991a4a6_98527791($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_customer_details",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCustomerAdmin;?>
">
	<div class="innerheading">
		Editing customer: ID #<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['customerID'];?>

		[<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCustomersAdmin;?>
">back to customers ...</a> ]
	</div>
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?><div class="errorMessage"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</div><?php }?>
	<table class="borderless-records">
		<tr>
			<td class="bold-text">First name:</td>
			<td><input type="text" name="customer_first_name"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['firstname'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Surname:</td>
			<td><input type="text" name="customer_surname"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['surname'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Email address:</td>
			<td><input type="text" name="customer_email"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['emailAddress'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Password:</td>
			<td><input type="text" name="customer_password"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['password'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text">Telephone number:</td>
			<td><input type="text" name="customer_telephone"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['telephoneNumber'];?>
" size="30" />
			</td>
		</tr>
		<tr>
			<td class="bold-text"><div style="float:left">Shipping Address: </div>
			<div style="float:right;text-align:right;margin-right:10px" width="50%">
			Street<br/>
			Town<br/>
			City<br/>
			County<br/>
			Postcode<br/><br/>
			</div></td>
			<td>
				<input name="customer_address_line_one" type="text" size="50"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['addressLineOne'];?>
" /><br/>
				
				<input name="customer_town" type="text" size="50"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['town'];?>
" /><br/>
				
				<input name="customer_city" type="text" size="50"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['city'];?>
" /><br/>
				
				<input name="customer_county" type="text" size="50"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['county'];?>
" /><br/>
				
				<input name="customer_postcode" type="text" size="25"
				value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCustomers['postcode'];?>
" /><br/><br/>
			</td>
		</tr>
		<tr>
			<td></td>
			<td align="right">
				<input class="centerBtn" type="submit" name="UpdateCustomerInfo"
				value="Update info" />
				<input style="color:red; font-weight:bold" type="submit" name="RemoveFromDatabase"
				value="Remove customer from database" />
			</td>
		</tr>
	</table>
</form><?php }} ?>