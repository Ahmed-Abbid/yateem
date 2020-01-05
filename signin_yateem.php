<?php session_start(); ?>
<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	if(isset($_SESSION['idadmin'])){                
		echo'
		<script type="text/javascript">
		lacation.href="index.php";
		</script>
		';}
	
	else{
		
		$email = trim(strtolower($_POST['email'])); 
		$password =addslashes($_POST['password']); 
		
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ 
			include_once('head_yateem.php');
			echo '<center><h1>
			البريد الألكتروني غير صالح
			<center><h1>';
			include_once('foot_yateem.php');

		}
		
		else{
		require_once('db_yateem.php');  
			
		$command = "select * from admins where email ='".$_POST['email']."'and password ='".$_POST['password']."'limit 1";    
			
			
		if($get_admin = mysqli_query($connect,$command)){  
				if(mysqli_num_rows($get_admin) <=0 ){ 
				include_once('head_yateem.php');
					echo '<center><h2>خطأ في البريد الألكتروني او كلمة المرور</h2>
					<input type="button" value="Back" onclick="back()">
					</center>';  
						include_once('head_yateem.php');

				}
				
				else{ 
					$info_admin = mysqli_fetch_assoc($get_admin);   
					$_SESSION['idadmin'] =$info_admin['id'];    
					include_once('head_yateem.php');
					echo '<center><h2>مرحبآ '.$info_admin['name'].'</h2>
					<a href="index_yateem.php" target="_self"><input type="button" value="الصفحة الرئيسية"></a>
					</center>';         
					include_once('foot_yateem.php');

				}
				
				}
			else{
				 echo mysqli_error($connect);  //function print error
			}
			
			
		}
	}
	?>
</body>
</html>