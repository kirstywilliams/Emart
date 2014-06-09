<?php
	// Class that supports the contact us page
	class ContactUs
	{
		// Public attributes
		public $mErrorMessage;
		public $mLinkToContactUs;
		public $mName = '';
		public $mEmail = '';
		public $mMessage = '';
		
		
		// Class constructor
		public function __construct()
		{
			$this->mLinkToContactUs = Link::ToContactUs();
		}
		
		public function init()
		{
		
			// If the Contact Us button was clicked, process the form
			if(isset($_POST['contact_us']))
			{
			
				$this->mName = $_POST['name'];
				$this->mEmail = $_POST['email'];
				$this->mMessage = $_POST['message'];
				$formContent = "From: $this->mName \r\n Message: $this->mMessage";
				$recipient = ADMIN_EMAIL;
				$subject = "Contact Form";
				$mailheader = "From: $this->mEmail \r\n";
				
				if ($this->mName == null)
					$this->mErrorMessage = 'Name required';
				if ($this->mEmail == null)
					$this->mErrorMessage = 'Email required';
				if ($this->mMessage == null)
					$this->mErrorMessage = 'Message required';
				if ($this->mErrorMessage == null)
				{
					mail($recipient, $subject, $formContent, $mailheader) or header('Location: ' . Link::ToContactError());

					// On success head to an contact successful page
					$redirect_to = Link::ToContactDone();
					
					// Redirection to the contact result page
					header('Location: ' . $redirect_to);
					
					exit();
				}
			}
		}
	}
?>