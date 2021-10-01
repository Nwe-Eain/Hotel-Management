<!DOCTYPE html>
<html>
<head>
	
	<style>
	body{
		margin:0;
		background: gray;
	}

	.topnav{
		overflow: hidden;
		background-color:#333;
	}
	.topnav a{
		float:left;
		display:block;
		color:#f2f2f2;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-size: 17px;
	}
	.topnav a:hover{
		background- color:#ddd;
		color:black;

	}
	.topnav a.active{
		background-color: #4CAF50;
		color:white;
	}
	.ls{
		float: right;
	}
	form{
		border:3px solid;
		width:500px;
	}
		input[type=text], input[type=password]{
		width:100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}

	button{
		background-color:#4CAF50;
		color: white;
		padding: 14px 20px;
		margin:8px 0;
		border:none;
		cursor:pointer;
		width:100%;
	}

	button:hover{
		opacity:0.8;
	}
	.cancelbtn{
		width: 200px;
		padding:10px 18px;
		background-color: #f44336;
	}

	.imgcontainer{
		text-align: center;
		margin: 24px 0 12px 0;
	}

	img.avatar{
		width: 40%;
		border-radius:50%;
	}
	.container{
		padding: 16px;
	}
	span.psw{
		float: right;
		padding-top: 16px;
	}
	@media screen and (max-width:300px;){
		span.psw{
			display: block;
			float: none;
		}
		.cancelbtn{
			width: 100%
		}
	}
	body{margin:0;}
	
	</style>
</head>
	<body>
	<div class="topnav">
	<a href="Index.php"> Home </a>
	<div class="ls">
	<a class="active" href="login.php">Login</a>
	<a href="signup.php">SignIn</a>
	</div>
	</div>
	<div>
		<center>
	<h2>Login Form</h2>
	<form action="login_php.php" method="POST" >
		

		<div class="container">
			<label><b>User Name</b></label>
			<input type="text" name="uname" placeholder="Enter Your Name" required>
			<label><b>Password Number</b></label>
			<input type="password" name="psw" placeholder="Enter Your Password" required="">
			
			<button type="submit" name="log">Login</button>
			<input type="checkbox" checked="checked">Remember me

		</div>
		<div class="container" style="background-color: #f1f1f1">
		<button type ="button" class="cancelbtn">Cancel</button>
		<span class="psw">Forgot <a href="#">password?</a></span>
			
		</div>
	</form>
	</center>
	</div>

	



	</body>

</html>