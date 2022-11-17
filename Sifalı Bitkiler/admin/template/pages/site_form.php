<?php include 'header.php'; 
  $mesaj_cek = $db->query("SELECT * FROM sifa_site_iletisim_form");

  $btnDelete = $_POST['btnDelete'];
  $gelenİd = $_POST['gelenİd'];
  $btnAll = $_POST['btnAll'];

  $button_ekle = "<form method='post'><button type='submit' data-toggle='modal' data-target='#addslider' class='nav-link btn btn-danger create-new-button' name='btnAll' >Tüm Mesajları Sil</button></form>";

  if (isset($btnDelete)) {
    $görüs_sil = $db->query("DELETE FROM sifa_site_iletisim_form WHERE sifa_site_form_id = '$gelenİd'");
    if($görüs_sil)
      $yanit = "<b style='color:green; font-weight: bold;'>Ziyaretçi Görüşü Başarıyla Silindi. !</b>";
    else
      $yanit = "<b style='color:red;font-weight: bold;'>Ziyaretçi Görüşü Silinirken Bir Hata Oluştu. !</b>";
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_form.php");}, 2000);
      </script>
    <?php
  }

  if (isset($btnAll)) {
    $görüs_sil = $db->query("DELETE FROM sifa_site_iletisim_form");
    if($görüs_sil)
      $yanit = "<b style='color:green; font-weight: bold;'>Ziyaretçi Görüşleri Başarıyla Silindi. !</b>";
    else
      $yanit = "<b style='color:red;font-weight: bold;'>Ziyaretçi Görüşleri Silinirken Bir Hata Oluştu. !</b>";
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_form.php");}, 2000);
      </script>
    <?php
  }
?>

        <div class='main-panel'>
          <div class='content-wrapper'>
          
            <div class="col-lg grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ziyaretçi Görüşleri</h4>
                    <?php echo $yanit; ?>
                    <p class="card-description"><?php echo $button_ekle; ?></p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th> Ziyaretçi Adı </th>
                            <th> Ziyaretçi Mail </th>
                            <th> Ziyaretçi Mesajı </th>
                            <th> İşlem </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($mesaj_cek as $mesaj_cek) {
                            $counter++;
                            ?>
                          <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $mesaj_cek['sifa_site_form_isim']; ?></td>
                            <td><?php echo $mesaj_cek['sifa_site_form_mail']; ?></td>
                            <td><textarea class="form-control" disabled style="background-color:#191C24;"><?php echo $mesaj_cek['sifa_site_form_mesaj']; ?></textarea></td>
                            <td>
                              <button class="btn btn-outline-danger deletepage" data-name="<?php echo $mesaj_cek['sifa_site_form_isim']; ?>" data-id="<?php echo $mesaj_cek['sifa_site_form_id']; ?>"data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete-forever"></i> Sil
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
                                                Bu Ziyaretçi Görüşünü Silmek İstediğinize Emin Misiniz ?
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
          </div>
        </div>

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

        $("#myModalLabel").text(name +" Kişisinden Gelen Mesaj");
        $("#socid").val(socid);
        $("#gelenName").val(name);
    })

</script>
          <!-- content-wrapper ends -->
          <!-- Footer -->
<?php include 'footer.php'; ?>