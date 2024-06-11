<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'head.php';  ?>
</head>
<style>
.limiter-menu-desktop {
    height: 100%;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    background-color: 
    #f9f4f400;
}
.fix-menu-desktop .wrap-menu-desktop {
	height: 70px;
	background-color: 
	#fff;
	box-shadow: 0 0px 3px 0px rgba(0, 0, 0, 0.2);
	-moz-box-shadow: 0 0px 3px 0px rgba(0, 0, 0, 0.2);
	-webkit-box-shadow: 0 0px 3px 0px
	rgba(0, 0, 0, 0.2);
	-o-box-shadow: 0 0px 3px 0px rgba(0, 0, 0, 0.2);
	-ms-box-shadow: 0 0px 3px 0px rgba(0, 0, 0, 0.2);
}


</style>
<body class="animsition">
	<?php
	include 'header.php';
	?>


	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(img/3.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="padding-top: 70px; background-image: url(img/2.webp);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
							</div>
							<!-- <span class="ltext-101 cl2 respon2" style="color: white;">
									Nikmati Setiap Gigitannya
								</span> -->
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							</div>
							<!-- <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color: white;">
									Dharmasraya
								</h2> -->
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(img/10.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
							</div>
								<!-- <span class="ltext-101 cl2 respon2" style="color: white;">
									Renyah,Gurih Dan Banyak Lagi.
								</span> -->
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
							</div>
							<!-- <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color: white;">
									Dharmasraya
								</h2> -->
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-40 p-b-20">
		<div class="container">
			<div class="row">


			</div>
		</div>
	</div>

	<?php include 'lihatproduk.php';  ?>

	<?php include 'footer.php'; ?>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>


	<?php include 'script.php';  ?>

</body>

</html>