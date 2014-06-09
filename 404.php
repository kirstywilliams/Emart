<?php
  // Set the 404 status code
  header('HTTP/1.0 404 Not Found');

  require_once 'include/config.php';
  require_once PRESENTATION_DIR . 'link.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>eMart Page Not Found (404)</title>
	</head>
	<body>
		<div id="centercontainer">
			<div id="center">
				<h1>The page that you have requested doesn't exist on eMart.</h1><br/>
				<p>Please visit the
					<a style="text-decoration:underline" href="<?php echo Link::Build(''); ?>">eMart catalog</a>
					if you're looking for groceries,
					or <a style="text-decoration:underline" href="<?php echo ADMIN_ERROR_MAIL; ?>">email us</a>
					if you need further assistance.
				</p>
				<p><br/>Thank you!</p>
				<p><br/>The eMart team.</p>
			</div><!-- end center -->
		</div><!-- end centercontainer -->
	</body>
</html>