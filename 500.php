<?php
  // Set the 500 status code
  header('HTTP/1.0 500 Internal Server Error');

  require_once 'include/config.php';
  require_once PRESENTATION_DIR . 'link.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>eMart Application Error (500)</title>
	</head>
	<body>
		<h1>eMart is experiencing technical difficulties.</h1>
		<p>Please <a style="text-decoration:underline" href="<?php echo Link::Build(''); ?>">visit us</a> soon,
			or <a style="text-decoration:underline" href="<?php echo ADMIN_ERROR_MAIL; ?>">contact us</a>.
		</p>
		<p>Thank you!</p>
		<p>The eMart team.</p>
	</body>
</html>