<?php include "header.php"; 

	$bitki_cek = $db->query("SELECT * FROM sifa_bitkiler");

?>
	<!-- Header End -->
	<div class="bosluk"></div>
	<div class="boslukk"></div>



	<!-- Main Start -->
	<section class="bitkiler">
		<h1 class="bitki-baslik">BİTKİLER</h1>
		<div class="bitki-cards">
			<!-- Bitki Start -->

			<?php foreach ($bitki_cek as $bitki_cek){ ?>

			<div class="card" style="width: 18rem;">
				<img class="card-img-top" src="<?php echo $bitki_cek['sifa_bitki_foto_site']; ?>" alt="Card image cap">
				<div class="card-body">
				  	<h3 class="card-title"><?php echo  $bitki_cek['sifa_bitki_name']; ?></h1>
					<ul class="list-group list-group-flush">
					  	<h5 class="list-group-item" style="font-weight: 50;"><?php echo $bitki_cek['sifa_bitki_aciklama']; ?></li>
					</ul>
					<p class="card-text">
						<p class="card-text"><?php 
						$cikti = explode("//", $bitki_cek['sifa_bitki_detay']);
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