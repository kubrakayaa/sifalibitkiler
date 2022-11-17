<?php include "header.php"; 
  
  $ekle = $_POST['btnEkle'];
  $cik = $_POST['btnCancel'];
  $bitkiAd = $_POST['bitkiAd'];
  $bitkiAciklama = $_POST['bitkiAciklama'];
  $bitkiDetay = $_POST['bitkiDetay'];
  $btnUpdate = $_POST['btnUpdate'];

  $bitkiAciklama = str_replace("'","&#96",$bitkiAciklama);
  $bitkiDetay = str_replace("'","&#96",$bitkiDetay);

  if (isset($ekle)) {

        if ($_FILES["bitkiFoto"]) {

        $yol = "../assets/images/bitkiler";
        
        $_FILES["bitkiFoto"]["name"] = "$bitkiAd.png";

        $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["bitkiFoto"]["name"];

            if ($_FILES["bitkiFoto"]["size"]  > 1000000) {

                $yanit = "<p style='color: red; font-weight:bold;'>Dosya Boyutu Sınırı Aşıldı !</p>";

            } else {

                $dosyaUzantisi = pathinfo($_FILES["bitkiFoto"]["name"], PATHINFO_EXTENSION);

                if ($dosyaUzantisi != "jpg" && $dosyaUzantisi != "png") {

                    $yanit = "<p style='color:#e1a237; font-weight:bold;'>Sadece jpg ve png uzantılı dosyalar yüklenebilir ! </p>";

                } else {

                    $sonuc = move_uploaded_file($_FILES["bitkiFoto"]["tmp_name"], $yuklemeYeri);

                    $yanit = $sonuc ? "<p style='color:green; font-weight:bold;'>Dosya başarıyla yüklendi !</p>" : "<p style='color: red; font-weight:bold;'>Hata oluştu !</p>";

                    $bitkiFoto = "../assets/images/bitkiler/$bitkiAd.png";
            }

        }

      } else {

        $yanit = "Lütfen bir dosya seçin";

      }

    $bitkiSor = $db->query("SELECT * FROM sifa_bitkiler WHERE sifa_bitki_name = '$bitkiAd'");
    $say = $bitkiSor->fetchColumn();

    if ($say > 0) {
      $yanit = "<b style= 'color:red;'> Aynı İsimde Bir Bitki Bulunuyor. '$bitkiAd' !</b>";
    }
    else{

      $bitkiEkle = $db->query("INSERT INTO sifa_bitkiler(sifa_bitki_name, sifa_bitki_aciklama, sifa_bitki_detay, sifa_bitki_foto, sifa_bitki_foto_site) VALUES ('$bitkiAd','$bitkiAciklama','$bitkiDetay','$bitkiFoto','admin/template/assets/images/bitkiler/$bitkiAd.png')");
    if ($bitkiEkle)
      $yanit = "<b style= 'color:green;'> İşlem Başarılı. !</b>";
    else
      $yanit = "<b style= 'color:red;'> İşlem Başarısız. !</b>";

    }
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("bitki_ekle.php");}, 2000);
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
                    <h4 class="card-title">Bitki Ekleme</h4>
                    <?php echo $tut; ?>
                    <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Bitki Adı</label>
                        <input type="text" class="form-control"  placeholder="Bitki Adı" name="bitkiAd" required>
                      </div>
                      <div class="form-group">
                        <label>Bitki Foto</label>
                        <input type="file" name="bitkiFoto" class="file-upload-default" required>
                        <div class="input-group col-xs-12">
                          <input type="text" name="bitkiFoto" class="form-control file-upload-info" disabled placeholder="Fotoğraf Yükleyin. (Zorunlu Alan)">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Yükle</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Bitki Açıklama</label>
                        <textarea class="form-control"  placeholder="Bitki Açıklama" name="bitkiAciklama" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Bitki Detay</label>
                        <textarea class="form-control" placeholder="Bitki Detay" name="bitkiDetay" required></textarea>
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