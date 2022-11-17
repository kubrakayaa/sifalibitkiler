<?php include "admin/ayar.php"; 
	
	 $sifa = $db->query("SELECT * FROM sifa_head")->fetch(PDO::FETCH_ASSOC);
	 $sifa_iletisim = $db->query("SELECT * FROM sifa_iletisim")->fetch(PDO::FETCH_ASSOC);
	 $sifa_slider = $db->query("SELECT * FROM sifa_site_slider GROUP BY sifa_site_slider_id ASC");
	 $sifa_navbar = $db->query("SELECT * FROM sifa_site_navbar");
	 $sifa_navbar2 = $db->query("SELECT * FROM sifa_site_navbar");
	 $sifa_icerik = $db->query("SELECT * FROM sifa_site_anasayfa");
	 $sifa_icerik2 = $db->query("SELECT * FROM sifa_site_anasayfa_2");

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=,, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
	<title><?php echo $sifa['sifa_name']; ?></title>
	<link rel="icon" type="image/x-icon" href="<?php echo $sifa['sifa_logo']; ?>">
	<link rel="stylesheet" href="assets/css/stylebitki.css">
    <link rel="stylesheet" href="assets/css/mobilestyle.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://css.gg/css?=|instagram|mail|twitter|youtube|phone|home|home-alt|format-right" rel="stylesheet">

</head>

<body>
		<!-- Preloader Start -->

		<div class="preloader">
			<div class="spinner"><img src="<?php echo $sifa['sifa_logo']; ?>" alt="" width="140vh"></div>
		</div>
		<!-- Preloader Start -->
	<!-- Header Start -->
    <header class="header">
		<!-- Navbar Start -->
		<div class="up-number-menu">
			<div class="iletisim">
			</div>
			<div class="email">
				<div class="icon"> <i class="gg-mail"></i></div>
				<div class="email-font">
					<h1 class="callme">Email</h1>
					<h2 class="up-number"><a href="mailto://<?php echo $sifa_iletisim['sifa_iletisim_mail']; ?>" style="text-decoration: none;"><?php echo $sifa_iletisim['sifa_iletisim_mail']; ?></a></h2>
				</div>
			</div>
			<div class="lokasyon">
				<div class="icon"><i class="gg-home"></i></div>
				<div class="lokasyon-font">
					<h1 class="callme">Lokasyon</h1>
					<h1 class="up-number"> <?php echo $sifa_iletisim['sifa_iletisim_adres']; ?></h1>
				</div>
			</div>
			<div class="number">
				<div class="icon"><i class="gg-phone"></i></div>
				<div class="number-font">
					<h1 class="callme">Bizi Arayın</h1>
					<h1 class="up-number" ><a href="tel://<?php echo $sifa_iletisim['sifa_iletisim_telefon']; ?>" style="text-decoration: none;"><?php echo $sifa_iletisim['sifa_iletisim_telefon']; ?></a></h1>
				</div>
			</div>
		</div>
        <div class="up-menu" id="up-menu">
            <div class="up-left">
                <h1 class="logo"><a href="index.php"><img src="<?php echo $sifa['sifa_logo']; ?>" class="logo-navbar" alt="" width="140vh"></a></h1>
            </div>
            <div class="up-right">
                <ul class="navbarr">
                	<?php foreach ($sifa_navbar as $sifa_navbar) {
                		if ($sifa_navbar['sifa_site_navbar_name'] == "Admin Girişi") {
                			echo "<li class='navbar-li' id='panel' ><a href='admin/index.php' class='nav-link'>Admin Girişi</a></li>";
                		}
                		else if($sifa_navbar['sifa_site_navbar_name'] != "Admin Girişi")
                		{
                	?>
                    <li class="navbar-li"><a href="<?php echo $sifa_navbar['sifa_site_navbar_link']; ?>" class="nav-link"><?php echo $sifa_navbar['sifa_site_navbar_name']; ?></a></li>
                	<?php }} ?>
                	<!--
                    <li class="navbar-li"><a href="index.php" class="nav-link">Anasayfa</a></li>
                    <li class="navbar-li"><a href="bitki.php" class="nav-link">Bitkiler</a></li>
                    <li class="navbar-li"><a href="hastalik.php" class="nav-link">Hastalıklar</a></li>
                    <li class="navbar-li"><a href="#" class="nav-link">İletişim</a></li>
                    <li class="navbar-li" ><a href="admin/index.php"class="nav-link">Admin Girişi</a></li>
                	-->
                </ul>
            </div>
			<button class="mobile-nav" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="gg-format-right"></i></button>

			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title" id="offcanvasRightLabel">Menü</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<!--
			<div class="offcanvas-body">
				<ul class="ofcanvas-navbar">
                    <li class="ofcanvas" id="panel"><a href="" class="navv-link">Admin Girişi</a></li>
                    <li class="ofcanvas"><a href="index.php" class="navv-link">Anasayfa</a></li>
                    <li class="ofcanvas"><a href="bitki.php" class="navv-link">Bitkiler</a></li>
                    <li class="ofcanvas"><a href="hastalik.php" class="navv-link">Hastalıklar</a></li>
                    <li class="ofcanvas"><a href="" class="navv-link">İletişim</a></li>
                </ul>
			</div>-->
			
			<div class="offcanvas-body">
				<ul class="ofcanvas-navbar">
					<?php foreach ($sifa_navbar2 as $sifa_navbar2) {
                		if ($sifa_navbar2['sifa_site_navbar_name'] == "Admin Girişi") {
                			echo "<li class='ofcanvas' id='panel' ><a href='admin/index.php' class='navv-link'>Admin Girişi</a></li>";
                		}
                		else if($sifa_navbar2['sifa_site_navbar_name'] != "Admin Girişi")
                		{
                	?>
                    <li class="ofcanvas"><a href="<?php echo $sifa_navbar2['sifa_site_navbar_link']; ?>" class="navv-link"><?php echo $sifa_navbar2['sifa_site_navbar_name']; ?></a></li>
                	<?php }} ?>
					<!--
                    <li class="ofcanvas" id="panel"><a href="admin/index.php" class="navv-link">Admin Girişi</a></li>
                    <li class="ofcanvas"><a href="index.php" class="navv-link">Anasayfa</a></li>
                    <li class="ofcanvas"><a href="bitki.php" class="navv-link">Bitkiler</a></li>
                    <li class="ofcanvas"><a href="hastalik.php" class="navv-link">Hastalıklar</a></li>
                    <li class="ofcanvas"><a href="" class="navv-link">İletişim</a></li>
                </ul>-->
			</div>
			</div>
            </div>
        </div>
		<!-- Navbar End -->

        <div class="down-menu">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                	<?php foreach ($sifa_slider as $sifa_slider) {?>
                    <div class="carousel-item active">
                        <img src="<?php echo $sifa_slider['sifa_site_slider_foto']; ?>" class="carousel-img" alt="" >
                        <h1 class="corusel-baslik"><?php echo $sifa_slider['sifa_site_slider_baslik']; ?></h1>
                        <h2 class="carousel-font"><?php echo $sifa_slider['sifa_site_slider_aciklama']; ?></h2>
                        <button class="more">LEARN MORE</button>
                    </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
					  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Previous</span>
					</button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
					  <span class="carousel-control-next-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Next</span>
					</button>
            </div>
        </div>
    </header>