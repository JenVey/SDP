<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Subscription</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">ListSubscription</a></li>
              <li class="breadcrumb-item active">InsertSubscription</li>
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
                <h3 class="card-title">Insert Subscription</h3>
                </div>
            <!-- /.card-header -->
            <!-- form start --> 
                <form method="post" action="<?=base_url();?>Sub/InsertSub/insert">
                <div class="card-body">
                    <?php if(validation_errors()) : ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                      <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                    <label>Tipe Subscription</label>
                    <input type="text" class="form-control" name="tipeSub" placeholder="Enter Your Tipe Subscription">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="6" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group">
                    <label>Tanggal Awal - Tanggal Akhir</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" id="reservation" name="tglKadaluwarsa">
                    </div>
                    <!-- /.input group -->
                  </div>
                    <!-- /.input group -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-left" style="margin-right:10px;">Submit</button>
                    <a type="submit" href="<?=base_url();?>sub/listSub" class="btn btn-danger float-right">Cancel</a>
                </div>

                </form>
            </div>
        <!-- /.card -->
            </div>
    </div>
</section>

<!-- jQuery -->
<script src="<?php echo base_url();?>/asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>/asset/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url();?>/asset/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>/asset/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>/asset/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url();?>/asset/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>/asset/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>/asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();?>/asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/asset/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    $('#reservation').daterangepicker()
  })
</script>
</body>
</html>