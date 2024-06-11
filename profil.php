<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php';  ?>
</head>
<body>
	<?php include 'header-white.php';  
	date_default_timezone_set('Asia/Jakarta');?>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="register_simpan.php">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-7 col-xl-6 m-lr-auto m-b-50">
					
						<h4 class="mtext-109 cl2 p-b-30">
							
						</h4>
						<h5 class="green">
							
						</h5>
						
						<br/>
						
				</div>
				 <img src="images/profil.jpg" width="300" height="250">   
			</div>
		</div>
	</form>
<?php include 'Footer.php';  ?>
<?php include 'script.php';  ?>
<script>
	function hanyaAngka(evt) {
	  var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))

	    return false;
	  return true;
	}
</script>
</body>
</html>