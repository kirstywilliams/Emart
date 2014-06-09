<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 20:45:22
         compiled from "C:\emart/presentation/templates\department.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26614f80afd1079560-93918254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87024456a52094fd4cc08c7a76a624597939bd8e' => 
    array (
      0 => 'C:\\emart/presentation/templates\\department.tpl',
      1 => 1363376719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26614f80afd1079560-93918254',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f80afd10a1931_79788166',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f80afd10a1931_79788166')) {function content_4f80afd10a1931_79788166($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"department",'assign'=>"obj"),$_smarty_tpl);?>

<h2><?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
</h2><br/>
<div id="bolded-line"></div>
<span><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDescription;?>
</span>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowEditButton){?>
	<form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditActionTarget;?>
" method="post" class="edit-form">
		<input class="button light" type="submit" name="submit_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditAction;?>
"
		value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditButtonCaption;?>
" />
	</form>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>