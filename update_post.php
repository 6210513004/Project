<?php
	session_start();
	//13.display old info and update into users table
    include_once 'dbconnect.php';

	if (isset($_GET['user_post'])) {
		$sql = "SELECT * FROM post WHERE user_post = " . $_GET['user_post'];
		$result = mysqli_query($con,$sql);
		$row_update = mysqli_fetch_array($result);
		$user_post = $row_update['user_post'] ;
		$user_topic = $row_update['user_topic'] ;
		$user_detail = $row_update['user_detail'] ;

	}

	// check whether update button is clicked
	if (isset($_POST['update'])) {
		$user_post = $_POST['post'];
		$user_topic = $_POST['topic'];
		$user_detail = $_POST['detail'];

		if (!$validate_error) {
			$sql ="UPDATE post SET user_topic = '" . $user_topic . "', user_detail = '" . $user_detail . "'WHERE user_post = " . $user_post;

			if (mysqli_query($con,$sql)) {
				header("location: show_post.php");
			} else {
				$error_mgs = "Error updating record!";

			}
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
                <a class="navbar-brand" href="index.php" >PET COMMUNITY</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="show_user.php">DB User</a></li>
                        <li class="nav-item"><a class="nav-link" href="show_post.php">DB Post</a></li>
                        <!--6.if already logged in, change menu items -->
                        <li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link ">ผู้ดูแลระบบ <?php echo $_SESSION['name'] ?></a></li>
                </div>
            </div>
        </nav>
<header class="masthead">
<div class="container">
	<div class="row justify-content-center">
		<div class="topic1">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="updateform">
				<fieldset>
                    <center>
						<legend>Edit</legend>
					</center>
					<hr size=5>
					<hr size=5>
					<hr size=5>

					<!--14.display old info in text field -->
					<div class="form-group">
						<input type="hidden" name="post" value="<?php echo $user_post ; ?>" />
						<label for="name">ชื่อหัวข้อ</label>
						<input type="text" name="topic" placeholder="ป้อนหัวข้อ" required value="<?php echo $user_topic ; ?>" class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">รายละเอียดกระทู้</label>
						<input type="text" name="detail" placeholder="กรอกข้อความ" required value="<?php echo $user_detail ; ?>" class="form-control" />
					</div>

					<div class="form-group">
                        <br>
						<center><input type="submit" name="update" value="Update" class="btn btn-primary" ></center>
					</div>
				</fieldset>
			</form>
			<!--15.display message -->
			<span class = "text-danger"><?php if(isset($error_mgs)) echo $error_mgs; ?></span>
        </div>
		</div>
	</div>
</div>
</header>
</body>
</html>