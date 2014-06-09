<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 20:02:06
         compiled from "C:\emart/presentation/templates\customer_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:311194fa041c08ed262-24847944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '523243bcee7d27eb7a66c23fca8945e246138799' => 
    array (
      0 => 'C:\\emart/presentation/templates\\customer_details.tpl',
      1 => 1363374122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '311194fa041c08ed262-24847944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fa041c0a33203_24796154',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa041c0a33203_24796154')) {function content_4fa041c0a33203_24796154($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"customer_details",'assign'=>"obj"),$_smarty_tpl);?>

<h3>Please enter your details:</h3>
<div id="bolded-line"></div>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAccountDetails;?>
">
<table class="standard-table">
	<tr>
		<td>Email Address:</td>
		<td>
			<input class="table-input" type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEmail;?>
"
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditMode){?>readonly="readonly"<?php }?> size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEmailAlreadyTaken){?>
				<div class="error">A customer with that email address already exists.</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEmailError){?>
				<div class="error">You must enter a valid email address.</div>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>First name:</td>
		<td>
			<input class="table-input" type="text" name="firstname" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mFirstName;?>
" size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mFirstNameError){?>
				<div class="error">You must enter your first name.</div>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>Surname:</td>
		<td>
			<input class="table-input" type="text" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSurname;?>
" size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mSurnameError){?>
				<div class="error">You must enter your surname.</div>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>Password:</td>
		<td>
			<input class="table-input" type="password" name="password" size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mPasswordError){?>
				<div class="error">You must enter a password.</div>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>Re-enter Password:</td>
		<td>
			<input class="table-input" type="password" name="passwordConfirm" size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mPasswordConfirmError||$_smarty_tpl->tpl_vars['obj']->value->mPasswordMatchError){?>
				<div class="error">You must re-enter your password.</p>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>Street Address:</td>
		<td>
			<input class="table-input" type="text" name="addressLineOne" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAddressLineOne;?>
" size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mAddressLineOneError){?>
				<div class="error">You must enter your street address.</div>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>Town:</td>
		<td>
			<input class="table-input" type="text" name="town" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTown;?>
" size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mTownError){?>
				<div class="error">You must enter your town.</div>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>City</td>
		<td>
			<input class="table-input" type="text" name="city" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCity;?>
" size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCityError){?>
				<div class="error">You must enter your city.</div>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>County:</td>
		<td>
			<input class="table-input" type="text" name="county" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCounty;?>
" size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mCountyError){?>
				<div class="error">You must enter your county.</div>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>Post Code:</td>
		<td>
			<input class="table-input" type="text" name="postcode" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPostCode;?>
" size="12" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mPostCodeError){?>
				<div class="error">You must enter your post code.</div>
			<?php }?>
		</td>
	</tr>
	<tr>
		<td>Telephone:</td>
		<td>
			<input class="table-input" type="text" name="telephone" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTelephone;?>
"
			size="32" />
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mTelephoneError){?>
				<div class="error">You must enter your telephone number.</div>
			<?php }?>
		</td>
	</tr>
</table>
<div style="text-align:center; margin-top:10px;">
	<input class="button light" type="submit" name="sendit" value="Confirm" /> |
	<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCancelPage;?>
">Cancel</a>
</div>
</form><?php }} ?>