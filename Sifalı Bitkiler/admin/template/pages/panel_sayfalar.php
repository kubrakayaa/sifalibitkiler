<?php include 'header.php'; 
  $sayfa_cek = $db->query("SELECT * FROM sifa_admin_page");

  $btnDelete = $_POST['btnDelete'];
  $btnUpdate = $_POST['btnUpdate'];
  $gelenİd = $_POST['gelenİd'];
  $updName = $_POST['updName'];
  $updUrl = $_POST['updUrl'];
  $updİcon = $_POST['updİcon'];
  $isimkontrol = $_POST['isimkontrol'];
  $urlhidden = $_POST['urlhidden'];
  $pageyetki = $_POST['pageyetki'];
  $delurl = $_POST['delurl'];


  if (isset($btnUpdate)) {

    if ($isimkontrol == $updName && $urlhidden == $updUrl) {
        
        $page_update = $db->query("UPDATE sifa_admin_page SET sifa_admin_page_name='$updName',sifa_admin_page_url='$updUrl',sifa_admin_page_icons='$updİcon' WHERE sifa_admin_page_id = '$gelenİd'");
          if ($page_update)
            $yanit = "<b style='color:green;'>Sayfa Bilgileri Başarıyla Güncellendi. !</b>";
          else
            $yanit = "<b style='color:red;'>Sayfa Bilgileri Güncellenirken Hata Oluştu. !</b>";
    }
    else{

      $sayfa_sor = $db->query("SELECT * FROM sifa_admin_page WHERE sifa_admin_page_url = '$updUrl' || sifa_admin_page_name = '$updName'");
      $say = $sayfa_sor->fetchColumn();

      if ($say > 0)
         $yanit = "<b style='color: red; font-weight:bold;'>Aynı İsimde veya Url Sahip Bir Sayfa Bulunuyor !</b>";

       else{

        $page_update = $db->query("UPDATE sifa_admin_page SET sifa_admin_page_name='$updName',sifa_admin_page_url='$updUrl',sifa_admin_page_icons='$updİcon' WHERE sifa_admin_page_id = '$gelenİd'");
          if ($page_update)
            $yanit = "<b style='color:green;'>Sayfa Bilgileri Başarıyla Güncellendi. !</b>";
          else
            $yanit = "<b style='color:red;'>Sayfa Bilgileri Güncellenirken Hata Oluştu. !</b>";
        }
    }
        ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("panel_sayfalar.php");}, 2000);
      </script>
    <?php
  }

  if (isset($btnDelete)) {
    $yanit = "true";
    $sayfa_sil = $db->query("DELETE FROM sifa_admin_page WHERE sifa_admin_page_id = '$gelenİd'");
    if ($sayfa_sil) {
      unlink($delurl);
      $yanit = "<b style='color:green; font-weight:bold;'>Sayfa Başarıyla Silindi. !</b>";
    }
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("panel_sayfalar.php");}, 2000);
      </script>
    <?php
  }

?>
        <div class='main-panel'>
          <div class='content-wrapper'>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Panel Sayfaları</h4>
                    <p class="card-description"><?php echo $yanit; ?> </p>
                    <br>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Sayfa Adı </th>
                            <th> Sayfa URL </th>
                            <th> Sayfa İcon </th>
                            <th> İşlem </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($sayfa_cek as $sayfa_cek){
                            $counter++;
                           ?>
                          <tr>
                            <td> <?php echo $counter; ?> </td>
                            <td> <?php echo $sayfa_cek['sifa_admin_page_name'] ?> </td>
                            <td>  <?php echo $sayfa_cek['sifa_admin_page_url'] ?> </td>
                            <td> <?php echo $sayfa_cek['sifa_admin_page_icons'] ?> </td>
                            <td>

                                <button type="button" class="btn btn-outline-success editpage" data-toggle="modal" data-name="<?php echo $sayfa_cek['sifa_admin_page_name'] ?>" data-url="<?php echo $sayfa_cek['sifa_admin_page_url'] ?>" data-icon="<?php echo $sayfa_cek['sifa_admin_page_icons'] ?>" data-id="<?php echo $sayfa_cek["sifa_admin_page_id"] ?>" data-target="#exampleModal"> 
                                <i class="mdi mdi-table-edit"></i>Düzenle
                              </button>
                              <button class="btn btn-outline-danger deletepage" data-name="<?php echo $sayfa_cek['sifa_admin_page_name'] ?>" data-url="<?php echo $sayfa_cek['sifa_admin_page_url'] ?>" data-id="<?php echo $sayfa_cek["sifa_admin_page_id"] ?>"data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete-forever"></i> Sil
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
                          <h5 class="modal-title" id="exampleModalLabel"> Sayfa Bilgilerini Güncelle</h5>
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
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sayfa Adı</label>
                                    <div class="col-sm-9">
                                      <input id="name" type="text" class="form-control" name="updName"  placeholder="Sayfa Adı" required>
                                      <input id="namehidden" type="hidden" class="form-control" name="isimkontrol"  placeholder="Sayfa Adı" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sayfa URL</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="url" name="updUrl" placeholder="Sayfa URL" required>
                                      <input type="hidden" class="form-control" id="urlhidden" name="urlhidden" placeholder="Sayfa URL" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sayfa İcon</label>
                                    <div class="col-sm-9">
                                     <input type="text" id="icon" class="form-control" placeholder="Sayfa İcon" name="updİcon">
                                    </div>
                                  </div>
                                   <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sayfa Yetki</label>
                                    <div class="col-sm-9">
                                    <select name="pageyetki" class="form-control" required disabled style="background-color:#191c24;">
                                    <?php $yetki_cek = $db->query("SELECT * FROM sifa_yetkiler");?>

                                      <?php foreach ($yetki_cek as $yetki_cek) {?>
                                        <option value="<?php echo $yetki_cek['sifa_yetki_name']; ?>"><?php echo $yetki_cek['sifa_yetki_name']; ?></option>

                                    <?php } ?>
                                    </select>
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
                                                    <!-- Modal DELETE-->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4  style="text-transform:uppercase;" class="modal-title" id="myModalLabel"></h4>
                                      </div>
                                      <div class="modal-body" style="height:120px">
                                          <form class="form-control" method="POST" action="">
                                            <input type="hidden" id="delurl" name="delurl">
                                              <input type="hidden" id="socid" name="gelenİd">
                                              <p>
                                                Bu Sayfayı Silmek İstediğinize Emin Misiniz ?
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
        var name = $(this).attr("data-name");
        var url = $(this).attr("data-url");
        var icon = $(this).attr("data-icon");
        var id = $(this).attr("data-id");

        $("#name").val(name);
        $("#namehidden").val(name);
        $("#url").val(url);
        $("#urlhidden").val(url);
        $("#icon").val(icon);
        $("#value").val(id);
    })

    $('.deletepage').click(function (event) {
        var name = $(this).attr("data-name");
        var socid = $(this).attr("data-id");
        var url = $(this).attr("data-url");

        $("#myModalLabel").text(name);
        $("#socid").val(socid);
        $("#gelenName").val(name);
        $("#delurl").val(url);
    })

</script>
          <!-- content-wrapper ends -->
          <!-- Footer -->
      <?php include 'footer.php'; ?>