<?php include "header.php";
	$hastalik_cek = $db->query("SELECT * FROM sifa_hastaliklar")->fetchAll(PDO::FETCH_ASSOC);
 ?>
	<!-- Header End -->
	<div class="bosluk"></div>
	<div class="boslukk"></div>

	<!-- Main Start -->
	<section class="hastaliklar">
		<h1 class="hastaliklar-baslik">HASTALIKLAR</h1>
		<div class="hastaliklar-cards">

			<?php foreach ($hastalik_cek as $hastalik_cek ) {?>
			<div class="card" style="width: 18rem;">
				<img class="card-img-top" src="<?php echo $hastalik_cek['sifa_hastalik_foto_site']; ?>" alt="Card image cap">
				<div class="card-body">
				  	<h3 class="card-title"><?php echo $hastalik_cek['sifa_hastalik_name']; ?></h1>
					<ul class="list-group list-group-flush">
					  	<h5 class="list-group-item" style="font-weight: 50;"><?php echo $hastalik_cek['sifa_hastalik_aciklama']; ?></li>
					</ul>
					<p class="card-text">
						<h4 style="color:#000;"><?php echo $hastalik_cek['sifa_hastalik_name']." İyi Gelen Bitkiler"; ?> </h4>
						<p class="card-text"><?php 
						$cikti = explode("//", $hastalik_cek['sifa_hastalik_bitkiler']);
						$i = 0;
						while ($i < count($cikti)) {
						 	echo "<li style='color: #000;'>".ucWords($cikti[$i])."</li>";
						 	$i++;
						 } ?>
						</p>
					</p>
				</div>
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


	<div class="boslukkk"></div>

	<!-- Footer Start -->
<?php include "footer.php"; ?>