<body class="hold-transition sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Subscription</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ListSubscription</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i>SUCCESS</h5>
          <?= $this->session->flashdata('flash'); ?>
        </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a type="button" href="<?= base_url(); ?>Sub/InsertSub/" class="btn btn-block btn-primary col-md-1 float-right">Insert Subscription</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID Sub</th>
                    <th>Nama Merchant</th>
                    <th>Tgl Akhir</th>
                    <th>Banner</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sub as $subs) : ?>
                    <tr>
                      <td> <?= $subs['id_sub'] ?> </td>
                      <td> <?php foreach ($merchant as $mch) {
                              if ($mch['id_merchant'] == $subs['id_merchant']) {
                                echo $mch['nama_merchant'];
                              }
                            } ?> </td>
                      <td> <?= $subs['tgl_akhir'] ?> </td>
                      <td> <img src="data:image/jpeg;base64,<?= base64_encode($subs['banner']) ?>" style="width: 150px;height: 150px;" alt="" /> </td>
                      <td>
                        <a href="<?= base_url(); ?>Sub/EditSub/index/<?= $subs['id_sub']; ?>" class="btn btn-info btn-sm">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                        </a>
                        <a href="<?= base_url(); ?>Sub/InsertSub/delete/<?= $subs['id_sub']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?'); ">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>/asset/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url(); ?>/asset/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>/asset/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>/asset/dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
</body>

</html>