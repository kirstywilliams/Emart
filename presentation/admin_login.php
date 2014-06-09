 <?php
 
// Class that deals with authenticating administrators
class AdminLogin
{
	// Public variables available in smarty templates
	public $mUsername;
	public $mLoginMessage = '';
	public $mLinkToAdmin;
	public $mLinkToIndex;

	// Class constructor
	public function __construct()
	{
		// Verify if the correct username and password have been supplied
		if (isset ($_POST['submit']))
		{
			if ($_POST['username'] == ADMIN_USERNAME
				&& $_POST['password'] == ADMIN_PASSWORD)
			{
				$_SESSION['admin_logged'] = true;
				header('Location: ' . Link::ToAdmin());
				exit();
			}
			else
				$this->mLoginMessage = 'Login failed. Please try again:';
		}
		
		if (isset ($_POST['forgot']))
		{
			$password = $this->GetPassword();
			$subject = 'Password reminder requested.';	
			$to = ADMIN_EMAIL;
			$headers = 'From: ' . ADMIN_EMAIL . "\r\n";
			$body = 'Message: You have requested a password reminder:' . "\r\n\r\n"
					. 'Your current password is "' . $password . '"' . "\r\n\r\n"
					. 'For security purposes we recommend this is changed. ' . "\r\n" 
					. 'This is done by accessing the configuration file, ' . "\r\n" 
					. 'located in the include directory, and changing the ' . "\r\n" 
					. 'administrator login information password';
			
			$result = mail($to, $subject, $body, $headers);
			if ($result == false)
			{
				throw new Exception ('Failed sending this mail to administrator:' .
				"\n" . $body);
			}
			else
			{
				$this->mLoginMessage = 'Reminder email sent.';
			}
		}
		
		$this->mLinkToAdmin = Link::ToAdmin();
		$this->mLinkToIndex = Link::ToIndex();
	}
		
	// Returns the current password
	public static function GetPassword()
	{
		return ADMIN_PASSWORD;
	}
}
?>