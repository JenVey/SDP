<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Pesan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">ListPesan</a></li>
              <li class="breadcrumb-item active">EditPesan</li>
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
                <h3 class="card-title">Edit Pesan</h3>
                </div>
            <!-- /.card-header -->
            <!-- form start --> 
                <form method="post" action="<?=base_url();?>Pesan/EditPesan/edit/<?= $pesan['id_pesan'] ?>">
                <div class="card-body">
                    <?php if(validation_errors()) : ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                      <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                    <label>ID Pesan</label>
                    <input type="text" class="form-control" readonly name="idPesan" placeholder="Enter Your Team Name" value="<?= $pesan['id_pesan']; ?>">
                    </div>
                    <div class="form-group">
                    <label>ID Pengirim</label>
                        <select class="form-control" name="idPengirim">
                                    <option value="<?= $pesan['id_pengirim']?>"> <?= $pesan['id_pengirim']  ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label>ID Penerima</label>
                        <select class="form-control" name="idPenerima">
                                <option value="<?= $pesan['id_penerima']?>"> <?= $pesan['id_penerima']  ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tipe Penerima</label>
                        <input type="text" class="form-control" readonly name="tipePenerima"  value="<?= $pesan['tipe_penerima']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea class="form-control" name="isiPesan" rows="7" placeholder="Enter ..."><?= $pesan['pesan']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pesan</label>
                        <input type="text" class="form-control" readonly name="tglPesan"  value="<?= $pesan['tanggal']; ?>">
                    </div>
                    <div class="form-group">
                    <label>Status Pesan</label>
                        <select class="form-control" name ="statusPesan">
                              <?php
                                if($pesan['status'] == 0) {
                                  echo '<option>Delivered</option>';
                                  echo '<option>Read</option>';
                                  echo '<option>Deleted</option>';
                                }else if($pesan['status'] == 1){
                                  echo '<option>Read</option>';
                                  echo '<option>Delivered</option>';
                                  echo '<option>Deleted</option>';
                                }else{
                                  echo '<option>Deleted</option>';
                                  echo '<option>Read</option>';
                                  echo '<option>Delivered</option>';
                                }
                              ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-left" style="margin-right:10px;">Submit</button>
                    <a type="submit" href="<?=base_url();?>team/listTeam" class="btn btn-danger float-right">Cancel</a>
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
<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>/asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/asset/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
