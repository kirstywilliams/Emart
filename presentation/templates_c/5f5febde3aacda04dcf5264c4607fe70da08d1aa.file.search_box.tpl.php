<?php /* Smarty version Smarty-3.1.8, created on 2012-04-09 17:37:41
         compiled from "C:\emart/presentation/templates\search_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:220464f82393e022bd8-49641090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f5febde3aacda04dcf5264c4607fe70da08d1aa' => 
    array (
      0 => 'C:\\emart/presentation/templates\\search_box.tpl',
      1 => 1333981962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220464f82393e022bd8-49641090',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f82393e05ad29_09416365',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f82393e05ad29_09416365')) {function content_4f82393e05ad29_09416365($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"search_box",'assign'=>"obj"),$_smarty_tpl);?>


<div id="search_feature">
	<div id="searchlabel">Search</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSearch;?>
" method="post" name="search_form">
		<input id="search_string" name="search_string" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSearchString;?>
" maxlength="100" />
		<input id="search_button" type="submit" value="GO!" />
		<div id="search_checkbox">
			<input type="checkbox" id="all_words" name="all_words"
			<?php if ($_smarty_tpl->tpl_vars['obj']->value->mAllWords=="on"){?> checked="checked" <?php }?>/>
			Search for all words
		</div>
	</form>
</div>
<?php }} ?>