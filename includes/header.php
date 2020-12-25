<?php
 
 if($_SESSION['login'])
{
	?>
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated"  >
			<li class="hm"><a href="index.html"> </a></li>
			<li class="prnt"><a href="profile.php">My Profile</a></li>
				<li class="prnt"><a href="change-password.php">Change Password</a></li>
			<li class="prnt"><a href="tour-history.php">My Tour History</a></li>
			<li class="prnt"><a href="issuetickets.php">Issue Tickets</a></li>
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated"  > 
			<li class="tol">Welcome :</li>				
			<li class="sig"><?php echo htmlentities($_SESSION['login']);?></li> 
			<li class="sigi"><a href="logout.php" >/ Logout</a></li>
        </ul>
 
	</div>
</div><?php }
 


 else
  {?>
<div class="top-header">
	<div class="container">
	 	<div class="con">
		<ul class="tp-hd-rgt wow fadeInRight animated"  > 
		 
			 <li class="sig"><a href="#" data-toggle="modal" data-target="#myModal" >Sign Up</a></li> 
			<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >/ Sign In</a></li>
        </ul>
        </div>
		 </div>
</div>
<?php }?> 
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
	<div class="navigation">
			<nav class="navbar navbar-default">
				 <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="page.php?type=aboutus">About</a></li>
			<li><a href="package-list.php">Tour Packages</a></li>
							 
			<?php if($_SESSION['login'])
{?> 
			<li><a href="enquiry.php"> Enquiry </a>  </li>
			<?php } else { ?>
			<li><a href="enquiry.php"> Enquiry </a>  </li>
			<li><a href="write-us.php"> write-us </a>  </li>
				<?php } ?>
		 </ul>
				</nav>
				</div> 
	</nav>
	</div>
	</div>
</div>