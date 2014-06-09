<?php /* Smarty version Smarty-3.1.8, created on 2012-05-12 21:51:27
         compiled from "C:\emart/presentation/templates\admin_carts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26414f9c02b38d9251-46301407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93b182ad785f0eafd0c7d10718813c07a5727562' => 
    array (
      0 => 'C:\\emart/presentation/templates\\admin_carts.tpl',
      1 => 1336852283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26414f9c02b38d9251-46301407',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f9c02b39ea293_93428969',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f9c02b39ea293_93428969')) {function content_4f9c02b39ea293_93428969($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
if (!is_callable('smarty_function_html_options')) include 'C:\\emart/libs/smarty/plugins\\function.html_options.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_carts",'assign'=>"obj"),$_smarty_tpl);?>

	<div class="heading">eMart Shopping Carts: </div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartsAdmin;?>
" method="post">
		<?php if ($_smarty_tpl->tpl_vars['obj']->value->mMessage){?>
			<div class="errorMessage">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMessage;?>

			</div>
		<?php }?>
		<p>
			Select carts:
			<?php echo smarty_function_html_options(array('name'=>"days",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mDaysOptions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mSelectedDaysNumber),$_smarty_tpl);?>

			<input type="submit" name="submit_count" value="Count Old Shopping Carts" />
			<input type="submit" name="submit_delete"
			value="Delete Old Shopping Carts" />
		</p>
	</form> <?php }} ?>