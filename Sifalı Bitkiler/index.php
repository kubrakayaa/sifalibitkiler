<?php include "header.php"; ?>
	<!-- Header End -->
	<div class="bosluk"></div>

	<!-- Main Start -->

    <section class="main" id="main">
    	<?php foreach ($sifa_icerik as $sifa_icerik) {?>
		<div class="main-left">
			<img src="<?php echo $sifa_icerik['sifa_site_anasayfa_foto']; ?>" alt="" class="main-img">
		</div>
		<div class="main-right">
			<h1 class="main-baslik"><?php echo $sifa_icerik['sifa_site_anasayfa_baslik']; ?></h1>
			<h2 class="main-aciklama"><?php echo $sifa_icerik['sifa_site_anasayfa_aciklama']; ?></h2>
		</div>
	<?php } ?>
    </section>

	<!-- Main End -->
	<div class="bosluk"></div>


	<!-- İmg Start -->

	<section class="img">
	</section>

	<!-- İmg End -->
	<div class="boslukk"></div>

	<!-- Main2 Start -->

	<section class="main2" id="main2">
		<?php foreach ($sifa_icerik2 as $sifa_icerik2) {?>
		<div class="section1">
			<h1 class="main2-baslik"><?php echo $sifa_icerik2['sifa_site_anasayfa_baslik']; ?></h1>
			<h2 class="main2-aciklama"><?php echo $sifa_icerik2['sifa_site_anasayfa_aciklama']; ?></h1>
		</div>
	<?php } ?>
    </section>
	<div class="boslukkk"></div>
	<!-- Main2 End -->

	<!-- Footer Start -->
<?php include "footer.php"; ?>