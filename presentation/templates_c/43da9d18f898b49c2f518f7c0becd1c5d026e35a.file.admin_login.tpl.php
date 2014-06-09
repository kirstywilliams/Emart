<?php /* Smarty version Smarty-3.1.8, created on 2012-05-15 20:19:13
         compiled from "C:\emart/presentation/templates\admin_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194844f834ed478a5d7-73821761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43da9d18f898b49c2f518f7c0becd1c5d026e35a' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_login.tpl',
      1 => 1337105951,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194844f834ed478a5d7-73821761',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f834ed47eb759_55801686',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f834ed47eb759_55801686')) {function content_4f834ed47eb759_55801686($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_login",'assign'=>"obj"),$_smarty_tpl);?>

<div class="heading">Site Administrator Login</div>
<div id="loginsubtitle">Enter login information or go back to
	<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToIndex;?>
">eMart Storefront</a>.
</div>
<form id="adminloginform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">
	<?php if ($_smarty_tpl->tpl_vars['obj']->value->mLoginMessage!=''){?>
		<div class="errorMessage" align="center"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLoginMessage;?>
</div>
	<?php }?>
    <label class="textlabel" for="username">Username:&nbsp;&nbsp;</label>
	<input name="username" type="text" class="textbox" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mUsername;?>
" /><br/><br/>
   	<label class="textlabel" for="password">Password:&nbsp;&nbsp;&nbsp;</label>
	<input name="password" type="password" class="textbox" value="" /><br/><br/>
	<input name="forgot" type="submit" id="fpwd" value="Forgotten Password?" />
	<input name="submit" type="submit" id="btnLogin" value="Login" />
</form><?php }} ?>