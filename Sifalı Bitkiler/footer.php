<?php 
	$btngönder = $_POST['btngönder'];
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$mesaj = $_POST['mesaj'];

	if (isset($btngönder)) {
		$mesaj_ilet = $db->query("INSERT INTO sifa_site_iletisim_form(sifa_site_form_isim, sifa_site_form_mail, sifa_site_form_mesaj) VALUES ('$name','$mail','$mesaj')");
		if($mesaj_ilet)
			$yanit = "Mesajınız başarıyla iletildi. !";
		else
			$yanit = "Mesajınız gönderilirken bir sorun oluştu. !";
		?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("");}, 10);
      </script>
    <?php
	}
 ?>
	<footer class="footer">
		<div class="slogan">
			<h1 class="footer-logo"><img src="<?php echo $sifa['sifa_logo']; ?>" alt="" width="160vh"></h1>

			<h2 class="footer-slogan"><?php echo $sifa_iletisim['sifa_footer_aciklama']; ?> </h2>
		</div>
		<div class="contact">
			<h1 class="contact-baslik">İletişim Bilgileri</h1>
			<h2 class="contact-adres"><i class="gg-home"></i><p class="adres"> <?php echo $sifa_iletisim['sifa_iletisim_adres'] ?></p></h2>
			<h2 class="contact-mail"><i class="gg-mail"></i><p class="mail"> <a href="mailto://<?php echo $sifa_iletisim['sifa_iletisim_telefon']; ?>" style="text-decoration: none;"><?php echo $sifa_iletisim['sifa_iletisim_mail']; ?></a></p></h2>
			<h2 class="contact-number"><i class="gg-phone"></i> <p> <a href="tel://<?php echo $sifa_iletisim['sifa_iletisim_telefon']; ?>" style="text-decoration: none;"><?php echo $sifa_iletisim['sifa_iletisim_telefon']; ?></a></p></h2>


			<div class="icons">
				<a href="https://www.instagram.com/<?php echo $sifa_iletisim['sifa_iletisim_insta']; ?>" class="iconlink"><i class="gg-instagram"></i></a>
				<a href="https://www.tiktok.com/@<?php echo $sifa_iletisim['sifa_iletisim_tiktok']; ?>" class="iconlink"><i class="gg-twitter"></i></a>
				<a href="https://www.youtube.com/c/<?php echo $sifa_iletisim['sifa_iletisim_youtube']; ?>" class="iconlink"><i class="gg-youtube"></i></a>
				<a href="https://www.facebook.com/<?php echo $sifa_iletisim['sifa_iletisim_facebook']; ?>"><i class="gg-facebook"></i></a>
			</div>
		</div>
		<div class="form">
			<form action="" method="post">
				<label for="name">Adınız: </label>
				<br>
				<input type="text" name="name" id="name" placeholder="isim" required>
				<br>
				<label for="email">Email:</label>
				<br>
				<input type="email" name="mail" id="email" placeholder="örnek@örnek.com" required>
				<br>
				<label for="email">Görüşleriniz:</label>
				<br>
				<textarea name="mesaj" id="textarea" cols="30" rows="5" placeholder="Yazınız..." required></textarea>
				<br>
				<button type="submit" name="btngönder" class="btn btn-dark mb-3">Gönder</button>
			</form>
		</div>
		<div>
			<button class="homee" id="home" onclick="location.href='#header'"><i class="gg-home-alt"></i></button>
		</div>
	</footer>

	<!-- Footer End -->
  <script
	src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"
	integrity="sha512-HzAEuXwhLxwm/Jj+5ecdjzrRVrjuh2ZeIxyT1Ln37TO5pWNMnKBuU7cfd1wvRQ/k86w1oC174Yk1T7aRlBpIcA=="
	crossorigin="anonymous"
  ></script>
  <script
	src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"
	integrity="sha512-A98SmLRZISk4eIxQBeCm8k0jAcwN3A3lBx4hr7baoMpV1VpxcxlZIhi5fJIZN50sQ5RlCzx8yV+Voy2cR6x0aA=="
	crossorigin="anonymous"
  ></script>
  <script
	src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
	integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
	crossorigin="anonymous"
  ></script>
	<script src="assets/js/app.js"></script>
</body>

</html>