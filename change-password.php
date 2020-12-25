<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit5']))
	{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$email=$_SESSION['login'];
	$sql ="SELECT Password FROM users WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";	
}
}

?>
<!DOCTYPE HTML>
<html>
<head> 
 <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
  <script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
	<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body> 
<div class="top-header">
<?php include('includes/header.php');?>
 <div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated" style="visibility: visible;  animation-name: zoomIn;">  </h1>

<div class="privacy">
	<div class="container">
		<h3 class="wow fadeInDown animated "  style="visibility: visible;   animation-name: fadeInDown;">Change Password</h3>
		<form name="chngpwd" method="post" onSubmit="return valid();">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg)
					{?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	<p style="width: 350px;">
		
			<b>Current Password</b>  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Current Password" required="">
	</p> 

<p style="width: 350px;">
<b>New  Password</b>
<input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password" required="">
</p>
<p style="width: 350px;">
<b>Confirm Password</b>
	<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confrim Password" required="">
			</p>
			<p style="width: 350px;">
<button type="submit" name="submit5" class="btn-primary btn">Change</button>
			</p>
			</form>
	</div>
</div>
 <?php include('includes/signup.php');?>			
 <?php include('includes/signin.php');?>			
 
</div>
</div></body>
</html>
<?php } ?>