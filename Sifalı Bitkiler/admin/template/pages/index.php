<?php include "header.php"; ?>
<head>
    <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  </head>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><a href="hastaliklar.php" style="text-decoration:none;">Hastalıklar</a></h3>
                        </div>
                      </div>
                       <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-biohazard icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Hastalıkları Görmek İçin Tıklayın.</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><a href="hastalik_ekle.php" style="text-decoration:none;">Hastalık Ekle</a></h3>
                        </div>
                      </div>
                       <div class="col-3">
                        <div class="icon icon-box-danger ">
                          <span class="mdi mdi-bookmark-plus-outline icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Yeni Hastalık Eklemek İçin Tıklayınız.</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><a href="bitkiler.php" style="text-decoration:none;">Bitkiler</a></h3>
                        </div>
                      </div>
                       <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-flower icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Bitkileri Görmek İçin Tıklayınız.</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                          <h3 class="mb-0"><a href="bitki_ekle.php" style="text-decoration:none;">Bitki Ekle</a></h3>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger ">
                          <span class="mdi mdi-bookmark-plus-outline icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Yeni Bitki Eklemek İçin Tıklayınız.</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
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
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $mesaj_cek = $db->query("SELECT * FROM sifa_site_iletisim_form");
                           foreach ($mesaj_cek as $mesaj_cek) {
                            $counter++;
                            ?>
                          <tr>
                            <td><?php echo $counter; ?></td>
                            <td><?php echo $mesaj_cek['sifa_site_form_isim']; ?></td>
                            <td><?php echo $mesaj_cek['sifa_site_form_mail']; ?></td>
                            <td><textarea class="form-control" disabled style="background-color:#191C24;"><?php echo $mesaj_cek['sifa_site_form_mesaj']; ?></textarea></td>
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
          <!-- content-wrapper ends -->
<?php include "footer.php"; ?>