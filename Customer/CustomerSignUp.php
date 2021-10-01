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
			border: 3px solid #f1f1f1;
			width:500px;

		}
		/*Full-width input fields */
		input[type=text], input[type=password]{
			width:100%;
			padding:12px 20px;
			margin:8px 0;
			display: inline-block;
			border:1px solid #ccc;
			box-sizing: border-box;
		}
		/*set a style for all buttons*/
		button{
			background-color:#4CAF50;
			color:white;
			padding: 14px 20px;
			margin: 8px 0;
			border:none;
			cursor:pointer;
			width:100%;

		}
		/* float cancel and signup button and add an equal width*/
		.cancelbtn{
			padding: 14px 20px;
			background-color: #f44336;

		}
		.cancelbtn,.signupbtn{
			float: left;
			width: 50%;

		}
		.container{
			padding:16px;

		}
		.clearfix:after{
			content: "";
			clear:both;
			display:table;

		}
		@media screen and (max-width:300px){
			.cancelbtn,.signupbtn{
				width:100%;
			}
		}

	
	
	</style>
</head>
	<body>
	<div class="topnav">
	<a href="index.php"> Home </a>
	<div class="ls">
	<a href="Login.php">Login</a>
	<a class="active" href="signup.php">SignIn</a>
	</div>
	</div>
	<div>
		<center>
		<h2>Sigup Form</h2>
		 <form action="CustomerSignUp-php.php" method="POST">
			<div class="container">
				<label><b>Email</b></label>
				<input type= "text" name="email" placeholder="Enter Your Email" required="">
				<label><b>Name</b></label>
				<input type="text" name="name" placeholder="Eneter Your Name" pattern="[a-zA-Z ]{1,50}" required="">
				<label><b>Phone No</b></label>
				<input type="text" name="phone" pattern="[0-9]{1,50}"  placeholder="Enter Your Phone_No" required="">
				<label><b>Password</b></label>
				<input type="text" name="psw" placeholder="Enter Your Password" required="">
				<label><b>Confirm Password</b></label>
				<input type="password" name="repsw" placeholder="Renter Your Password" required>

				<div class="clearfix">
					<button type="reset" class="cancelbtn">Cancel</button>
					<button type="submit" name="submit" class="signupbtn">Sign Up</button>

				</div>
			</div>
		</form>
	</center>
	</div>

	



	</body>

</html>