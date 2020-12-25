<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO  users(FullName,MobileNumber,EmailId,Password) VALUES                (:fname,:mnumber,:email,:password)";

$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
$_SESSION['msg']="Successfully registered. Login to proceed ";
header('location:thankyou.php');
}

else 
{
$_SESSION['msg']="Something went wrong. Please try again.";
header('location:thankyou.php');
}
}
?> <!--
<script>
function checkAvailability()
 {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data)
{
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});

}

</script>
-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
								<div class="modal-body modal-spa">
									<div class="login-grids">
										<div class="login"> 
											<div class="login">
												<form name="signup" method="post">
													<h3>Create your account </h3>
					

	<input type="text" value="" placeholder="Full Name" name="fname" autocomplete="off" required="" pattern="[a-z A-Z]{,20}">
	<input type="text" value="" placeholder="Mobile number" maxlength="10" name="mobilenumber" autocomplete="off" required="" pattern="[7-9]{1}[0-9]{9}">
	<input type="email" value="" placeholder="Email id" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="" >	
		 <span id="user-availability-status" style="font-size:12px;"></span> 
	<input type="password" value="" placeholder="3 or more characters" name="password" required="" pattern=".{3,}">	
											<input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
												</form>
											</div>
												<div class="clearfix"></div>								
										</div>
											 	</div>
								</div>
							</section>
					</div>
				</div>
			</div>