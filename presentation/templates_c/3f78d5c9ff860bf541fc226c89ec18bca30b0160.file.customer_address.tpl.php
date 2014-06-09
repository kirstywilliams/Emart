<?php /* Smarty version Smarty-3.1.8, created on 2012-05-01 22:48:05
         compiled from "C:\emart/presentation/templates\customer_address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117794fa04c055abeb5-01835708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f78d5c9ff860bf541fc226c89ec18bca30b0160' => 
    array (
      0 => 'C:\\emart/presentation/templates\\customer_address.tpl',
      1 => 1335895542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117794fa04c055abeb5-01835708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fa04c0568a604_23723223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa04c0568a604_23723223')) {function content_4fa04c0568a604_23723223($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"customer_address",'assign'=>"obj"),$_smarty_tpl);?>

<div class="title">Please enter your address details:</div>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAddressDetails;?>
">
	<table class="customer-table">
		<tr>
			<td>Street Address:</td>
			<td>
				<input type="text" name="addressLineOne" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAddressLineOne;?>
"
				size="32" />
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mAddressLineOneError){?>
					<div class="error">You must enter an address.</div>
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>Town:</td>
			<td>
				<input type="text" name="town" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTown;?>
"
				size="32" />
			</td>
		</tr>
		<tr>
			<td>City:</td>
			<td>
				<input type="text" name="city" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCity;?>
"
				size="32" />
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCityError){?>
					<div class="error">You must enter a city.</div>
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>County:</td>
			<td>
				<input type="text" name="county" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCounty;?>
"
				size="32" />
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCountyError){?>
					<div class="error">You must enter a county.</div>
				<?php }?>
			</td>
		</tr>
		<tr>
			<td>Post Code:</td>
			<td>
				<input type="text" name="postCode" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPostCode;?>
"
				size="32" />
				<?php if ($_smarty_tpl->tpl_vars['obj']->value->mPostCodeError){?>
					<div class="error">You must enter a post code.</div>
				<?php }?>
			</td>
		</tr>
	</table>
	<input type="submit" name="sendit" value="Confirm" /> |
	<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCancelPage;?>
">Cancel</a>
</form><?php }} ?>