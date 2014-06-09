<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 19:39:01
         compiled from "C:\emart/presentation/templates\contact_us.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152414fad60a272ff77-64735249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94de9b1e8a79c9dbba463854b44b0a9db07f3ed4' => 
    array (
      0 => 'C:\\emart/presentation/templates\\contact_us.tpl',
      1 => 1363372739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152414fad60a272ff77-64735249',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fad60a27a9bc2_50456767',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fad60a27a9bc2_50456767')) {function content_4fad60a27a9bc2_50456767($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"contact_us",'assign'=>"obj"),$_smarty_tpl);?>

<h1>Contact us</h1>
<div id="bolded-line"></div>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>
	<div class="error">
		<?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>

	</div>
<?php }?>
<div class="info">
	<form id="contact_form" name="contact_form" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContactUs;?>
" method="POST">
		<label class="contact_label">Name
			<span class="contact_small">Add your name</span>
		</label><input type="text" name="name" <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
"<?php }?>/><br/>
		<label class="contact_label">Email
			<span class="contact_small">Enter a Valid Email</span>
		</label><input type="text" name="email" <?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?>value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEmail;?>
"<?php }?>/><br/>
		<label class="contact_label">Message
			<span class="contact_small">Type Your Message</span>
		</label><textarea name="message" rows="10" cols="23"><?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMessage;?>
<?php }?></textarea><br/>
		<button class="button light" type="submit" name="contact_us" value="contact_us">Submit</button>                        
	</form>
</div><?php }} ?>