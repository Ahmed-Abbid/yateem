<?php session_start();  ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>akfal now</title>
</head>

<body>
	
	<?php
	if(!isset($_SESSION['idadmin'])){                                        //if admin not sign in
		include_once('head_yateem.php');
		echo '
		<center>
		<h1>
		<a href="signin_form_yateem.php#modal" target="_blank">
		<input type="button" value="سجل اولآ" style="width:90px;">
		</a>
		</h1>
		</center>
		';
		include_once('foot_yateem.php');
		exit;

	}
	
		include_once('head_yateem.php');
	
	
	if(isset($_POST['do'])){        //if submit active
		$name = addslashes(trim($_POST['name']));                        //add '' and remove space
		$town = addslashes(trim($_POST['town']));                  //add '' and remove space
		$phone = addslashes(trim($_POST['phone']));                    //add '' and remove space
		 
		//check the input empty or no
		
		if(empty($name)){
			?>
	<h1 style="background-color: aqua; text-align: center;">حقل الأسم فارغ</h1>
	<input  type="button" value="رجوع" onClick="back()" style="position: relative;left: 300px;width: 150px;height: 50px;font-size: 15pt;">
	<?php
		}elseif(empty($town)){
			?>
	<h1 style="background-color: aqua;text-align: center;">حقل المدينة فارغ</h1>
	<input  type="button" value="رجوع" onClick="back()"  style="position: relative;left: 300px;width: 150px;height: 50px;font-size: 15pt;">
	<?php
		}elseif(empty($phone)){
			?>
	<h1 style="background-color: aqua; text-align: center;">حقل رقم الهاتف فارغ</h1>
	<input type="button" value="رجوع" onClick="back()"  style="position: relative;left: 300px;width: 150px;height: 50px;font-size: 15pt;">
	<?php
	}else{ 
			//enter data in database
			require_once('db_yateem.php');
			$command ="insert into akfal(name,town,phone)
			values('".$name."','".$town."','".$phone."')
			";
			
			
			if(mysqli_query($connect,$command)){
                
			?>
	<h1 style="text-align: center;background-color: aqua;">تم التسجيل سنتصل بك لاحقآ</h1>
				<!--<a href="'.$_SERVER['PHP_SELF'].'" target="_self">اكفل يتيم</a> &nbsp; &nbsp;
				'-->
	
	<?php
				
			}else{
				echo mysqli_error($connect);
			}
			mysqli_close($connect);

		}
	
	}else{                                            //if submit dont active will apear enter form
		                                              //form enter data
		?> 
	<!---------akfal yateem modal-------->
	
	
		
		
		<div class="condition_model_container" id="condition_modal">
			
			<div class="condition_model">
			
			<a href="#" class="condition_close"> X </a>
				
				<span class="condition_model_heading">
أكفل الآن									
				
				</span>
				
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="input_condition">
					<input type="text" placeholder="اسم الكافل" name="name" ><br>
				<input type="text" placeholder="المحافظة" name="town" ><br>
				
				<input type="text" placeholder="رقم الهاتف" name="phone"><br>
					<!----<input type="text" placeholder="البريد الألكتروني"><br>--->
					 <input type="hidden" name="do">
				<input type="submit" value="تأكيد" class="condition_btnrig" style="text-align: center;"><br>
					

				</form>
				
			</div>
		
		</div>
	
	<!-----end rigister-------->
	<?php
		
		
	}
	
	
	echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
	
		include_once('foot_yateem.php');

	?>
</body>
</html>