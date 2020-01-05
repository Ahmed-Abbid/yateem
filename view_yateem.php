<?php  session_start()   ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View yateem</title>
</head>

<body>
	<?php
	/*if(!isset($_GET['id'])){
		echo 'Error Id Var Not Set';        
		exit;
	}*/





	include_once('head_yateem.php');
	require_once('db_yateem.php');
	$command = "select * from new_yateem";      //call all topics and show in app

	if($result = mysqli_query($connect,$command)){
		if(mysqli_num_rows($result)<=0){
			
			echo '<center><h2>
			yateem Not Exist
			</h2></center>';
			
		}else{


			
			?>
	<center>
	<table class="tablte_yateem">
		<thead>
			<tr>
				<th>الأسم</th>
				<th>االمحافظة</th>
				<th>العمر</th>
				<th>الجنس</th>
			</tr>
		</thead>
		<?php
			while($get_topics = mysqli_fetch_assoc($result)){
			$name= stripcslashes($get_topics['name']);
			$town = stripcslashes($get_topics['town']);
			$age = stripcslashes($get_topics['age']);
			$gender = stripcslashes($get_topics['sex']);?>
		<tbody>
			<tr class="active-row">
				<td><?php echo $name; ?></td>
				<td><?php echo $town; ?></td>
				<td><?php echo $age; ?></td>
				<td><?php echo $gender; ?></td>

			</tr>
		</tbody>
		<?php }
			?>
	</table>
</center>
	
	
	<?php
		}
	}else{
		echo mysqli_error($connect);
	}
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
	include_once('foot_yateem.php');
	?>
	
	
</body>
</html>