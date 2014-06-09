<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 17:54:15
         compiled from "C:\emart/presentation/templates\first_page_contents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:306534f80eccb634782-42316500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '178e9b9e038d097f299caac613ed0b385677345d' => 
    array (
      0 => 'C:\\emart/presentation/templates\\first_page_contents.tpl',
      1 => 1363366453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '306534f80eccb634782-42316500',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f80eccb68df26_45531651',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f80eccb68df26_45531651')) {function content_4f80eccb68df26_45531651($_smarty_tpl) {?>
<div id="page-title">
	<h2>Welcome to eMart, the 100% Organic Supermarket</h2>
    <div id="bolded-line"></div>
</div>
<div id="page-title">
	<p>After a lot of nurturing, our online store is ready to bring delicious organic food 
	to every home. Now you can shop from the comfort of your home and browse through our 
	selection of locally sourced, certified organic products.<br/><br/>
	Browse our departments and cateogories to find your favorite items!</p>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>