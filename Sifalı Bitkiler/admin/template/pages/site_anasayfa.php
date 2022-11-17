<?php include 'header.php'; 
   $sifa_icerik = $db->query("SELECT * FROM sifa_site_anasayfa");
   $sifa_icerik2 = $db->query("SELECT * FROM sifa_site_anasayfa_2");

   $updicerik1 = $_POST['updicerik1'];
   $updicerik2 = $_POST['updicerik2'];
   $upbaslik = $_POST['upbaslik'];
   $upaciklama = $_POST['upaciklama'];
   $upurl = $_POST['upurl'];
   ///
   $gelenİd = $_POST['gelenİd'];
   $upbaslikk = $_POST['upbaslikk'];
   $upaciklamaa = $_POST['upaciklamaa'];

   if (isset($updicerik1)) {
     $icerik_update = $db->query("UPDATE sifa_site_anasayfa SET sifa_site_anasayfa_baslik='$upbaslik',sifa_site_anasayfa_aciklama='$upaciklama',sifa_site_anasayfa_foto='$upurl' WHERE sifa_site_anasayfa_id = '1'");
      if($icerik_update)
        $yanit = "<b style='color:green; font-weight:bold;'>İçerik Başarıyla Güncellendi. !</b><br><br>";
      else
        $yanit = "<b style='color:red; font-weight:bold;'>İçerik Güncellenirken Bir Hata Oluştu. !</b><br><br>";
      ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_anasayfa.php");}, 2000);
      </script>
    <?php
   }

   if (isset($updicerik2)) {
    
      $icerik_update2 = $db->query("UPDATE sifa_site_anasayfa_2 SET sifa_site_anasayfa_baslik='$upbaslikk',sifa_site_anasayfa_aciklama='$upaciklamaa' WHERE sifa_site_anasayfa_id = '$gelenİd'");
      if($icerik_update2)
        $yanit = "<b style='color:green; font-weight:bold;'>İçerik Başarıyla Güncellendi. !</b><br><br>";
      else
        $yanit = "<b style='color:red; font-weight:bold;'>İçerik Güncellenirken Bir Hata Oluştu. !</b><br><br>";
      ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_anasayfa.php");}, 2000);
      </script>
    <?php
   }


?>
        <div class='main-panel'>
          <div class='content-wrapper'>
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Anasayfa İçerik Alanı - 1</h4>
                    <p class="card-description"><?php echo $yanit; ?></p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> İçerik Başlığı </th>
                            <th> İçerik Açıklama </th>
                            <th> İçerik Url </th>
                            <th> İşlem </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($sifa_icerik as $sifa_icerik) {?>
                          <tr>
                            <td> 1 </td>
                            <td> <?php echo $sifa_icerik['sifa_site_anasayfa_baslik']; ?> </td>
                            <td> <textarea class="form-control" disabled style="background-color:#212529;"><?php echo $sifa_icerik['sifa_site_anasayfa_aciklama']; ?></textarea> </td>
                            <td> <textarea class="form-control" disabled style="background-color:#212529;"> <?php echo $sifa_icerik['sifa_site_anasayfa_foto']; ?></textarea> </td>
                            <td>
                              <button type="button" class="btn btn-outline-success editpage" data-toggle="modal" data-baslik="<?php echo $sifa_icerik['sifa_site_anasayfa_baslik']; ?>" data-aciklama="<?php echo $sifa_icerik['sifa_site_anasayfa_aciklama']; ?>" data-url="<?php echo $sifa_icerik['sifa_site_anasayfa_foto']; ?>" data-id="<?php echo $sifa_icerik['sifa_site_anasayfa_id']; ?>" data-target="#exampleModal"> 
                                <i class="mdi mdi-table-edit"></i> Düzenle
                              </button>
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">Anasayfa İçerik Alanı - 2</h4>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Başlık </th>
                            <th> Açıklama </th>
                            <th> İşlem </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($sifa_icerik2 as $sifa_icerik2) {?>
                          <tr>
                            <td> 1 </td>
                            <td> <?php echo $sifa_icerik2['sifa_site_anasayfa_baslik']; ?> </td>
                            <td> <textarea class="form-control" disabled style="background-color:#212529;"><?php echo $sifa_icerik2['sifa_site_anasayfa_aciklama']; ?></textarea></td>
                            <td>
                              <button type="button" class="btn btn-outline-success editfooter" data-toggle="modal" data-upbaslikk = "<?php echo $sifa_icerik2['sifa_site_anasayfa_baslik']; ?>" data-aciklama="<?php echo $sifa_icerik2['sifa_site_anasayfa_aciklama']; ?>" data-id="<?php echo $sifa_icerik2['sifa_site_anasayfa_id']; ?>" data-target="#myModal"> 
                                <i class="mdi mdi-table-edit"></i> Düzenle
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
                          <h5 class="modal-title" id="exampleModalLabel"> Anasayfa İçerik Alanı - 1 Bilgilerini Güncelle</h5>
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
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">İçerik Başlığı</label>
                                    <div class="col-sm-9">
                                      <input type="text" id="baslik" class="form-control" name="upbaslik"  placeholder="İçerik Başlığı" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">İçerik Açıklama</label>
                                    <div class="col-sm-9">
                                      <textarea type="text" class="form-control" id="aciklama" name="upaciklama" placeholder="İçerik Açıklama" required></textarea>
                                     </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">İçerik Url</label>
                                    <div class="col-sm-9">
                                      <textarea  type="text" id="url" class="form-control" placeholder="İçerik Url" name="upurl"></textarea>
                                    </div>
                                  </div>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-outline-primary" name="updicerik1" id="btnUpdateSubmit">Değişiklikleri Kaydet</button>
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
                                      <div class="card">
                                        
                              <div class="card-body">
                                <form class="forms-sample" action="" method="post">
                                  <input type="hidden" id="id" name="gelenİd">
                                  <div class="form-group row">
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Başlık</label>
                                    <div class="col-sm-9">
                                      <input type="text"id="upbaslikk" class="form-control" name="upbaslikk"  placeholder="Başlık" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Açıklama</label>
                                    <div class="col-sm-9">
                                      <textarea id="aciklamaa" class="form-control" name="upaciklamaa"  placeholder="Açıklama" required></textarea>
                                    </div>
                                  </div>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-outline-primary" name="updicerik2" id="btnUpdateSubmit">Değişiklikleri Kaydet</button>
                                </form>
                              </div></div>
                              </div>
                            </div>
                                  </div>
                                  <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                          </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('.editpage').click(function (event) {

        // adres tel mail insta tiktok youtube facebook
        var id = $(this).attr("data-id");
        var baslik = $(this).attr("data-baslik");
        var aciklama = $(this).attr("data-aciklama");
        var url = $(this).attr("data-url");

        $("#id").val(id);
        $("#baslik").val(baslik);
        $("#aciklama").val(aciklama);
        $("#url").val(url);
    })

    $('.editfooter').click(function (event) {
        var id = $(this).attr("data-id");
        var aciklama = $(this).attr("data-aciklama");
        var upbaslikk = $(this).attr("data-upbaslikk");

        $("#id").val(id);
        $("#aciklamaa").val(aciklama);
        $("#upbaslikk").val(upbaslikk);
    })

</script>

          <!-- content-wrapper ends -->
          <!-- Footer -->
<?php include 'footer.php'; ?>