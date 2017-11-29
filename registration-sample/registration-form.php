<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href='./css/registration-form.css' rel='stylesheet' type='text/css' />

</head>

<body>
	<div class=wrapper>
		<form class='registration-form' method=POST action='?' >
			<h2>Register!</h2>
			<div class=form_block >
				<label for=username>User Name:</label>
				<input required type=email name=username id=username class=reg-input placeholder='i.e yourname@yourdomain.com ' />
			</div>
			<div class=form_block >
				<label for=username>Password:</label>
				<div>Use letters numbers, and symbols for better security</div>
				<input required type=password name=password id=password  class=reg-input />
			</div>
			<div class=form_block >
				<input type=submit value='Register now'   class='reg-input reg-ok' />
			</div>

		</form>
	</div>

</body>


</html>
