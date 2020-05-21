<body class="hold-transition sidebar-mini">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">ListTransaksi</li>
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
                        <!-- <div class="card-header">
                            <a type="button" href="<?= base_url(); ?>Team/InsertTeam/" class="btn btn-block btn-primary col-md-1 float-right">Insert Team</a>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Nama Item</th>
                                        <th>Subtotal</th>
                                        <th>Nama User</th>
                                        <th>Foto Bukti</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ctr = 1;
                                    foreach ($transaksiItem as $transItem) :
                                        if ($transItem['status'] == 1 || $transItem['status'] == 2 || $transItem['status'] == -1 || $transItem['status'] == -2) { ?>
                                            <tr>
                                                <td> <?= $transItem['id_transaksi'] ?> </td>
                                                <td> <?php foreach ($item as $itm) {
                                                            if ($transItem['id_item'] == $itm['id_item']) {
                                                                foreach ($merchant as $mch) {
                                                                    if ($itm['id_merchant'] == $mch['id_merchant']) {
                                                                        echo $itm['nama_item'] . "<b> (" . $mch['nama_merchant'] . ") </b> / " . $transItem['jumlah'] . "x";
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?> </td>
                                                <td>IDR <?= number_format(ceil($transItem['subtotal']), 0, ".", ".")  ?> </td>
                                                <td> <?php
                                                        foreach ($transaksi as $trans) {
                                                            if ($transItem['id_transaksi'] == $trans['id_transaksi']) {
                                                                foreach ($user as $usr) {
                                                                    if ($usr['id_user'] == $trans['id_user']) {
                                                                        echo $usr['nama_user'];
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?></td>
                                                <td> <img id="bukti<?= $ctr ?>" src="data:image/jpeg;base64,<?= base64_encode($transItem['foto']) ?>" style="width: 150px;height: 150px;" alt="" /> </td>
                                                <td> <?php if ($transItem['status'] == 1) {
                                                            echo "<span class='badge bg-warning'>Pending</span>";
                                                        } else if ($transItem['status'] == 2) {
                                                            echo "<span class='badge bg-success'>Approve</span>";
                                                        } else {
                                                            echo "<span class='badge bg-danger'>Cancel</span>";
                                                        }
                                                        ?> </td>
                                                <td>
                                                    <?php if ($transItem['status'] == 1) { ?>
                                                        <a class=" btn btn-success btn-sm approve" idTrans="<?= $transItem['id_transaksi'] ?>" idItem="<?= $transItem['id_item'] ?>" harga="<?= $transItem['subtotal'] ?>" jumlah="<?= $transItem['jumlah'] ?>">
                                                            <i class="fas fa-check">
                                                            </i>
                                                            Approve
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-sm cancel" idTrans="<?= $transItem['id_transaksi'] ?>" idItem="<?= $transItem['id_item'] ?>" harga="<?= $transItem['subtotal'] ?>" jumlah="<?= $transItem['jumlah'] ?>" onclick="return confirm('Yakin?'); ">
                                                            <i class="fas fa-times">
                                                            </i>
                                                            Cancel
                                                        </a>
                                                        <a class="btn btn-primary btn-sm download " id="<?= $ctr ?>" download>
                                                            <i class=" fas fa-download">
                                                            </i>
                                                            View foto
                                                        </a>
                                                    <?php } else if ($transItem['status'] == 2) { ?>
                                                        <a class="btn btn-primary btn-sm" id="download<?= $ctr ?>" download>
                                                            <i class=" fas fa-download">
                                                            </i>
                                                            View foto
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                    <?php $ctr++;
                                        }
                                    endforeach; ?>
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

    <script src="<?php echo base_url(); ?>/asset/dist/js/FileSaver.js"></script>
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

        $(document).ready(function() {

        });

        $(".download").click(function() {
            var canvas = $("#bukti" + $(this).attr("id")).attr("src");
            alert(canvas);
            canvas.toBlob(function(blob) {
                saveAs(blob, "bukti.png");
            });

            //FileSaver.saveAs(canvas, "bukti.png");
        });

        $(".approve").click(function() {
            idTransksi = $(this).attr("idTrans");
            idItem = $(this).attr("idItem");
            harga = $(this).attr("harga");
            jumlah = $(this).attr("jumlah");
            $.ajax({
                url: "<?= base_url(); ?>Transaksi/changeStatus/2",
                method: "post",
                data: {
                    id_transaksi: idTransksi,
                    id_item: idItem,
                    jumlah: jumlah,
                    harga: harga
                },
                success: function(result) {
                    window.location.href = '<?= base_url(); ?>Transaksi';
                }
            });
        });

        $(".cancel").click(function() {
            idTransksi = $(this).attr("idTrans");
            idItem = $(this).attr("idItem");
            harga = $(this).attr("harga");
            jumlah = $(this).attr("jumlah");
            $.ajax({
                url: "<?= base_url(); ?>Transaksi/changeStatus/-2",
                method: "post",
                data: {
                    id_transaksi: idTransksi,
                    id_item: idItem,
                    jumlah: jumlah,
                    harga: harga
                },
                success: function(result) {
                    window.location.href = '<?= base_url(); ?>Transaksi';
                }
            });
        });
    </script>

</body>

</html>