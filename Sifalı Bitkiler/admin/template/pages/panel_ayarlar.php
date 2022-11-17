<?php include 'header.php'; 
  
  $user_cek = $db->query("SELECT * FROM sifa_user");
  $aktif_profil = $db->query("SELECT * FROM sifa_user WHERE sifa_user_name = '$session_name'")->fetch(PDO::FETCH_ASSOC);

  $username = $_POST['username'];
  $userpass = $_POST['userpass'];
  $userpass2 = $_POST['userpass2'];
  $usergen = $_POST['usergen'];
  $userperm = $_POST['userperm'];
  $btnEkle = $_POST['btnEkle'];
  $btnDelete = $_POST['btnDelete'];
  $gelenİd = $_POST['gelenİd'];
  $btnUpdate = $_POST['btnUpdate'];
  $updName = $_POST['updName'];
  $foto = $_POST['foto'];
  $updyetki = $_POST['updyetki'];
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];
  $logoEkle = $_POST['logoEkle'];

  if (isset($btnEkle)) {
    $user_sor = $db->query("SELECT * FROM sifa_user WHERE sifa_user_name = '$username'");
    $say = $user_sor->fetchColumn();
    if($say > 0)
      $yanit = "<b style='color:red; font-weight:bold;'>Aynı İsimde Bir Kullanıcı Bulunuyor. !</b>";
    else{
      if($userpass != $userpass2)
        $yanit = "<b style='color:red; font-weight:bold;'>Girilen Şifreler Eşleşmiyor. !</b>";
      else{

        $gelenPasswd = $userpass;
        $string = $password;
        $encrypt_method = 'AES-256-CBC';
        $secret_key = '11*_33';
        $secret_iv = '22-=**_';
        $key = hash('sha256', $secret_key); 
        $iv = substr(hash('sha256', $secret_iv), 0, 16); 

        $sifrelendi = openssl_encrypt($gelenPasswd,$encrypt_method, $key, false, $iv);

        $user_ekle = $db->query("INSERT INTO sifa_user(sifa_user_profile, sifa_user_name, sifa_user_passwd, sifa_user_yetki) VALUES ('$usergen','$username','$sifrelendi','$userperm')");
        if($user_ekle)
          $yanit = "<b style='color:green; font-weight:bold;'>Kullanıcı Başarıyla Eklendi. !</b>";
        else
          $yanit = "<b style='color:red; font-weight:bold;'>Kullanıcı Eklenirken Bir Sorun Oluştu. !</b>";
      }
    }
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("panel_ayarlar.php");}, 1500);
      </script>
    <?php
  }

  if (isset($btnDelete)) {
    if ($gelenİd == '1')
      $yanit2 = "<b style='color:red; font-weight:bold;'>Admin Kullanıcı Silinemez. !</b>";
    else{
      $user_delete = $db->query("DELETE FROM sifa_user WHERE sifa_user_id = '$gelenİd'");
      if($user_delete)
        $yanit2 = "<b style='color:green; font-weight:bold;'>Kullanıcı Başarıyla Silindi. !</b>";
      else
        $yanit2 = "<b style='color:green; font-weight:bold;'>Kullanıcı Silinirken Bir Hata Oluştu. !</b>"; 
    }
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("panel_ayarlar.php");}, 1500);
      </script>
    <?php
  }

  if (isset($btnUpdate)) {
    if ($pass != $pass2)
      $yanit3 = "<b style='color:red; font-weight:bold;'>Kullanıcı Şifreleriniz Eşleşmiyor. !</b>";
    else{
        $gelenPasswd = $pass;
        $encrypt_method = 'AES-256-CBC';
        $secret_key = '11*_33';
        $secret_iv = '22-=**_';
        $key = hash('sha256', $secret_key); 
        $iv = substr(hash('sha256', $secret_iv), 0, 16); 

        $sifrelendi = openssl_encrypt($gelenPasswd,$encrypt_method, $key, false, $iv);
        $user_update = $db->query("UPDATE sifa_user SET sifa_user_profile='$foto', sifa_user_passwd='$sifrelendi' WHERE sifa_user_id = '$gelenİd'");
        if($user_update)
          $yanit3 = "<b style='color:green; font-weight:bold;'>Kullanıcı Bilgileriniz Başarıyla Güncellendi. !</b>";
        else
          $yanit3 = "<b style='color:red; font-weight:bold;'>Kullanıcı Bilgileriniz Güncellenirken Bir Hata Oluştu. !</b>";
    }
    ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("panel_ayarlar.php");}, 1500);
      </script>
    <?php
  }

  if (isset($logoEkle)) {

     if ($_FILES["newlogo"]) {

        $yol = "../assets/images/logo";
        
        $_FILES["newlogo"]["name"] = "logo.png";

        $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["newlogo"]["name"];

            if ($_FILES["newlogo"]["size"]  > 1000000) {

                $yanit3 = "<p style='color: red; font-weight:bold;'>Dosya Boyutu Sınırı Aşıldı !</p>";

            } else {

                $dosyaUzantisi = pathinfo($_FILES["newlogo"]["name"], PATHINFO_EXTENSION);

                if ($dosyaUzantisi != "jpg" && $dosyaUzantisi != "png") {

                    $yanit3 = "<p style='color:#e1a237; font-weight:bold;'>Sadece jpg ve png uzantılı dosyalar yüklenebilir ! </p>";

                } else {

                    $sonuc = move_uploaded_file($_FILES["newlogo"]["tmp_name"], $yuklemeYeri);

                    $yanit3 = $sonuc ? "<p style='color:green; font-weight:bold;'>Dosya başarıyla yüklendi !</p>" : "<p style='color: red; font-weight:bold;'>Hata oluştu !</p>";

                    $newlogo = "../assets/images/logo/logo.png";
            }

        }

      } else {

        $yanit3 = "Lütfen bir dosya seçin";

      }
      ?>
      <script type="text/javascript">
          setTimeout(function(){   
          window.location.assign("panel_ayarlar.php");}, 1500);
      </script>
    <?php
  }
?>
        <div class='main-panel'>
          <div class='content-wrapper'>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Profiliniz</h4>
                    <?php echo $yanit3."<br>"; ?>
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kullanıcı Adınız</th>
                          <th>Profil Resminiz</th>
                          <th>Yetkiniz</th>
                          <th>Şifreniz</th>
                          <th>İşlem</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

                        $encrypt_method = 'AES-256-CBC';
                        $secret_key = '11*_33';
                        $secret_iv = '22-=**_';
                        $key = hash('sha256', $secret_key); 
                        $iv = substr(hash('sha256', $secret_iv), 0, 16); 

                        $sifre_cozuldu = openssl_decrypt($aktif_profil['sifa_user_passwd'],$encrypt_method, $key, false, $iv); 
                      ?>

                        <tr>
                          <td>1</td>
                          <td><?php echo $aktif_profil['sifa_user_name']; ?></td>
                          <td><?php echo $aktif_profil['sifa_user_profile']; ?></td>
                          <td><?php echo $aktif_profil['sifa_user_yetki']; ?></td>
                          <td><?php echo "Maskelendi."; ?></td>
                          <td>
                            <button type="button" class="btn btn-outline-success editpage" data-toggle="modal" data-name="<?php echo $aktif_profil['sifa_user_name']; ?>" data-foto="<?php echo $aktif_profil['sifa_user_profile']; ?>" data-yetki="<?php echo $aktif_profil['sifa_user_yetki']; ?>" data-pass = "<?php echo $sifre_cozuldu; ?>" data-id="<?php echo $aktif_profil['sifa_user_id']; ?>" data-target="#exampleModal"> 
                                <i class="mdi mdi-table-edit"></i>Düzenle
                              </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <br><br>
                    <h4 class="card-title">Tüm Kullanıcılar</h4>
                    <?php echo $yanit2; ?>
                    <table class="table table-dark">
                       <thead>
                          <tr>
                            <th> # </th>
                            <th> Kullanıcı Adı </th>
                            <th> Kullanıcı Profil Resmi </th>
                            <th> Yetki </th>
                            <?php 
                              if ($user_check['sifa_user_yetki'] == "Admin"){
                             ?>
                            <th> İşlem </th>
                          <?php } ?>
                          </tr>
                        </thead>
                          <tbody>
                          <?php foreach ( $user_cek as $user_cek) {
                            $counter++;
                            ?>
                          <tr>
                            <td> <?php echo $counter; ?> </td>
                            <td> <?php echo $user_cek['sifa_user_name']; ?> </td>
                            <td> <?php echo $user_cek['sifa_user_profile']; ?> </td>
                            <td> <?php echo $user_cek['sifa_user_yetki']; ?> </td>
                            <?php 
                            if ($user_check['sifa_user_yetki'] == "Admin" && $user_cek['sifa_user_id'] != 1){
                             ?>
                            <td>
                              <button class="btn btn-outline-danger deletepage" data-name="<?php echo $user_cek['sifa_user_name']; ?>" data-id="<?php echo $user_cek['sifa_user_id']; ?>"data-toggle="modal" data-target="#myModal"><i class="mdi mdi-delete-forever"></i> Sil
                              </button>
                            </td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <?php if ($user_check['sifa_user_yetki'] == "Admin"){?>
                    <h4 class="card-title">Kullanıcı Ekleme</h4>
                    <p class="card-description"> <?php echo $yanit; ?> </p>
                    <form class="forms-sample" action="" method="post">
                      <div class="form-group">
                        <label for="exampleInputName1">Kullanıcı Adı</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Şifre</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Şifre" name="userpass">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Şifre Tekrar</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Şifre" name="userpass2">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Cinsiyet</label>
                        <select class="form-control" id="exampleSelectGender" name="usergen">
                          <option value="face15.jpg" selected>Erkek</option>
                          <option value="face8.jpg">Kadın</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Yetki</label>
                        <select class="form-control" id="exampleSelectGender" name="userperm">
                          <option value="Admin">Admin</option>
                          <option value="Herkes" selected>Kullanıcı</option>
                        </select>
                      </div>
                      <button type="submit" name="btnEkle" class="btn btn-success mr-2">Kullanıcı Oluştur</button>
                    </form>
                    <br><br><br>
                    <form  method="post"enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleSelectGender">Logo Değiştir</label>
                        <input type="file" name="newlogo" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" name="newlogo" disabled placeholder="Logo Yükleyin" required>
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Yükle</button>
                          </span>
                        </div><br>
                        <center><button type="submit" name="logoEkle" class="btn btn-success mr-2">Logoyu Yükle</button></center>
                      </div>
                    </form>
                    <?php } ?>
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
                          <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Bilgilerinizi Güncelleyin</h5>
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
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kullanıcı Adınız</label>
                                    <div class="col-sm-9">
                                      <input id="name" type="text" class="form-control" name="updName"  placeholder="Kullanıcı Adınız" required disabled style="background-color:#191C24;">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kullanıcı Resminiz</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" id="profil" name="foto">
                                        <option value="face1.jpg">Kadın-1</option>
                                        <option value="face2.jpg">Erkek-2</option>
                                        <option value="face3.jpg">Kadın-3</option>
                                        <option value="face4.jpg">Erkek-4</option>
                                        <option value="face5.jpg">Erkek-5</option>
                                        <option value="face6.jpg">Erkek-6</option>
                                        <option value="face7.jpg">Erkek-7</option>
                                        <option value="face8.jpg">Kadın-8</option>
                                        <option value="face9.jpg">Kadın-9</option>
                                        <option value="face10.jpg">Kadın-10</option>
                                        <option value="face11.jpg">Kadın-11</option>
                                        <option value="face12.jpg">Erkek-12</option>
                                        <option value="face13.jpg">Erkek-13</option>
                                        <option value="face14.jpg">Erkek-14</option>
                                        <option value="face15.jpg" selected>Erkek-15</option>
                                        <option value="face16.jpg">Erkek-16</option>
                                        <option value="face17.jpg">Erkek-17</option>
                                        <option value="face18.jpg">Erkek-18</option>
                                        <option value="face19.jpg">Erkek-19</option>
                                        <option value="face20.jpg">Kadın-20</option>
                                        <option value="face21.jpg">Erkek-21</option>
                                        <option value="face22.jpg">Erkek-22</option>
                                        <option value="face23.jpg">Kadın-23</option>
                                        <option value="face24.jpg">Erkek-24</option>
                                        <option value="face25.jpg">Erkek-25</option>
                                        <option value="face26.jpg">Kadın-26</option>
                                        <option value="face27.jpg">Erkek-27</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kullanıcı Yetkiniz</label>
                                    <div class="col-sm-9">
                                     <input type="text" id="yetki" class="form-control" placeholder="Kullanıcı Yetkiniz" name="updyetki" disabled style="background-color:#191C24;">
                                    </div>
                                  </div>
                                   <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kullanıcı Şifreniz</label>
                                    <div class="col-sm-9">
                                     <input type="text" id="pass" class="form-control" placeholder="Kullanıcı Şifreniz" name="pass" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kullanıcı Şifreniz Tekrar</label>
                                    <div class="col-sm-9">
                                     <input type="text" id="pass2" class="form-control" placeholder="Kullanıcı Şifreniz Tekrar" name="pass2" required>
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
                                            <input type="hidden" id="socid" name="gelenİd">
                                            <p>
                                              Bu Kullanıcıyı Silmek İstediğinize Emin Misiniz ?
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
        var foto = $(this).attr("data-foto");
        var yetki = $(this).attr("data-yetki");
        var pass = $(this).attr("data-pass");
        var id = $(this).attr("data-id");

        $("#name").val(name);
        $("#profil").val(foto);
        $("#yetki").val(yetki);
        $("#pass").val(pass);
        $("#pass2").val(pass);
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
      <?php include 'footer.php'; ?>