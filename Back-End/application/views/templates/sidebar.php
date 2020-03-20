<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Gather.owl</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>asset/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ANONYMOUS</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?=base_url();?>User/ListUser" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                List User
              </p>
            </a>
        </li>
        </ul>   
      </nav>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?=base_url();?>Channel/ListChannel" class="nav-link">
              <i class="nav-icon fa fa-satellite-dish"></i>
              <p>
                List Channel
              </p>
            </a>
        </li>
        </ul>   
      </nav>


    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a  href="<?=base_url();?>Sub/ListSub"  class="nav-link">
              <i class="nav-icon fa fa-bookmark"></i>
              <p>
                List Subscription
              </p>
            </a>
        </li>
        </ul>   
      </nav>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a  href="<?=base_url();?>Team/ListTeam"  class="nav-link">
              <i class="nav-icon fa fa-user-friends"></i>
              <p>
                List Gaming Team
              </p>
            </a>
        </li>
        </ul>   
      </nav>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                List Pesan
              </p>
            </a>
        </li>
        </ul>   
      </nav>
    </div>
    <!-- /.sidebar -->
</aside>