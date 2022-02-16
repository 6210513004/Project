<?php
		//2.save regist info into database
		//2.1 เพิ่ม ข้อมูล user สำหรับ ฐานข้อมูล
		include_once "dbconnect.php"; //หรือใช้ require_once

		//เช็คว่า ฟอร์ม มีการกดปุ่ม submit โดยใช้คำสั่ง isset ($_POST['ชื่อปุ่ม'])
		if (isset($_POST['send'])) {
            $topic = $_POST['user_topic'];
			$detail =$_POST['user_detail'];

		//2.2 ตรวจสอบความถูกต้องของข้อมูล user 
		//สร้างตัวแปร validate_error เพื่อเช็ค error
		$validate_error = false;
		//สร้างตัวแปรอีกตัว เพื่อแจ้งข้อความ
		$validate_msg = "";
		if (!$validate_error){
			//เพิ่มข้อมูล project ในตาราง
			$sql = "INSERT INTO post(user_topic,user_detail)
			VALUE('" . $topic . "' , '" . $detail . "')"; 
	
			if (mysqli_query($con, $sql));
		} else {
			//error
		}
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>PET COMMUNITY</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="icon" type="image/x-icon" href="loginpage/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">

</head>
<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="home.php" >PET COMMUNITY</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <!-- แบบฟอร์มกรอกสมัคร Sign Up -->
                        <li class="nav-item"><a class="nav-link" id="show1" href="home.php">Home</a></li>
                        <!-- Log In เข้าสู่เว็ปไซต์ -->
                        <li class="nav-item"><a class="nav-link" id="show2" href="post.php">Post</a></li>
                        <!--6.if already logged in, change menu items -->
                        <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                </div>
            </div>
        </nav>

<header class="masthead bg-primary">
	<div class="index">
    <div class="container d-flex align-items-center flex-column">
        <h1 class="masthead-heading mb-50 text-secondary text-center">แชร์เรื่องราวสัตว์เลี้ยงของคุณ</h1>
		<hr>
	</div>
	<div class="container"> 
	<div class="row justify-content">
		<div class="col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="sendform">				
					<div class="form-group col-md-0">
						<label for="name"><b>ชื่อหัวข้อ</b></label>
						<input type="text" name="user_topic" placeholder="ป้อนหัวข้อ" required value="" class="form-control" />
					</div>
					<div class="form-group col-md-0">
						<label for="name"><b>รายละเอียดกระทู้</b></label>
						<textarea name="user_detail" cols="49" rows="4" required value="" placeholder="กรอกข้อความที่ต้องการตั้งกระทู้" class="form-control"></textarea>
					</div>
					<br>					
					<div class="form-group">
						<input type="submit" name="send" value="โพสต์" class="btn btn-secondary"/>
					</div>
			</form>
			<!--3.display message แสดงข้อความ error ที่เกิดขึ้น -->
			<?php
				if (isset($validate_error)){
					if($validate_error){
						echo $validate_msg;
					}
				}
			?>
		</div>
	</div>
	</div>
	<!-- <div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4 text-center">
		กรุณาคลิกปุ่มด้านล่างนี้ หากมีบัญชีแล้ว 
		<br><br>
		<button onclick="document.location='login.php'" class="btn btn-secondary">เข้าสู่ระบบ</button>
		</div>
	</div> -->
</div>
</header>
</body>
</html>