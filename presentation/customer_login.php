<?php
class CustomerLogin
{
	// Public stuff
	public $mErrorMessage;
	public $mLinkToLogin;
	public $mLinkToRegisterCustomer;
	public $mEmail = '';
	public $mCustomerEmail;
	
	// Class constructor
	public function __construct()
	{
		if (USE_SSL == 'yes' && getenv('HTTPS') != 'on')
			$this->mLinkToLogin =
			Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')),
			'https');
		else
			$this->mLinkToLogin =
			Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));
			$this->mLinkToRegisterCustomer = Link::ToRegisterCustomer();
	}
	
	public function init()
	{
		// Decide if we have submitted
		if (isset ($_POST['Login']))
		{
			// Get login status
			$login_status = Customer::IsValid($_POST['email'], $_POST['password']);
			
			switch ($login_status)
			{
				case 2:
					$this->mErrorMessage = 'Unrecognised Email.';
					$this->mEmail = $_POST['email'];
					break;
				case 1:
					$this->mErrorMessage = 'Unrecognised password.';
					$this->mEmail = $_POST['email'];
					break;
				case 0:
					$redirect_to_link =
					Link::Build(str_replace(VIRTUAL_LOCATION, '',
					getenv('REQUEST_URI')));
					header('Location:' . $redirect_to_link);
					exit();
			}
		}
		
		if (isset ($_POST['forgot']))
		{
			$this->mCustomerEmail = $_POST['email'];
			
			if ($this->mCustomerEmail == null)
				$this->mErrorMessage = 'Please enter your email<br/>address';
				
			if ($this->mErrorMessage == null)
			{
				$password = Customer::GetUnencryptedPassword($this->mCustomerEmail);
				
				$subject = 'Password reminder requested.';	
				$to = $this->mCustomerEmail;
				$headers = 'From: ' . ADMIN_EMAIL . "\r\n";
				$body = 'Message: You have requested a password reminder:' . "\r\n\r\n"
						. 'Your current password is "' . $password . '"' . "\r\n\r\n"
						. 'For security purposes we recommend this is changed. ' . "\r\n" 
						. 'This is done by changing your information on the website ' . "\r\n" 
						. 'once you have logged in successfully. ';
				
				$result = mail($to, $subject, $body, $headers);
				if ($result == false)
				{
					throw new Exception ('Failed sending this mail to customer:' .
					"\n" . $body);
				}
				else
				{
					$this->mErrorMessage = 'Reminder email sent.';
				}
			}
		}
	}
}
?>