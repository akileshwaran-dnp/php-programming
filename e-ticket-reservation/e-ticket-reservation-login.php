<html>
	<head>
		<title>Login</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<style>
			*, *:before, *:after{
				box-sizing: border-box;
			}
			html{
				overflow-y: auto;
			}
			body{
				background: #c1bdba;
				font-family: 'Poppins', sans-serif;
			}
			a{
				text-decoration: none;
				color: #1ab188;
				transistion: .5s ease;
			}
			a:hover{
				color: #179b77;
			}
			.loginForm{
				background: rgba(19, 35, 47, .9);
				padding: 40px;
				max-width: 600px;
				margin: 40px auto;
				border-radius: 20px;
				box-shadow: 0 4px 10px 4px rgba(19, 35, 47, .3);
			}
			.tab-group{
				list-style: none;
				padding: 0;
				margin: 0 0 40px 0;
				display: flex;
				justify-content: space-around;
			}

			.tab-group li a{
				display: block;
				text-decoration: none;
				padding: 15px;
				background: rgba(160, 179, 176, .25);
				color: #a0b3b0;
				font-size: 20px;
				width: 200px;
				text-align: center;
				cursor: pointer;
				transition: 0.5s ease;
				border-radius: 20px;
			}

			.tab-group li a:hover{
				background: #179b77;
				color: #fff;
			}
			.tab-group .active a {
				background: #1ab188;
				color: #fff;
			}

			.tab-content > div:last-child{
				display: none;
			}
			h1{
				text-align: center;
				color: #fff;
				font-weight: 300;
				margin: 0 0 40px;
			}
			label{
				position: relative;
				color: rgba(255, 255, 255, .5);
				font-size: 18px;
			}
			label .required{
				margin: 2px;
				color: #1ab188;
			}

			input{
				font-size: 22px;
				display: block;
				width: 100%;
				padding: 5px 10px;
				background: none;
				background-image: none;
				border: 1px solid lightgrey;
				color: white;
				border-radius: 0;
				transition: border-color .25s, box-shadow .25s ease;
			}
			input:focus{
				outline: 0;
				border-color: #1ab188;
			}
			.form-field{
				position: relative;
				margin-bottom: 40px;
			}
			.name-row:after{
				content: "";
				display: table;
				clear: both;
			}
			.name-row > div{
				float: left;
				width: 48%;
				margin-right: 4%;
			}
			.name-row > div:last-child{
				margin: 0;
			}
			.submit-btn{
				border: 0;
				outline: none;
				border-radius: 0;
				padding: 15px 0;
				font-size: 2rem;
				font-weight: bold;
				text-transform: uppercase;
				letter-spacing: .1em;
				background: #1ab188;
				color: #fff;
				transistion: all .5s ease;
				-webkit-appearance: none;
				display: block;
				width: 100%;
			}
			.submit-btn:hover, .submit:focus{
				background: #179b77;
			}
			.forgot{
				margin-top: -20px;
				text-align: right;
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				
				$('.tab a').on('click', function (e) {
				  
				  e.preventDefault();
				  
				  $(this).parent().addClass('active');
				  $(this).parent().siblings().removeClass('active');
				  
				  target = $(this).attr('href');
				
				  $('.tab-content > div').not(target).hide();
				  
				  $(target).fadeIn(600);
				});
				  
			})
		</script>
	</head>
	<body>
		<div class="loginForm">
			<ul class="tab-group">
				<li class="tab active"><a href="#signin">Sign In</a></li>
				<li class="tab" ><a href="#signup">Sign Up</a></li>
			</ul>
			<div class="tab-content">
				<div id="signin">
					<h1>Welcome Sergio</h1>
					<form id="signin-form" name="signInForm" action="/" method="post" onsubmit="validateSignIn()">
						<div class="form-field">
							<label for="email">Email<span class="required">*</span></label>
							<input type="email" id-"email" name="email" required autocomplete="off" maxlength="25" />
						</div>
						<div class="form-field">
							<label for="password">Password<span class="required">*</span></label>
							<input type="password" id="password" name="password" required maxlength="25" />
						</div>
						<p class="forgot"><a href="#">Forget Password</a></p>
						<input type="submit" class="submit-btn" id="signin-submit" name="siginSubmit" value="SignIn" />
					</form>
				</div>

				<div id="signup">
					<h1>Signup</h1>
					<form id="signup-form" name="signUpForm" action="/" method="post" onsubmit="validateSignUp()">
						<div class="name-row">
							<div class="form-field">
								<label for="first-name">First Name<span class="required">*</span></label>
								<input type="text" id="first-name" name="firstName" required maxlength="25" />
							</div>
							<div class="form-field">
								<label for="last-name">Last Name</label>
								<input type="text" id="last-name" name="lastName" maxlength="25" />
							</div>
						</div>
						<div class="form-field">
							<label for="email">Email<span class="required">*</span></label>
							<input type="email" id="email" name="email" required />
							</div>
						<div class="form-field">
							<label for="password">Password<span class="required">*</span></label>
							<input type="password" id="password" name="password" required maxlength="25" />
						</div>
						<div class="form-field">
							<label for="confirm-password">Confirm Password<span class="required">*</span></label>
							<input type="password" id="confirm-password" name="confirmPassword" required maxlength="25" />
						</div>
					 	<input type="submit" class="submit-btn" id="signup-submit" name="signUpSubmit" value="SignUp" />
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
