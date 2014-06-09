<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 19:23:35
         compiled from "C:\emart/presentation/templates\store_front.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194744f7fd46ee84185-24009258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb0af9182795c8b7933021e603c41b82260e8487' => 
    array (
      0 => 'C:\\emart/presentation/templates\\store_front.tpl',
      1 => 1363371812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194744f7fd46ee84185-24009258',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f7fd46f03f7b0_21918017',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7fd46f03f7b0_21918017')) {function content_4f7fd46f03f7b0_21918017($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include 'C:\\emart/presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php  $_config = new Smarty_Internal_Config("site.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"store_front",'assign'=>"obj"),$_smarty_tpl);?>


<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPageTitle;?>
</title>
	<meta name="description" content="">
	<meta name="author" content="Kirsty Williams - www.kirstywilliams.co.uk">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
styles/layout.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
styles/style.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
styles/structure.css" id="layout">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
images/apple-touch-icon-114x114.png">
    
    <!-- Scripts
	================================================== -->
    <link href='http://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/custom.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/selectnav.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/flexslider.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/twitter.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/tooltip.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/effects.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/fancybox.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/carousel.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/isotope.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
scripts/ajax.js"></script>
</head>

<body>
<div id="wrapper">
	<!-- Header Layout
	================================================== -->
    <div class="container ie-dropdown-fix">
        <!-- header start -->
        <div id="header">
        
            <!-- logo start -->
            <div class="ten columns">
            	<div id="logo">
					 <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
images/logo.png" alt="" /></a>
                	<div id="slogan">Fresh, Local, Organic Produce</div>
                    <div class="clear"></div>
				</div><!-- end logo -->
            </div><!-- logo -->
            
            <div class="six columns">
            	<ul class="basket-icons">
                	<li class="nav-with-margin"><i class="ico-shopping-cart"></i></li>
                    <li class="nav-no-margin"><div class="nav-margin"><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartDetails;?>
">Shopping Cart</a></div></li>
                    <li class="nav-with-margin"><div class="nav-margin"><a href="#">Help</a></div></li>
                </ul>            
                <div class="clear"></div>
            </div>
        </div><!-- header -->        
        
        <!-- navigation start-->
        <div class="sixteen columns">
            <div id="navigation">
                <ul id="nav">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToIndex;?>
">Home</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAboutUs;?>
">About</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContactUs;?>
">Contact</a></li>
                     <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartDetails;?>
">Your Cart</a></li>
                </ul>
            </div> 
            <div class="clear"></div>
        </div>
        <!-- navigation end -->
    </div><!-- container -->
    
    <div class="container">
    	<div class="sixteen columns">
        	<div class="three columns">
            	<?php if (!$_smarty_tpl->tpl_vars['obj']->value->mHideBoxes){?>						
					<?php echo $_smarty_tpl->getSubTemplate ("departments_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mCategoriesCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php }?>
            </div>
            
            <div class="nine columns">
            	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mContentsCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>
            
            <div class="three columns">
                <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mLoginOrLoggedCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                                
                <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mHideBoxes){?>
                    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mCartSummaryCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php }?>
            </div>
        </div>
    </div>    
</div><!-- wrapper -->

<!-- Footer Layout
================================================== -->
<!-- footer start -->
<div id="footer">
	<!-- 960 container start -->
	<div class="container">
		<!-- about start -->
		<div class="five columns">
			<div class="footer-headline"><h4>About Us</h4></div>
			<p>Building<br/>
            Street<br/>
			Town<br/>
			City. Post Code</p>
			<p>email: info@kisacasa.com</p>
			<p>Company Registration No. ####### (England & Wales)<br/>
			VAT Registartion No.### #### ##</p>
		</div>
        <!-- about end -->
		
		<!-- links start -->
		<div class="five columns">
			<div class="footer-headline"><h4>Useful Links</h4></div>
			<ul class="links-list">
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContactUs;?>
">Contact</a></li>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTerms;?>
">T's & C's</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToPrivacyPolicy;?>
">Privacy Policy</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToFAQ;?>
">FAQ</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">Admin Area</a></li>
			</ul>
		</div>
        <!-- links end -->
		
		<!-- tweets start -->
		<div class="six columns">
			<div class="footer-headline"><h4>Latest Tweets</h4></div>
			<ul id="twitter"></ul>
				<script type="text/javascript">
					jQuery(document).ready(function($){
					$.getJSON('http://api.twitter.com/1/statuses/user_timeline/kisacasa_emart.json?count=2&callback=?', function(tweets){
					$("#twitter").html(tz_format_twitter(tweets));
					}); });
				</script>
			<div class="clear"></div>
		</div>
        <!-- tweets end -->

		<!-- copyright start -->
		<div class="sixteen columns">
			<div id="footer-bottom">
				Website designed by <a href="www.kirstywilliams.co.uk">www.kirstywilliams.co.uk</a>
				<div id="scroll-top-top"><a href="#"></a></div>
			</div>
		</div>
        <!-- copyright end -->
	</div>
	<!-- 960 container end -->
</div>
<!-- footer end -->
<!-- End Document
================================================== -->
</body>
</html><?php }} ?>