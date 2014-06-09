{* smarty *}
{config_load file="site.conf"}
{load_presentation_object filename="store_front" assign="obj"}

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>{$obj->mPageTitle}</title>
	<meta name="description" content="">
	<meta name="author" content="Kirsty Williams - www.kirstywilliams.co.uk">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="{$obj->mSiteUrl}styles/layout.css">
    <link rel="stylesheet" href="{$obj->mSiteUrl}styles/style.css">
    <link rel="stylesheet" href="{$obj->mSiteUrl}styles/structure.css" id="layout">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="{$obj->mSiteUrl}images/favicon.ico">
	<link rel="apple-touch-icon" href="{$obj->mSiteUrl}images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="{$obj->mSiteUrl}images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="{$obj->mSiteUrl}images/apple-touch-icon-114x114.png">
    
    <!-- Scripts
	================================================== -->
    <link href='http://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="{$obj->mSiteUrl}scripts/custom.js"></script>
    <script src="{$obj->mSiteUrl}scripts/selectnav.js"></script>
    <script src="{$obj->mSiteUrl}scripts/flexslider.js"></script>
    <script src="{$obj->mSiteUrl}scripts/twitter.js"></script>
    <script src="{$obj->mSiteUrl}scripts/tooltip.js"></script>
    <script src="{$obj->mSiteUrl}scripts/effects.js"></script>
    <script src="{$obj->mSiteUrl}scripts/fancybox.js"></script>
    <script src="{$obj->mSiteUrl}scripts/carousel.js"></script>
    <script src="{$obj->mSiteUrl}scripts/isotope.js"></script>
    <script type="text/javascript" src="{$obj->mSiteUrl}scripts/ajax.js"></script>
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
					 <a href="#"><img src="{$obj->mSiteUrl}images/logo.png" alt="" /></a>
                	<div id="slogan">Fresh, Local, Organic Produce</div>
                    <div class="clear"></div>
				</div><!-- end logo -->
            </div><!-- logo -->
            
            <div class="six columns">
            	<ul class="basket-icons">
                	<li class="nav-with-margin"><i class="ico-shopping-cart"></i></li>
                    <li class="nav-no-margin"><div class="nav-margin"><a href="{$obj->mLinkToCartDetails}">Shopping Cart</a></div></li>
                    <li class="nav-with-margin"><div class="nav-margin"><a href="#">Help</a></div></li>
                </ul>            
                <div class="clear"></div>
            </div>
        </div><!-- header -->        
        
        <!-- navigation start-->
        <div class="sixteen columns">
            <div id="navigation">
                <ul id="nav">
                    <li><a href="{$obj->mLinkToIndex}">Home</a></li>
                    <li><a href="{$obj->mLinkToAboutUs}">About</a></li>
                    <li><a href="{$obj->mLinkToContactUs}">Contact</a></li>
                     <li><a href="{$obj->mLinkToCartDetails}">Your Cart</a></li>
                </ul>
            </div> 
            <div class="clear"></div>
        </div>
        <!-- navigation end -->
    </div><!-- container -->
    
    <div class="container">
    	<div class="sixteen columns">
        	<div class="three columns">
            	{if !$obj->mHideBoxes}						
					{include file="departments_list.tpl"}
					{include file=$obj->mCategoriesCell}
				{/if}
            </div>
            
            <div class="nine columns">
            	{include file=$obj->mContentsCell}
            </div>
            
            <div class="three columns">
                {include file=$obj->mLoginOrLoggedCell}
                                
                {if !$obj->mHideBoxes}
                    {include file=$obj->mCartSummaryCell}
                {/if}
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
				<li><a href="{$obj->mLinkToContactUs}">Contact</a></li>
				<li><a href="{$obj->mLinkToTerms}">T's & C's</a></li>
                <li><a href="{$obj->mLinkToPrivacyPolicy}">Privacy Policy</a></li>
                <li><a href="{$obj->mLinkToFAQ}">FAQ</a></li>
                <li><a href="{$obj->mLinkToAdmin}">Admin Area</a></li>
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
</html>