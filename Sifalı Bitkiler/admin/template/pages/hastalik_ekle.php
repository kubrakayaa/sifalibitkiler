<?php include "header.php"; 
  
  $ekle = $_POST['btnEkle'];
  $cik = $_POST['btnCancel'];
  $hastalikAd = $_POST['hastalikAd'];
  $hastalikAciklama = $_POST['hastalikAciklama'];
  $hastalikBitkiler = $_POST['hastalikBitkiler'];
  $btnUpdate = $_POST['btnUpdate'];

  $hastalikAciklama = str_replace("'","&#96",$hastalikAciklama);
  $hastalikBitkiler = str_replace("'","&#96",$hastalikBitkiler);

  if (isset($ekle)) {

        if ($_FILES["hastalikFoto"]) {

        $yol = "../assets/images/hastalıklar";
        
        $_FILES["hastalikFoto"]["name"] = "$hastalikAd.png";

        $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["hastalikFoto"]["name"];

            if ($_FILES["hastalikFoto"]["size"]  > 1000000) {

                $yanit = "<p style='color: red; font-weight:bold;'>Dosya Boyutu Sınırı Aşıldı !</p>";

            } else {

                $dosyaUzantisi = pathinfo($_FILES["hastalikFoto"]["name"], PATHINFO_EXTENSION);

                if ($dosyaUzantisi != "jpg" && $dosyaUzantisi != "png") {

                    $yanit = "<p style='color:#e1a237; font-weight:bold;'>Sadece jpg ve png uzantılı dosyalar yüklenebilir ! </p>";

                } else {

                    $sonuc = move_uploaded_file($_FILES["hastalikFoto"]["tmp_name"], $yuklemeYeri);

                    $yanit = $sonuc ? "<p style='color:green; font-weight:bold;'>Dosya başarıyla yüklendi !</p>" : "<p style='color: red; font-weight:bold;'>Hata oluştu !</p>";

                    $hastalikFoto = "../assets/images/hastalıklar/$hastalikAd.png";
            }

        }

      } else {

        $yanit = "Lütfen bir dosya seçin";

      }

    $hastalikSor = $db->query("SELECT * FROM sifa_hastaliklar WHERE sifa_hastalik_name = '$hastalikAd'");
    $say = $hastalikSor->fetchColumn();

    if ($say > 0) {
      $yanit = "<b style= 'color:red;'> Aynı İsimde Bir Bitki Bulunuyor. '$hastalikAd' !</b>";
    }
    else{

      $hastalikEkle = $db->query("INSERT INTO sifa_hastaliklar( sifa_hastalik_name, sifa_hastalik_aciklama, sifa_hastalik_foto, sifa_hastalik_foto_site, sifa_hastalik_bitkiler) VALUES ('$hastalikAd','$hastalikAciklama','$hastalikFoto','admin/template/assets/images/hastalıklar/$hastalikAd.png', '$hastalikBitkiler')");

    if ($hastalikEkle)
      $yanit = "<b style= 'color:green;'> İşlem Başarılı. !</b>";
    else
      $yanit = "<b style= 'color:red;'> İşlem Başarısız. !</b>";

    }
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("hastalik_ekle.php");}, 2500);
      </script>
    <?php

  }
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title"><?php echo $yanit; ?></h3>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Hastalık Ekleme</h4>
                    <?php echo $tut; ?>
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Hastalık Adı</label>
                        <input type="text" class="form-control"  placeholder="Hastalık Adı" name="hastalikAd" required>
                      </div>
                      <div class="form-group">
                        <label>Hastalık Foto</label>
                        <input type="file" name="hastalikFoto" class="file-upload-default" required>
                        <div class="input-group col-xs-12">
                          <input type="text" name="bitkiFoto" class="form-control file-upload-info" disabled placeholder="Fotoğraf Yükleyin. (Zorunlu Alan)">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Yükle</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Hastalık Açıklama</label>
                        <textarea class="form-control"  placeholder="Hastalık Açıklama" name="hastalikAciklama" required ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Hastalık İyi Gelen Bitkiler</label>
                        <textarea class="form-control" placeholder="Hastalığa İyi Gelen Bitkiler" name="hastalikBitkiler" required></textarea>
                      </div>
                      <button type="submit" name="btnEkle" class="btn btn-success mr-2">Ekle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- Footer -->
<?php include "footer.php"; ?>