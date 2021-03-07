<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/default.css" >
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i" rel="stylesheet">
</head>
<style type="text/css">
	a {
		font-size: 14px;
		cursor:hand;
	}
	#login, #register {
		animation:orgasm 0.5s ease-in-out forwards;
		position:relative;
	}
	@keyframes orgasm {
		from {
			top:30px;
			opacity:0
		}
		to {
			top:0px;
			opacity:1
		}
	}
</style>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 " style="display: flex;align-items: center;justify-content: center;vertical-align: middle;">
				<img src="img/login.jpg" class="login-svg">
			</div>
			<div class="col-lg-6 mt-4">
				<center>
				<div class="main-login " id="login">
					<h4> Welcome Back !</h4>
					<br/>
					<form id="login-form">
						<input type="email" name="email" class="sign-in" placeholder="Email Address">
						<br/>
						<br/>
						<input type="password" name="password" class="sign-in" placeholder="Password">
						<br/>
						<br/>
						<div class="links"><a href="#" style="text-align:left !important">Forgot Password ?</a> or <a onclick="register()" >Create Account</a></div>
						<br/>
						<button style="cursor:pointer;" class="sign-in-btn">Sign In</button>
				    </form>
				</div>
				<div class="main-login " id="register">
					<h4> Join Now !</h4>
					<br/>
					<form id="registration-form">
						<input type="text" class="sign-in" name="fullname" placeholder="Name">
						<br/>
						<br/>
						<input type="email" class="sign-in" name="email" placeholder="Email Address">
						<br/>
						<br/>
						<input type="Password" class="sign-in" name="password" placeholder="Password">
						<br/>
						<br/>
						<input type="password" class="sign-in" name="confirmpassword" placeholder="Confirm Password">
						<br/>
						<br/>
						<div class="links"><a href="#" style="text-align:left !important">Forgot Password ?</a> or <a onclick="login()">Already User</a></div>
						<br/>
						<button style="cursor:pointer" class="sign-in-btn">Register</button>
						<br/>
				    </form>
				</div>
			</center>
			</div>
		</div>
	</div>
</body>
<script>
	function register() {
		var reg = document.getElementById('register');
		reg.style.display = 'block';
		var log = document.getElementById('login');
		log.style.display = 'none'
	}
	function login() {
		var reg = document.getElementById('register');
		reg.style.display = 'none';
		var log = document.getElementById('login');
		log.style.display = 'block'
	}
</script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/   zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/custom-form.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>