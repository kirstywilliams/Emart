<?php
class StoreFront
{
	public $mSiteUrl;
	
	// Define the template file for the page contents
	public $mContentsCell = 'first_page_contents.tpl';
	
	// Define the template file for the categories cell
	public $mCategoriesCell = 'blank.tpl';
	
	// Define the template file for the cart summary cell
	public $mCartSummaryCell = 'blank.tpl';
	public $mTotalAmount;
	public $mLinkToCartDetails;
	
	// Define the template file for the login or logged cell
	public $mLoginOrLoggedCell = 'customer_login.tpl';
	
	// Controls the visibility of the shop navigation (departments, etc)
	public $mHideBoxes = false;
	
	// Define page title
	public $mPageTitle;
	// PayPal continue shopping link
	public $mPayPalContinueShoppingLink;
	// Admin link
	public $mLinkToAdmin;
	// About Us link
	public $mLinkToAboutUs;
	// Home page link
	public $mLinkToIndex;
	// Contact Us link
	public $mLinkToContactUs;
	// Terms and Conditions link
	public $mLinkToTerms;
	// Privacy Policy link
	public $mLinkToPrivacyPolicy;
	// FAQ link
	public $mLinkToFAQ;
	
	// Class constructor
	public function __construct()
	{
		$this->mSiteUrl = Link::Build('');
		$this->mLinkToAdmin = Link::ToAdmin();
		$this->mLinkToIndex = Link::ToIndex();
		$this->mLinkToAboutUs = Link::ToAboutUs();
		$this->mLinkToContactUs = Link::ToContactUs();
		$this->mLinkToTerms = Link::ToTerms();
		$this->mLinkToPrivacyPolicy = Link::ToPrivacyPolicy();
		$this->mLinkToFAQ = Link::ToFAQ();
		
		/* Calculate the total amount for the shopping cart
		before delivery costs */
		$this->mTotalAmount = ShoppingCart::GetTotalAmount();
		$this->mLinkToCartDetails = Link::ToCart();
	}
	
	// Initialize presentation object
	public function init()
	{
		$_SESSION['link_to_store_front'] =
					Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));
					
		// Build the "continue shopping" link
		if (!isset ($_GET['CartAction']) && !isset($_GET['Logout']) &&
		!isset($_GET['RegisterCustomer']) &&
		!isset($_GET['AddressDetails']) &&
		!isset($_GET['PaymentDetails']) &&
		!isset($_GET['AccountDetails']) &&
		!isset($_GET['Checkout']))
			$_SESSION['link_to_last_page_loaded'] = $_SESSION['link_to_store_front'];

		// Build the "cancel" link for customer details pages
		if (!isset($_GET['Logout']) &&
		!isset($_GET['RegisterCustomer']) &&
		!isset($_GET['AddressDetails']) &&
		!isset($_GET['PaymentDetails']) &&
		!isset($_GET['AccountDetails']))
			$_SESSION['customer_cancel_link'] = $_SESSION['link_to_store_front'];

		// Load department details if visiting a department
		if (isset ($_GET['DepartmentID']))
		{
			$this->mContentsCell = 'department.tpl';
			$this->mCategoriesCell = 'categories_list.tpl';
		}
		elseif (isset($_GET['ItemID']) &&
				isset($_SESSION['link_to_continue_shopping']) &&
				strpos($_SESSION['link_to_continue_shopping'], 'DepartmentID', 0)
				!== false)
		{
			$this->mCategoriesCell = 'categories_list.tpl';
		}
		
		// Load product details page if visiting a product
		if (isset ($_GET['ItemID']))
			$this->mContentsCell = 'product.tpl';
			
		// Load shopping cart or cart summary template
		if (isset ($_GET['CartAction']))
			$this->mContentsCell = 'cart_details.tpl';
		else
			$this->mCartSummaryCell = 'cart_summary.tpl';
			
		if (Customer::IsAuthenticated())
			$this->mLoginOrLoggedCell = 'customer_logged.tpl';
		
		if (isset ($_GET['RegisterCustomer']) ||
		isset ($_GET['AccountDetails']))
			$this->mContentsCell = 'customer_details.tpl';
		elseif (isset ($_GET['AddressDetails']))
			$this->mContentsCell = 'customer_address.tpl';
		elseif (isset ($_GET['PaymentDetails']))
			$this->mContentsCell = 'customer_credit_card.tpl';
			
		if (isset ($_GET['Checkout']))
		{
			if (Customer::IsAuthenticated())
				$this->mContentsCell = 'checkout_info.tpl';
			else
				$this->mContentsCell = 'checkout_not_logged.tpl';
			
			$this->mHideBoxes = true;
		}
		
		// Load order result (i.e. success or error) template
		if (isset($_GET['OrderDone']))
			$this->mContentsCell = 'order_done.tpl';
		elseif (isset($_GET['OrderError']))
			$this->mContentsCell = 'order_error.tpl';
			
		// Load about us template
		if (isset($_GET['AboutUs']))
			$this->mContentsCell = 'about_us.tpl';
			
		// Load contact us template
		if (isset($_GET['ContactUs']))
			$this->mContentsCell = 'contact_us.tpl';
		
		// Load contact success template
		if (isset($_GET['ContactDone']))
			$this->mContentsCell = 'contact_done.tpl';
			
		//Load contact error template
		if (isset($_GET['ContactError']))
			$this->mContentsCell = 'contact_error.tpl';
			
		// Load terms and conditions template
		if (isset($_GET['Terms']))
			$this->mContentsCell = 'terms.tpl';
		
		// Load privacy policy template
		if (isset($_GET['PrivacyPolicy']))
			$this->mContentsCell = 'privacy_policy.tpl';
		
		// Load faq template
		if (isset($_GET['FAQ']))
			$this->mContentsCell = 'faq.tpl';
		
		// Load the page title
		$this->mPageTitle = $this->_GetPageTitle();
	}
	
	// Returns the page title
	private function _GetPageTitle()
	{
		$page_title = 'eMart Online Store - ' .
		'The Finest in Locally Sourced Organic Produce';
		if (isset ($_GET['DepartmentID']) && isset ($_GET['CategoryID']))
		{
			$page_title = 'eMart Online Store - ' .
			Catalog::GetDepartmentName($_GET['DepartmentID']) . ' - ' .
			Catalog::GetCategoryName($_GET['CategoryID']);
			if (isset ($_GET['Page']) && ((int)$_GET['Page']) > 1)
				$page_title .= ' - Page ' . ((int)$_GET['Page']);
		}
		elseif (isset ($_GET['DepartmentID']))
		{
			$page_title = 'eMart Online Store - ' .
			Catalog::GetDepartmentName($_GET['DepartmentID']);
			if (isset ($_GET['Page']) && ((int)$_GET['Page']) > 1)
				$page_title .= ' - Page ' . ((int)$_GET['Page']);
		}	
		elseif (isset ($_GET['ItemID']))
		{
			$page_title = 'eMart Online Store - ' .
			Catalog::GetProductName($_GET['ItemID']);
		}
		else
		{
			if (isset ($_GET['Page']) && ((int)$_GET['Page']) > 1)
				$page_title .= ' - Page ' . ((int)$_GET['Page']);
		}
		return $page_title;
	}
}
?>