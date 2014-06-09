<?php /* Smarty version Smarty-3.1.8, created on 2012-05-09 23:37:36
         compiled from "C:\emart/presentation/templates\order_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:277984faae3a0573d03-51958211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27ba485fc5242996436338a45cce3d158d205507' => 
    array (
      0 => 'C:\\emart/presentation/templates\\order_error.tpl',
      1 => 1336349720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '277984faae3a0573d03-51958211',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4faae3a0ab6ee4_98686529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4faae3a0ab6ee4_98686529')) {function content_4faae3a0ab6ee4_98686529($_smarty_tpl) {?>
<div class="heading">An error has occurred during the processing of your order.</div>
<div class="description">
If you have any questions regarding this message please email
<a href="mailto:<?php echo @CUSTOMER_SERVICE_EMAIL;?>
">
<?php echo @CUSTOMER_SERVICE_EMAIL;?>
</a>
</div><?php }} ?>