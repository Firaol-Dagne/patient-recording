<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "eng">
	<head>
		<title>Health Center Patient Record Management System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "images/pic4.jfif" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/pic4.jfif" style = "float:left;" height = "55px" /><label class = "navbar-brand">Patient Recording Management System - wolkite City</label>
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							echo $f['firstname']." ".$f['lastname'];
							$conn->close();
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Accounts</a>
					<ul>
						<li><a href = "admin.php"><i class = "glyphicon glyphicon-cog"></i> Administrator</a></li>
						<li><a href = "user.php"><i class = "glyphicon glyphicon-cog"></i> User</a></li>
					</ul>
				</li>
				<li><li><a href = "patient.php"><i class = "glyphicon glyphicon-user"></i> Patient</a></li></li>
	
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		<div class = "panel panel-success">	
			<div class = "panel-heading">
				<label>PATIENT INFORMATION / EDIT</label>
				<a style = "float:right; margin-top:-4px;" href = "patient.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<div class = "panel-body">
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<form method = "POST" enctype = "multipart/form-data">
					<div style = "float:left;" class = "form-inline">
						<label for = "itr_no">ITR No:</label>
						<input class = "form-control" value = "<?php echo $f['itr_no'] ?>" disabled = "disabled" size = "3" type = "number" name = "itr_no">
					</div>
					<div style = "float:right;" class = "form-inline">
						<label for = "family_no">Family no:</label>
						<input class = "form-control" size = "3" value = "<?php echo $f['family_no']?>" type = "number" name = "family_no">
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Firstname:</label>
						<input class = "form-control" name = "firstname" value = "<?php echo $f['firstname']?>" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "middlename">Middle Name:</label>
						<input class = "form-control" name = "middlename" value = "<?php echo $f['middlename']?>" type = "text" required = "required">
						&nbsp;&nbsp;&nbsp;
						<label for = "lastname">Lastname:</label>
						<input class = "form-control" name = "lastname" value = "<?php echo $f['lastname']?>" type = "text" required = "required">
					</div>
					<br />
					<div class = "form-group">
						<label for = "birthdate" style = "float:left;">Birthdate:</label>
						<br style = "clear:both;" />
						<select name = "month" style = "width:15%; float:left;" class = "form-control" required = "required">
							<option value = "">Select a month</option>
							<option value = "01">January</option>
							<option value = "02">February</option>
							<option value = "03">March</option>
							<option value = "04">April</option>
							<option value = "05">May</option>
							<option value = "06">June</option>
							<option value = "07">July</option>
							<option value = "08">August</option>
							<option value = "09">September</option>
							<option value = "10">October</option>
							<option value = "11">November</option>
							<option value = "12">December</option>
						</select>
						<select name = "day" class = "form-control" style = "width:13%; float:left;" required = "required">
							<option value = "">Select a day</option>
							<option value = "01">01</option>
							<option value = "02">02</option>
							<option value = "03">03</option>
							<option value = "04">04</option>
							<option value = "05">05</option>
							<option value = "06">06</option>
							<option value = "07">07</option>
							<option value = "08">08</option>
							<option value = "09">09</option>	
							<?php
								
								$a = 10;
								while($a <= 31){
									echo "<option value = '".$a."'>".$a++."</option>";
								}
							?>
						</select>
						<select name = "year" class = "form-control" style = "width:13%; float:left;" required = "required">
							<option value = "">Select a year</option>
							<?php
								$a = date(Y);
								while(1965 <= $a){
									echo "<option value = '".$a."'>".$a--."</option>";
								}
							?>
						</select>
						<br style = "clear:both;"/>
						<br />
						<label for = "phil_health_no">Phil Health no:</label>
						<input name = "phil_health_no" class = "form-control" value = "<?php echo $f['phil_health_no']?>" type = "text">
						<br />
						<label for = "address">Address:</label>
						<input class = "form-control" name = "address" type = "text" value = "<?php echo $f['address']?>" required = "required">
						<br />
						<label for = "age">Age:</label>
						<input class = "form-control" style = "width:20%;" value = "<?php echo $f['age']?>" name = "age" type = "number">
						<br />
						<label for = "civil_status">Civil Status:</label>
						<input class = "form-control" style = "width:20%;" value = "<?php echo $f['civil_status']?>" name = "civil_status" type = "text" required = "required">
						<br />
						<label for = "gender">Gender:</label>
						<select style = "width:22%;" class = "form-control"  name = "gender" required = "required">
							<option value = "">--Please select an option--</option>
							<option value = "Male">Male</option>
							<option value = "Female">Female</option>
						</select>
					<div class = "form-inline">
						<button class = "btn btn-warning" name = "edit_patient"><span class = "glyphicon glyphicon-pencil"></span> SAVE</button>
					</div>
					<?php require_once 'edit_query.php' ?>
				</form>
			</div>	
		</div>	
	</div>
<?php include("script.php"); ?>
<script type = "text/javascript">
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>	
</body>
</html>