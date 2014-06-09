<?php /* Smarty version Smarty-3.1.8, created on 2012-04-10 00:16:51
         compiled from "C:\emart/presentation/templates\store_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:249754f834ed46d53a4-35720645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '172998ec535c2c9a7021a84813b35ff120b22cb7' => 
    array (
      0 => 'C:\\emart/presentation/templates\\store_admin.tpl',
      1 => 1334009807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '249754f834ed46d53a4-35720645',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f834ed476c183_40319402',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f834ed476c183_40319402')) {function content_4f834ed476c183_40319402($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"store_admin",'assign'=>"obj"),$_smarty_tpl);?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kisacasa eCommerce Administrative Back-end</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
styles/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="pagewrap">
    	<div id="container">
			<div id="header">
            	<div id="logo">
           	    	<img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
images/admin_logo.png" width="480" height="150" alt="eMart" /></div><!-- end logo -->
                <div id="hright">
                <div id="hright1">Kisacasa eCommerce Solution</div><!-- end hright1 -->
                <div id="hright2">Support</div><!-- end hright2 -->
                </div><!-- end hright -->
            </div><!-- end header --> 
            <div id="hbottomborder"></div><!-- end hbottomborder -->
            <div id="status">
           	  <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mMenuCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div><!-- end status -->
          	<div id="center"><!-- end center -->
          		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mContentsCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			</div><!-- end center -->
        	<div id="footer">
        		&copy; Copyright eMart 2012<br/>
            	CREATED BY KISACASA
        	</div><!-- end footer -->
		</div><!-- end container -->    
	</div><!-- end pagewrap -->
</body>
</html>
<?php }} ?>