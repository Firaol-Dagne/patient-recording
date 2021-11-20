<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	$date = date("Y", strtotime("+ 8 HOURS"));
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$qfecalysis = $conn->query("SELECT COUNT(*) as total FROM `fecalisys` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$ffecalysis = $qfecalysis->fetch_array();
	$qmaternity = $conn->query("SELECT COUNT(*) as total FROM `birthing` `prenatal` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fmaternity = $qmaternity->fetch_array();
	$qhematology = $conn->query("SELECT COUNT(*) as total FROM `hematology` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fhematology = $qhematology->fetch_array();
	$qdental = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fdental = $qdental->fetch_array();
	$qxray = $conn->query("SELECT COUNT(*) as total FROM `radiological` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fxray = $qxray->fetch_array();
	$qrehab = $conn->query("SELECT COUNT(*) as total FROM `rehabilitation` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$frehab = $qrehab->fetch_array();
	$qsputum = $conn->query("SELECT COUNT(*) as total FROM `sputum` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$fsputum = $qsputum->fetch_array();
	$qurinalysis = $conn->query("SELECT COUNT(*) as total FROM `urinalysis` WHERE `year` = '$date' GROUP BY `itr_no`") or die(mysqli_error());
	$furinalysis = $qurinalysis->fetch_array();
?>
<html lang = "eng">
	<head>
		<title>Health Center Patient Record Management System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
		<?php require 'script.php'?>
		<script src = "js/jquery.canvasjs.min.js"></script>
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src="images/pic4.jfif" style = "float:left;" height = "55px" /><label class = "navbar-brand">patient Recordind Management System</label>
		<?php 
			$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = $_SESSION[admin_id]") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php 
							echo $f['firstname']." ".$f['lastname'];
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
		<div class = "well">
			<div id="chartContainer" style="width: 100%; height: 400px"></div> 
		</div>
	</div>
		
</body>
</html>