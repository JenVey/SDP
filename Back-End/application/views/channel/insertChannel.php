<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Form Insert Channel</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">ListChannel</a></li>
            <li class="breadcrumb-item active">InsertChannel</li>
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
            <h3 class="card-title">Insert Channel</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="insertChannel" method="post" action="<?= base_url(); ?>Channel/InsertChannel/insert">
            <div class="card-body">
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label>Channel Name</label>
                <input type="text" class="form-control" name="nameChannel" placeholder="Enter Your Channel Name">
              </div>
              <div class="form-group foto">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Channel Picture</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" accept="image/x-png,image/jpg,image/jpeg" id="photoChannel">
                    <label class="custom-file-label" for="exampleInputFile">Choose Photo</label>
                  </div>
                </div>
              </div>
              <input type="hidden" name="photoChannel" id="fotoChannel">
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary float-left" style="margin-right:10px;">Submit</button>
              <a type="submit" href="<?= base_url(); ?>Channel/ListChannel" class="btn btn-danger float-right">Cancel</a>
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

    $("#photoChannel").change(function() {
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

    $('#insertChannel').submit(function() {
      foto = $(".foto").find('img').attr('src');

      if (foto.substring(11, 12) == "j") {
        foto = foto.substring(23, foto.length);
      } else {
        foto = foto.substring(22, foto.length);
      }
      $("#fotoChannel").val(foto);

      return true;
    });
  </script>
  </body>

  </html>