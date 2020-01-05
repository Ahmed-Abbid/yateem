<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>register yateem</title>
</head>

<body>
	<?php
	include_once('head_yateem.php');
	
	if(isset($_POST['do'])){
		$name = addslashes($_POST['name']);
		$email =trim(strtolower($_POST['email']));
		$password = addslashes($_POST['password']);
		
		if(empty($name)){
			?>
	<h1 style="color: #f00;">Name box is empty</h1>
	<input  type="button" value="Back" onClick="back()">
	<?php
		}elseif(empty($email)){
			?>
	<h1 style="color: #f00;">Email box is empty</h1>
	<input  type="button" value="Back" onClick="back()">
	<?php
		}elseif(empty($password)){
			?>
	<h1 style="color: #f00;">Password box is empty</h1>
	<input  type="button" value="Back" onClick="back()">
	<?php
		}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo '<center><h2>
			Invaled email address
			</center></h2>';
			
		}else{
			require_once('db_yateem.php');
			$command ="insert into admins(name,email,password)
			values('".$name."','".$email."','".$password."')
			";
			if(mysqli_query($connect,$command)){
				echo '<center><h2>Succesful Register</h2>
				<a href="signin_form_yateem.php#modal"><input type="button" value="Signin"></a>
				
				</center>';
				
				
			}else{
				echo mysqli_error($connect);
			}
				mysqli_close($connect);
		}
		
	}else{
		?>
	
		<!---------Rigister-------->
		
		<div class="Rigister_model_container" id="Rigister_modal">
			
			<div class="Rigister_model">
			
			<a href="#" class="Rigister_close"> X </a>
				
				<span class="Rigister_model_heading">
انشاء حساب جديد									
				
				</span>
				
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="input_rigister" method="post">
					<input type="text" placeholder="الأسم الثلاثي" name="name" ><br>
				<input type="text" placeholder="البريد الألكتروني" name="email" ><br>
				
				<input type="password" placeholder="كلمة المرور" name="password"><br>
					
				<input type="submit" value="تأكيد" class="Rigister_btnrig" style="text-align: center;"><br>
					<input type="hidden" name="do">

				</form><br>
				<a href="signin_form_yateem.php#modal" class="Rigister_have_account">هل  تمتلك حساب..؟  </a><br>
				
			</div>
		
		</div>
	
	<!-----end rigister-------->
	
	
	
	
	<?php
		
	}
	
	echo '<br><br><br><br><br><br><br><br><br><br><br><br><br>';
	
	include_once('foot_yateem.php');
	?>
</body>
</html>
