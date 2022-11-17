<?php include 'header.php'; 
  $sayfa_cek = $db->query("SELECT * FROM sifa_site_navbar");

  $btnDelete = $_POST['btnDelete'];
  $btnUpdate = $_POST['btnUpdate'];
  $btnEkle = $_POST['btnEkle'];
  $addname = $_POST['addname'];
  $addurl = $_POST['addurl'];
  $addclass = $_POST['addclass'];
  $gelenİd = $_POST['gelenİd'];
  $updName = $_POST['updName'];
  $updUrl = $_POST['updUrl'];
  $updİcon = $_POST['updİcon'];
  $isimkontrol = $_POST['isimkontrol'];
  $urlhidden = $_POST['urlhidden'];
  $pageyetki = $_POST['pageyetki'];
  $delname = $_POST['delname'];

  $button_ekle = "<button type='submit' data-toggle='modal' data-target='#addslider' class='nav-link btn btn-success create-new-button' name='btnekle' >+ Navbar Yeni Link Ekle</button>";

  if (isset($btnUpdate)) {

    if ($isimkontrol == $updName || $urlhidden == $updUrl) {
        
        $page_update = $db->query("UPDATE sifa_site_navbar SET sifa_site_navbar_name='$updName',sifa_site_navbar_link='$updUrl',sifa_site_navbar_class='$updİcon' WHERE sifa_site_navbar_id = '$gelenİd'");
          if ($page_update)
            $yanit = "<b style='color:green;'>Navbar Link Bilgileri Başarıyla Güncellendi. !</b><br><br>";
          else
            $yanit = "<b style='color:red;'>Navbar Link Bilgileri Güncellenirken Hata Oluştu. !</b><br><br>";
    }
    else{

      $sayfa_sor = $db->query("SELECT * FROM sifa_site_navbar WHERE sifa_site_navbar_link = '$updUrl' || sifa_site_navbar_name = '$updName'");
      $say = $sayfa_sor->fetchColumn();

      if ($say > 0)
         $yanit = "<b style='color: red; font-weight:bold;'>Aynı İsimde veya Url Sahip Bir Navbar Link Bulunuyor !</b><br><br>";

       else{

        $page_update = $db->query("UPDATE sifa_site_navbar SET sifa_site_navbar_name='$updName',sifa_site_navbar_link='$updUrl',sifa_site_navbar_class='$updİcon' WHERE sifa_site_navbar_id = '$gelenİd'");
          if ($page_update)
            $yanit = "<b style='color:green;'>Navbar Link Bilgileri Başarıyla Güncellendi. !</b><br><br>";
          else
            $yanit = "<b style='color:red;'>Navbar Link Bilgileri Güncellenirken Hata Oluştu. !</b><br><br>";
        }
    }
        ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_navbar.php");}, 2000);
      </script>
    <?php
  }

  if (isset($btnDelete)) {
    $yanit = $gelenİd;
    if ($gelenİd != '5' && $gelenİd != '3' && $gelenİd != '2' && $gelenİd != '1')
    {
      $sayfa_sil = $db->query("DELETE FROM sifa_site_navbar WHERE sifa_site_navbar_id = '$gelenİd'");
      if ($sayfa_sil) {
      unlink("../../../$delname");
      $yanit = "<b style='color:green; font-weight:bold;'>Navbar Link Başarıyla Silindi. !</b><br><br>";
      }
    }
    else
      $yanit = "<b style='color:red; font-weight:bold;'>Admin Sayfa Linki Silinemez. !</b><br><br>";
    
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_navbar.php");}, 2000);
      </script>
    <?php
  }

  if (isset($btnEkle)) {

    $link_sor = $db->query("SELECT * FROM sifa_site_navbar WHERE sifa_site_navbar_name = '$addname'");
    $say = $link_sor->fetchColumn();
    if ($say > 0)
      $yanit = "<b style='color:red; font-weight:bold;'>Aynı İsimde Bir Navbar Link Bulunuyor. !</b><br><br>";
    else{
      $yeni = explode(".php", $addurl);
      $link_ekle = $db->query("INSERT INTO sifa_site_navbar(sifa_site_navbar_name, sifa_site_navbar_link, sifa_site_navbar_class) VALUES ('$addname','$yeni[0].php','$addclass')");
      if($link_ekle){
        $dosya = fopen("../../../$yeni[0].php", 'w+');
        $topla_icerik = "<?php include 'header.php'; ?>
        <?php include 'footer.php'; ?>";
        fwrite($dosya, $topla_icerik);
        fclose($dosya);
        $yanit = "<b style='color:green; font-weight:bold;'>Navbar Link Başarıyla Eklendi. !</b><br><br>";
      }
      else
        $yanit = "<b style='color:red; font-weight:bold;'>Navbar Link Eklenirken Bir Hata Oluştu. !</b><br><br>";
    }
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("site_navbar.php");}, 2000);
      </script>
    <?php
  }

?>
        <div class='main-panel'>
          <div class='content-wrapper'>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Site Navbar Link</h4>
                    <?php echo $yanit; ?>
                    <p class="card-description"><?php echo $button_ekle; ?></p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Navbar Link Adı </th>
                            <th> Navbar Link URL </th>
                            <th> Navbar Link Class </th>
                            <th> İşlem </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($sayfa_cek as $sayfa_cek){
                            $counter++;
                           ?>
                          <tr>
                            <td> <?php echo $counter; ?> </td>
                            <td> <?php echo $sayfa_cek['sifa_site_navbar_name'] ?> </td>
                            <td>  <?php echo $sayfa_cek['sifa_site_navbar_link'] ?> </td>
                            <td> <?php echo $sayfa_cek['sifa_site_navbar_class'] ?> </td>
                            <td>

                                <button type="button" class="btn btn-outline-success editpage" data-toggle="modal" data-name="<?php echo $sayfa_cek['sifa_site_navbar_name'] ?>" data-url="<?php echo $sayfa_cek['sifa_site_navbar_link'] ?>" data-class="<?php echo $sayfa_cek['sifa_site_navbar_class'] ?>" data-id="<?php echo $sayfa_cek['sifa_site_navbar_id'] ?>" data-target="#exampleModal"> 
                                <i class="mdi mdi-table-edit"></i>Düzenle
                              </button>
                              <button class="btn btn-outline-danger deletepage" data-name="<?php echo $sayfa_cek['sifa_site_navbar_name'] ?>" data-url="<?php echo $sayfa_cek['sifa_site_navbar_link'] ?>" data-id="<?php echo $sayfa_cek['sifa_site_navbar_id'] ?>"data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete-forever"></i> Sil
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
                                  <!-- Modal Add-->
                  <div class="modal fade" id="addslider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> Site Navbar Link Ekle</h5>
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
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Navbar Link Adı</label>
                                    <div class="col-sm-9">
                                      <input id="name" type="text" class="form-control" name="addname"  placeholder="Navbar Link Adı" required>
                                      <input id="namehidden" type="hidden" class="form-control" name="isimkontrol"  placeholder="Navbar Link Adı" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Navbar Link URL</label>
                                    <div class="col-sm-9">
                                      <textarea class="form-control" id="url" name="addurl" placeholder="Navbar Link URL" required></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Navbar Link Class</label>
                                    <div class="col-sm-9">
                                     <input type="text" id="class" class="form-control" placeholder="Navbar Link Class" name="addclass">
                                    </div>
                                  </div>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-outline-primary" name="btnEkle" id="btnUpdateSubmit">Yeni Link Ekle</button>
                                </form>
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
                          <h5 class="modal-title" id="exampleModalLabel">Site Navbar Link Güncelle</h5>
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
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Navbar Link Adı</label>
                                    <div class="col-sm-9">
                                      <input id="navbarname" type="text" class="form-control" name="updName"  placeholder="Navbar Link Adı" required>
                                      <input id="namehidden2" type="hidden" class="form-control" name="isimkontrol"  placeholder="Navbar Link Adı" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Navbar Link URL</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="navbarurl" name="updUrl" placeholder="Navbar Link URL" required>
                                      <input type="hidden" class="form-control" id="urlhidden" name="urlhidden" placeholder="Navbar Link URL" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Navbar Link Class</label>
                                    <div class="col-sm-9">
                                     <input type="text" id="navbarclass" class="form-control" placeholder="Navbar Link Class" name="updİcon">
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
                                            <input type="hidden" id="delname" name="delname">
                                              <input type="hidden" id="socid" name="gelenİd">
                                              <p>
                                                Bu Navbar Link Silmek İstediğinize Emin Misiniz ?
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
        var navbarname = $(this).attr("data-name");
        var navbarurl = $(this).attr("data-url");
        var navbarclass = $(this).attr("data-class");
        var id = $(this).attr("data-id");
        var clas = document.getElementById("navbarclass");

        $("#navbarname").val(navbarname);
        $("#namehidden2").val(navbarname);
        $("#navbarurl").val(navbarurl);
        $("#urlhidden").val(navbarurl);
        $("#navbarclass").val(navbarclass);
        $("#value").val(id);
    })

    $('.deletepage').click(function (event) {
        var name = $(this).attr("data-name");
        var socid = $(this).attr("data-id");
        var navbarurl = $(this).attr("data-url");

        $("#myModalLabel").text(name);
        $("#socid").val(socid);
        $("#delname").val(navbarurl);

    })

</script>
          <!-- content-wrapper ends -->
          <!-- Footer -->
      <?php include 'footer.php'; ?>