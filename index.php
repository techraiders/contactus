<?php 
	if (isset($_POST['submit'])) {
		$error = null;
		if (!$_POST['name']) {
			$error = "- Please enter your name<br/>";
		}
		if (!$_POST['email']) {
			$error .= "- Please enter your email<br/>";		
		}
		if (!$_POST['message']) {
			$error .= "- Please enter a message<br/>";		
		}
		if (!isset($_POST['check'])) {
			$error .= "- Please confirm you're human<br/>";		
		}
		if ($error) {
			$result = "<div class=\"alert alert-danger\" role=\"alert\"><strong>Whoops, there is an error</strong>. Please correct the following: <br/> {$error}</div>";
		} else {
			mail("hello_navneet@hotmail.com", "this is subject", "Name: ".$_POST['name']."Email: ".$_POST['name']."Message: ".$_POST['message']);
			{
				$result = "<div class=\"alert alert-success\" role=\"alert\">Thank you. I'll be in touch shortly.</div>";

			}
		}  
	}
	else {
		$_POST['name'] = null;
		$_POST['email'] = null;
		$_POST['message'] = null;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>Contact Form</h1>
<?php				if (isset($result) && $result != "") {
					echo $result;
				}
?>				<p>Send a message via the form below</p>

				<form method="post" role="form">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Your name" value="<?php echo $_POST['name']; ?>" />
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Your email" value="<?php echo $_POST['email']; ?>" />
					</div>
					<div class="form-group">
						<textarea name="message" rows="5" class="form-control" placeholder=" Write your message.." /> <?php echo $_POST['message']; ?>
						</textarea>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="check"/> I am human
						</label>
					</div>
					<div align="center">
						<input type="submit" name="submit" class="btn btn-secondary" value="send message..."/>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>