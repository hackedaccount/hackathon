<?php


// $tkn = token::generate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="css/signup.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="js/script.js"></script>

</head>
<body>
    <!-- <form action="" method="post">
        <div class="field">
            <label for="username">username</label>
            <input type="text" name="username" id="username" value="" autocomplete="off">
        </div>

        <div class="field">
            <label for="password">password</label>
            <input type="password" name="password" id="password" autocomplete="off" >
        </div>

        <div class="field">
            <label for="remember">
                <input type="checkbox" name="remember" id="remember">Remember me
            </label>
        </div>

        <input type="hidden" name="token" value="<php echo token::generate() ?>">
        <input type="submit" value="Login">
    </form> -->


    <nav class="main-nav">
	<!-- <ul>
		<li><a class="signin" href="#0">Sign in</a></li>
	
	</ul> -->
</nav>

<div class="user-modal">
		<div class="user-modal-container">
		
			<div id="login">
				<form class="form" action="login.php" method="post">
				
					<p class="fieldset">
						<label class="image-replace password" for="signin-password">Password</label>
						<input class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Password" name="password">
						<a href="#0" class="hide-password">Show</a>
						<span class="error-message">Wrong password! Try again.</span>
					</p>

				
				</form>
				
				
				<!-- <a href="#0" class="close-form">Close</a> -->
			</div>

			<div id="signup">
				<form class="form" action="register.php" method="post">
            
					<p class="fieldset">
						<label class="image-replace password" for="signup-password">Password</label>
						<input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Password" name="password">
						<a href="#0" class="hide-password">Show</a>
						<span class="error-message">Your password has to be at least 6 characters long!</span>
					</p>
				
					
					<!-- <p class="fieldset">
						<input type="checkbox" id="accept-terms">
						<label for="accept-terms">I agree to the <a class="accept-terms" href="#0">Terms</a></label>
					</p> -->

					<p class="fieldset">
                        <input type="hidden" name="token" value="<?php echo $tkn ?>"> 
						<input class="full-width has-padding" type="submit" value="Create account">
					</p>
				</form>

				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div>
			<a href="#0" class="close-form">Close</a>
		</div>
	</div>
</body>
</html>