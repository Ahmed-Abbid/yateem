<?php session_start(); ?>
<!doctype html>
<html>
<head>
<link type="text/css" href="style_yateem.css" rel="stylesheet">

<meta charset="utf-8">
<title>signin form yateem</title>
</head>

<body>
	<?php
	function signin(){                       //function of signin form
		?>
	<!----model sign in----->
		
		<div class="model_container" id="modal">
			
			<div class="model">
			
			<a href="#" class="close"> X </a>
				
				<span class="model_heading">
				تسجيل الدخول
				
				
				</span>
				
				<form action="signin_yateem.php" class="input_sign" method="post">
					
				<input type="text" placeholder="البريد الألكتروني" name="email"  ><br>
				
				<input type="password" placeholder="كلمة المرور" name="password"><br>
					<a href="#" class="forget_pass">هل  نسيت كلمة المرور..؟  </a><br>
				<input type="submit" value="دخول" class="btnrig" style="text-align: center;"><br>
					

				</form>
				
				<a href="register_yateem.php#Rigister_modal" class="have_account"> اذا كنت لا تمتلك حساب انشأ حساب الآن   </a>
			</div>
		
		</div>
	
	<!------end sign in----------->
	
	
	
	
	<?php
	}
	
	
	
	include_once('head_yateem.php');
	
	if(isset($_SESSION['idadmin'])){
		require_once('db_yateem.php');
		$command="select name from admins where id=".$_SESSION['idadmin'];
		
		if($admin = mysqli_query($connect,$command)){
			$admin_info = mysqli_fetch_assoc($admin);
			echo '<center><h2>وداعآ '.$admin_info['name'].'
			<br><br>
			<a href="signout_yateem.php" target="_self">تسجيل خروج</a>
		</center></h2>	';
			
		}else{
			
			mysqli_error($connect);
		}
		
		
		
		
		
	}else{
		signin();
	}
	echo '
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	';
	include_once('foot_yateem.php');

	?>
</body>
</html>