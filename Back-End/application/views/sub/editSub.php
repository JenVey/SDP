<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form Edit Subscription</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">EditSubscription</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content ">
    <div class="container-fluid">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Subscription</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="editSub" method="post" action="<?= base_url(); ?>Sub/EditSub/edit/<?= $sub['id_sub'] ?>">
            <div class="card-body">
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label>ID Subscription</label>
                <input readonly type="text" class="form-control" name="idSub" placeholder="Enter Your Tipe Subscription" value="<?= $sub['id_sub']; ?>">
              </div>
              <div class="form-group">
                <label>Merchant</label>
                <input readonly type="text" class="form-control" name="tipeSub" placeholder="Enter Your Tipe Subscription" value=" <?php foreach ($merchant as $mch) {
                                                                                                                                      if ($mch['id_merchant'] == $sub['id_merchant']) {
                                                                                                                                        echo $mch['nama_merchant'];
                                                                                                                                      }
                                                                                                                                    } ?>">
              </div>
              <div class="form-group foto">
                <img src="data:image/jpeg;base64,<?= base64_encode($sub['banner']) ?>" style="width: 150px;height: 150px;" alt="" />
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Banner Picture</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" accept="image/x-png,image/jpg,image/jpeg" id="photoBanner">
                    <label class="custom-file-label" for="exampleInputFile">Choose Photo</label>
                  </div>
                </div>
              </div>
              <input type="hidden" name="photoBanner" id="fotoBanner">
              <div class="form-group">
                <label>Tanggal Akhir</label>
                <div class="input-group">
                  <input name="tglAkhir" class="form-control mr-sm-2 date" placeholder="Tanggal Akhir" type="date" value="<?= date('m/d/Y', strtotime($sub['tgl_akhir'])) ?>">
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-left" style="margin-right:10px;">Submit</button>
              <a type="submit" href="<?= base_url(); ?>sub/listSub" class="btn btn-danger float-right">Cancel</a>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>/asset/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url(); ?>/asset/plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="<?php echo base_url(); ?>/asset/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url(); ?>/asset/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>/asset/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- date-range-picker -->
  <script src="<?php echo base_url(); ?>/asset/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="<?php echo base_url(); ?>/asset/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>/asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="<?php echo base_url(); ?>/asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>/asset/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>/asset/dist/js/demo.js"></script>
  <!-- Page script -->
  <script>
    $(function() {
      $('#reservation').daterangepicker()
    });


    $("#photoBanner").change(function() {
      if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          var img = $('<img>').attr('src', e.target.result);
          img.attr("width", "100px");
          img.attr("height", "100px");
          $('.foto').html(img);
        };
        reader.readAsDataURL(this.files[0]);
      }
    });

    $('#editSub').submit(function() {
      foto = $(".foto").find('img').attr('src');

      if (foto.substring(11, 12) == "j") {
        foto = foto.substring(23, foto.length);
      } else {
        foto = foto.substring(22, foto.length);
      }
      $("#fotoBanner").val(foto);

      return true;
    });
  </script>
  </body>

  </html>