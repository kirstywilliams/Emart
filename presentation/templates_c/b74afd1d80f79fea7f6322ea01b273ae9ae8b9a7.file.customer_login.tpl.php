<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 20:25:11
         compiled from "C:\emart/presentation/templates\customer_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:272624fa02c0a6c91a2-59953705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b74afd1d80f79fea7f6322ea01b273ae9ae8b9a7' => 
    array (
      0 => 'C:\\emart/presentation/templates\\customer_login.tpl',
      1 => 1363375508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '272624fa02c0a6c91a2-59953705',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fa02c0a7dd688_08646337',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fa02c0a7dd688_08646337')) {function content_4fa02c0a7dd688_08646337($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"customer_login",'assign'=>"obj"),$_smarty_tpl);?>

<div class="box">
	<h3>Login</h3>
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLogin;?>
">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?><div class="error"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</div><?php }?>
		<div>
			<label for="email">E-mail address:</label>
			<input type="text" name="email" size="18"
			value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEmail;?>
" />
		</div>
		<div>
			<label for="password">Password:</label>
			<input type="password" name="password" size="18" />
		</div>
		<div>
			<br/>
			<input class="button light" type="submit" name="Login" value="Login" /> |
			<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToRegisterCustomer;?>
">Register</a>
		</div>
		<div>
        <br/>
			<input class="button light" name="forgot" type="submit" id="fpwd" value="Forgotten Password?" />
		</div>
	</form>
</div><?php }} ?>