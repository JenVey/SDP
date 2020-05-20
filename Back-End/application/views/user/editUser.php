<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form Edit User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">EditUser</a></li>
            <li class="breadcrumb-item active">EditUser</li>
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
            <h3 class="card-title">Edit User</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="<?= base_url(); ?>User/EditUser/edit/<?= $user['id_user'] ?> ">
            <div class="card-body">
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label>ID User</label>
                <input readonly type="text" class="form-control" name="idUser" placeholder="Enter Your Name" value="<?php echo $user['id_user']; ?>">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input readonly type="text" class="form-control" name="username" placeholder="Enter Your Name" value="<?php echo $user['username_user']; ?>">
              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="nameUser" placeholder="Enter Your Name" value="<?php echo $user['nama_user']; ?>">
              </div>
              <div class="form-group">
                <label>Email address</label>
                <input type="text" class="form-control" id="emailUser" name="emailUser" placeholder="Enter email" value="<?php echo $user['email_user']; ?>">
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" class="form-control" readonly name="jkUser" value="<?php echo $user['jenis_kelamin']; ?>">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="passUser" name="passUser" placeholder="Password" value="<?php echo $user['pass_user']; ?>">
              </div>
              <div class="form-group">
                <label>Trade Link</label>
                <input type="text" class="form-control" id="passUser" name="tradeUser" placeholder="Trade Link" value="<?php echo $user['trade_link']; ?>">
              </div>
              <div class="form-group">
                <label>Saldo</label>
                <input type="text" class="form-control" id="passUser" name="saldoUser" placeholder="Password" value="<?php echo $user['saldo']; ?>">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="statusUser">
                  <?php
                  if ($user['status'] == 1) {
                    echo '<option>Online</option>';
                    echo '<option>Offline</option>';
                  } else {
                    echo '<option>Offline</option>';
                    echo '<option>Online</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-left" style="margin-right:10px;">Edit</button>
              <a type="submit" href="<?= base_url(); ?>user/listuser" class="btn btn-danger float-right">Cancel</a>
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
  <!-- bs-custom-file-input -->
  <script src="<?php echo base_url(); ?>/asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>/asset/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>/asset/dist/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
  </script>
  </body>

  </html>