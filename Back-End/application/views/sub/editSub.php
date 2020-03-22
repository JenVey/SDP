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
            <form method="post" action="<?=base_url();?>Sub/EditSub/edit/">
                <div class="card-body">
                    <?php if(validation_errors()) : ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                      <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                    <label>ID Subscription</label>
                    <input readonly type="text" class="form-control" name="idSub" placeholder="Enter Your Tipe Subscription"  value="<?= $sub['id_sub']; ?>">
                    </div>
                    <div class="form-group">
                    <label>Tipe Subscription</label>
                    <input type="text" class="form-control" name="tipeSub" placeholder="Enter Your Tipe Subscription"  value="<?= $sub['tipe_sub']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="6" placeholder="Enter ..."> <?= $sub['keterangan']; ?></textarea>
                    </div>
                    <div class="form-group">
                    <label>Tanggal Kadaluwarsa</label>
                    <div class="input-group date" id="timepicker" data-target-input="nearest" >
                      <input type="text" class="form-control datetimepicker-input" name="tglKadaluwarsa" data-target="#timepicker"  value="<?= $sub['tgl_kadaluwarsa']; ?>">
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                    </div>
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
    //Timepicker
    $('#timepicker').datetimepicker({
        
    })

  })
</script>
</body>
</html>
