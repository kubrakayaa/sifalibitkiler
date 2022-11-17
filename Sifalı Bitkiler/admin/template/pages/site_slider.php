<?php include 'header.php'; 
  $slider_cek = $db->query("SELECT * FROM sifa_site_slider");

  $btnUpdate = $_POST['btnUpdate'];
  $btnEkle = $_POST['btnEkle'];
  $btnDelete = $_POST['btnDelete'];
  $gelenİd = $_POST['gelenİd'];
  $updName = $_POST['updName'];
  $isimkontrol = $_POST['isimkontrol'];
  $updFoto = $_POST['updFoto'];
  $updBaslik = $_POST['updBaslik'];
  $updAciklama = $_POST['updAciklama'];
  $addname = $_POST['addname'];
  $addfoto = $_POST['addfoto'];
  $addbaslik = $_POST['addbaslik'];
  $addaciklama = $_POST['addaciklama'];

  $slider_say = $db->query("SELECT COUNT(*) FROM sifa_site_slider");
  $say = $slider_say->fetchColumn();
  if ($say != 3) {
    $button_ekle = "<button type='submit' data-toggle='modal' data-target='#addslider' class='nav-link btn btn-success create-new-button' name='btnekle' >+ Yeni Slider Ekle</button>";
  }

  if (isset($btnUpdate)) {
    
    if ($updName != $isimkontrol) {
          $slider_kontrol = $db->query("SELECT * FROM sifa_site_slider WHERE sifa_site_slider_name = '$updName'");
    $say = $slider_kontrol->fetchColumn();
    if ($say > 0)
      $yanit = "<b style='color:red; font-weight:bold;'>Aynı İsimde Bir Slider Bulunuyor. !</b>";
    else{
      $slider_update = $db->query("UPDATE sifa_site_slider SET sifa_site_slider_name='$updName',sifa_site_slider_foto='$updFoto',sifa_site_slider_baslik='$updBaslik',sifa_site_slider_aciklama='$updAciklama' WHERE sifa_site_slider_id = '$gelenİd'");
      if ($slider_update)
        $yanit = "<b style='color:green; font-weight:bold;'>Güncelleme İşlemi Başarıyla Gerçekleşti. !</b>";
      else
        $yanit = "<b style='color:red; font-weight:bold;'>Güncelleme İşlemi Gerçekleşirken Bir Sorun Oluştu. !</b>";
      }
    }
    else
    {
      $slider_update = $db->query("UPDATE sifa_site_slider SET sifa_site_slider_name='$updName',sifa_site_slider_foto='$updFoto',sifa_site_slider_baslik='$updBaslik',sifa_site_slider_aciklama='$updAciklama' WHERE sifa_site_slider_id = '$gelenİd'");
      if ($slider_update)
        $yanit = "<b style='color:green; font-weight:bold;'>Güncelleme İşlemi Başarıyla Gerçekleşti. !</b>";
      else
        $yanit = "<b style='color:red; font-weight:bold;'>Güncelleme İşlemi Gerçekleşirken Bir Sorun Oluştu. !</b>";
    }
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_slider.php");}, 2000);
      </script>
    <?php
  }

  if (isset($btnEkle)) {
    $slider_kontrol = $db->query("SELECT * FROM sifa_site_slider WHERE sifa_site_slider_name = '$addname'");
    $say = $slider_kontrol->fetchColumn();
    if($say > 0)
      $yanit = "<b style='color:red; font-weight:bold;'>Aynı İsimde Bir Slider Bulunuyor. !</b>";
    else{
      $slider_ekle = $db->query("INSERT INTO sifa_site_slider(sifa_site_slider_name, sifa_site_slider_foto, sifa_site_slider_baslik, sifa_site_slider_aciklama) VALUES ('$addname','$addfoto','$addbaslik','$addaciklama')");
      if($slider_ekle)
        $yanit = "<b style='color:green; font-weight:bold;'>Slider Ekleme İşlemi Başarıyla Gerçekleşti. !</b>";
      else
        $yanit = "<b style='color:red; font-weight:bold;'>Slider Ekleme İşlemi Gerçekleşirken Bir Sorun Oluştu. !</b>";
    }
     ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_slider.php");}, 2000);
      </script>
    <?php
  }

  if (isset($btnDelete)) {
    $slider_sil = $db->query("DELETE FROM `sifa_site_slider` WHERE sifa_site_slider_id = '$gelenİd'");
    if ($slider_sil)
      $yanit = "<b style='color:green; font-weight:bold;'>Silme İşlemi Başarıyla Gerçekleşti. !</b>";
    else
      $yanit = "<b style='color:red; font-weight:bold;'>Silme İşlemi Gerçekleşirken Bir Sorun Oluştu. !</b>";
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_slider.php");}, 2000);
      </script>
    <?php
  }

?>
        <div class='main-panel'>
          <div class='content-wrapper'>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Slider Ayarları</h4>
                    <p class="card-description"><?php echo $yanit; ?></p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <?php echo $button_ekle; ?>
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Slider Adı </th>
                            <th> Slider Fotoğraf </th>
                            <th> Slider Başlık </th>
                            <th> Slider Açıklama </th>
                            <th> İşlem </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($slider_cek as $slider_cek) {?>
                          <tr>
                            <td class="py-1"><?php echo $counter; ?></td>
                            <td> <?php echo $slider_cek['sifa_site_slider_name']; ?> </td>
                            <td> <textarea class="form-control" disabled style="background-color: #000;"><?php echo $slider_cek['sifa_site_slider_foto']; ?></textarea>  </td>
                            <td> <?php echo $slider_cek['sifa_site_slider_baslik']; ?> </td>
                            <td><textarea class="form-control" disabled style="background-color: #000;"><?php echo $slider_cek['sifa_site_slider_aciklama'];?></textarea></td>
                            <td>
                              <button type="button" class="btn btn-outline-success editpage" data-toggle="modal" data-name="<?php echo $slider_cek['sifa_site_slider_name']; ?>" data-foto="<?php echo $slider_cek['sifa_site_slider_foto']; ?>" data-baslik="<?php echo $slider_cek['sifa_site_slider_baslik']; ?>" data-aciklama="<?php echo $slider_cek['sifa_site_slider_aciklama']; ?>" data-id="<?php echo $slider_cek['sifa_site_slider_id']; ?>" data-target="#exampleModal"> 
                                <i class="mdi mdi-table-edit"></i>Düzenle
                              </button>
                              <button class="btn btn-outline-danger deletepage" data-name="<?php echo $slider_cek['sifa_site_slider_name']; ?>" data-id="<?php echo $slider_cek['sifa_site_slider_id']; ?>"data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete-forever"></i> Sil
                              </button>
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
         <!-- Modal UPDATE-->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> Slider Ayarları</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body">
                            <div class="card">
                              <div class="card-body">
                                <form class="forms-sample" action="" method="post">
                                  <input type="hidden" name="gelenİd" id="value">
                                  <div class="form-group row">
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slider Adı</label>
                                    <div class="col-sm-9">
                                      <input id="name" type="text" class="form-control" name="updName"  placeholder="Slider Adı" required>
                                      <input id="namehidden" type="hidden" class="form-control" name="isimkontrol"  placeholder="Slider Adı" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slider Foto</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" id="foto" name="updFoto" placeholder="Slider Foto" required></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slider Başlık</label>
                                    <div class="col-sm-9">
                                     <input type="text" id="baslik" class="form-control" placeholder="Slider Başlık" name="updBaslik">
                                    </div>
                                  </div>
                                   <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slider Açıklama</label>
                                    <div class="col-sm-9">
                                      <textarea id="aciklama" class="form-control" placeholder="Slider Açıklama" name="updAciklama"></textarea>
                                    </div>
                                  </div>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-outline-primary" name="btnUpdate" id="btnUpdateSubmit">Değişiklikleri Kaydet</button>
                                </form>
                              </div>
                            </div>
                                </div>
                              </div>
                            </div>
                          </div>
                                  <!-- Modal Add-->
                  <div class="modal fade" id="addslider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> Slider Ekle</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                          <div class="modal-body">
                            <div class="card">
                              <div class="card-body">
                                <form class="forms-sample" action="" method="post">
                                  <div class="form-group row">
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slider Adı</label>
                                    <div class="col-sm-9">
                                      <input id="name" type="text" class="form-control" name="addname"  placeholder="Slider Adı" required>
                                      <input id="namehidden" type="hidden" class="form-control" name="isimkontrol"  placeholder="Slider Adı" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slider Foto</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" id="foto" name="addfoto" placeholder="Slider Foto" required></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slider Başlık</label>
                                    <div class="col-sm-9">
                                     <input type="text" id="baslik" class="form-control" placeholder="Slider Başlık" name="addbaslik">
                                    </div>
                                  </div>
                                   <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slider Açıklama</label>
                                    <div class="col-sm-9">
                                      <textarea id="aciklama" class="form-control" placeholder="Slider Açıklama" name="addaciklama"></textarea>
                                    </div>
                                  </div>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-outline-primary" name="btnEkle" id="btnUpdateSubmit">Slider Ekle</button>
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
                                              <p>
                                                Bu Slider Silmek İstediğinize Emin Misiniz ?
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('.editpage').click(function (event) {

        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var foto = $(this).attr("data-foto");
        var baslik = $(this).attr("data-baslik");
        var aciklama = $(this).attr("data-aciklama");

        $("#name").val(name);
        $("#namehidden").val(name);
        $("#foto").val(foto);
        $("#baslik").val(baslik);
        $("#aciklama").val(aciklama);
        $("#value").val(id);
    })

    $('.deletepage').click(function (event) {
        var name = $(this).attr("data-name");
        var socid = $(this).attr("data-id");

        $("#myModalLabel").text(name);
        $("#socid").val(socid);
        $("#gelenName").val(name);
    })

</script>
          <!-- content-wrapper ends -->
          <!-- Footer -->
<!-- foto başlık açıklama -->
<?php include 'footer.php'; ?>