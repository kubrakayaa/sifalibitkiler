<?php include "header.php"; 

    $btnSil = $_POST['btnDelete'];
    $gelenİd = $_POST['gelenİd'];
    $gelenName = $_POST['gelenName'];
    $ExfotoUrl = $_POST['fotoUrl'];
    $NewFotoUrl = "../assets/images/bitkiler/";
    $btnUpdate = $_POST['btnUpdate'];
    $updFoto = $_POST['updFoto'];
    $updName = $_POST['updName'];
    $updAciklama = $_POST['updAciklama'];
    $updDetay = $_POST['updDetay'];
    $namefile = $_POST['namefile'];

    if (isset($btnUpdate)) {

      if (!empty($_FILES["bitkiFoto"])) {

        $yol = "../assets/images/bitkiler";
        
        $_FILES["bitkiFoto"]["name"] = "$updName.png";

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

                    $bitkiFoto = "../assets/images/bitkiler/$updName.png";
            }
            $islem = rename("../assets/images/bitkiler/$namefile.png", "../assets/images/bitkiler/$updName.png");
            if ($islem)
              $yanit = "<b style= 'color:green;'> İşlem Başarılı. !</b>";
            else
              $yanit = "<b style= 'color:red;'> İşlem Başarısız. !</b>";

            $bitki_update = $db->query("UPDATE sifa_bitkiler SET sifa_bitki_name='$updName',sifa_bitki_aciklama='$updAciklama',sifa_bitki_detay='$updDetay',sifa_bitki_foto='$bitkiFoto',sifa_bitki_foto_site='admin/template/assets/images/bitkiler/$updName.png' WHERE sifa_bitki_id = '$gelenİd'");

        }
  }

    else
    {
        $islem = rename("../assets/images/bitkiler/$namefile.png", "../assets/images/bitkiler/$updName.png");
        if ($islem)
          $yanit = "<b style= 'color:green;'> İşlem Başarılı. !</b>";
        else
          $yanit = "<b style= 'color:red;'> İşlem Başarısız. !</b>";
    }

    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("bitkiler.php");}, 2500);
      </script>
    <?php

  }


    if (isset($btnSil)) {
      $bitki_sil = $db->query("DELETE FROM sifa_bitkiler WHERE sifa_bitki_id='$gelenİd'");
      if ($bitki_sil){
        $sonuc = unlink($ExfotoUrl);
        $yanit = "<b style= 'color:green;'> İşlem Başarılı. !</b>";
      }
      else
        $yanit = "<b style= 'color:red;'> İşlem Başarısız. !</b>";
      ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("bitkiler.php");}, 2500);
      </script>
    <?php
    }
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> <?php echo $yanit." ".$yanit2; ?> </h3>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bitkiler</h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Bitki Foto </th>
                            <th> Bitki name </th>
                            <th> Bitki Açıklama </th>
                            <th> İşlem </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $counter = 0;
                            $socSor = $db->prepare("SELECT * FROM sifa_bitkiler GROUP BY sifa_bitki_id ASC");
                            $socSor->execute();
                            $socCek = $socSor->FetchAll(PDO::FETCH_ASSOC);
                            foreach ($socCek as $socCek) {
                                $counter++;
                          ?>
                          <tr>
                            <td>
                              <?php echo $counter; ?>
                            </td>
                            <td class="py-1">
                              <img src="<?php echo $socCek['sifa_bitki_foto']; ?>" alt="image" />
                            </td>
                            <td id="isim" style="text-transform:uppercase; font-weight: bold; color:#fff; font-size:12px;"> <?php echo $socCek['sifa_bitki_name']; ?> </td>

                            <td > <textarea class="form-control" disabled style="background-color:#191C24;"><?php echo $socCek['sifa_bitki_aciklama']; ?></textarea> </td>
                           
                            <td>

                                <button type="button" class="btn btn-outline-success editbitki" data-toggle="modal" data-name="<?php echo $socCek["sifa_bitki_name"] ?>" data-aciklama="<?php echo $socCek["sifa_bitki_aciklama"] ?>" data-foto="<?php echo $socCek["sifa_bitki_foto"] ?>" data-detay="<?php echo $socCek['sifa_bitki_detay']; ?>" data-id="<?php echo $socCek["sifa_bitki_id"] ?>" data-target="#exampleModal"> 
                                <i class="mdi mdi-table-edit"></i>Düzenle
                              </button>

                              <button class="btn btn-outline-danger editSocial" data-name="<?php echo $socCek["sifa_bitki_name"] ?>" data-foto="<?php echo $socCek["sifa_bitki_foto"] ?>" data-id="<?php echo $socCek["sifa_bitki_id"] ?>" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete-forever"></i> Sil
                              </button>
                            </td>

                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- Modal UPDATE-->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> Bitki Bilgilerini Güncelle</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body">
                            <div class="card">
                              <div class="card-body">
                                <form class="forms-sample" action="" method="POST"enctype="multipart/form-data">
                                  <input type="hidden" name="gelenİd" id="value">
                                  <div class="form-group row">
                                    <label for="exampleInputUsername2" id="veri2" class="col-sm-3 col-form-label">Bitki Foto</label>
                                    <div class="col-sm-9">
                                      <div >
                                      <img style="width: 50px !important;" id="imgfoto" src="<?php echo $socCek['sifa_bitki_foto']; ?>" alt="image" />
                                      </div>
                                      <input type="hidden"  id="foto" class="form-control" name="updFoto">
                                      <input type="hidden"  id="namefile" class="form-control" name="namefile">
                                      <input type="file" class="form-control" placeholder="Bitki Foto" name="bitkiFoto">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Bitki Name</label>
                                    <div class="col-sm-9">
                                      <input id="name" type="text" class="form-control" name="updName"  placeholder="" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Bitki Açıklama</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="aciklama" name="updAciklama" placeholder="" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Bitki Detay</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" id="detay" placeholder="" name="updDetay" required></textarea>
                                    </div>
                                  </div>
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-outline-primary" name="btnUpdate" id="btnUpdateSubmit">Değişiklikleri Kaydet</button>
                                </form>
                              </div>
                            </div>
                                </div>
                              </div>
                            </div>
                          </div>
                           
                          <!-- Modal DELETE-->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4  style="text-transform:uppercase;" class="modal-title" id="myModalLabel"></h4>
                                      </div>
                                      <div class="modal-body" style="height:120px">
                                          <form class="form-control" method="POST" action="">
                                              <input type="hidden" id="socid" name="gelenİd">
                                              <input type="hidden" id="fotoUrl" name="fotoUrl">
                                              <input type="hidden" id="gelenName" name="gelenName">
                                              <p>
                                                Bu Bitkiyi Silmek İstediğinize Emin Misiniz ?

                                              </p>
                                              <br>
                                                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kapat</button>
                                                  <button type="submit" name="btnDelete" class="btn btn-outline-danger">SİL</button>
                                          </form>
                                      </div>
                                  </div>
                                  <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                      </td>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('.editbitki').click(function (event) {
        var name = $(this).attr("data-name");
        var foto = $(this).attr("data-foto");
        var aciklama = $(this).attr("data-aciklama");
        var detay = $(this).attr("data-detay");
        var id = $(this).attr("data-id");
        var imgfoto = document.getElementById("imgfoto");

        $("#name").val(name);
        $("#aciklama").val(aciklama);
        $("#detay").val(detay);
        $("#value").val(id);
        $("#foto").val(foto);
        $("#fotoUrl").val(foto);
        $("#namefile").val(name);
        imgfoto.src = foto;
    })

    $('.editSocial').click(function (event) {
        var name = $(this).attr("data-name");
        var foto = $(this).attr("data-foto");
        var socid = $(this).attr("data-id");
        var fotoUrl = document.getElementById("fotoUrl");

        $("#myModalLabel").text(name);
        fotoUrl.value = foto;
        $("#socid").val(socid);
        $("#gelenName").val(name);
    })

</script>

<?php include "footer.php"; ?>