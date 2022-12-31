<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="image/user/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <?php if ($this->session->userdata('level') == 'admin') { ?>
        <li><a href="app"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="konsumen"><i class="fa fa-user-plus"></i> <span>Data Konsumen</span></a></li>
        <li><a href="minat"><i class="fa fa-phone"></i> <span>Data Minat</span></a></li>
        <li><a href="penjualan"><i class="fa fa-shopping-cart"></i> <span>Data Penjualan</span></a></li>
        <li><a href="slider"><i class="fa fa-image"></i> <span>Data Slider</span></a></li>
        <li><a href="Series"><i class="fa fa-circle-o"></i> Series</a></li>
        <li><a href="Type"><i class="fa fa-circle-o"></i> Type</a></li>
        <li><a href="Warna"><i class="fa fa-circle-o"></i> Warna</a></li>
        <li><a href="Mobil"><i class="fa fa-circle-o"></i> Mobil</a></li>
        <li><a href="hubungi_kami"><i class="fa fa-envelope"></i> <span>Hubungi Kami</span></a></li>
        
      
        <li><a href="a_user"><i class="fa fa-users"></i> <span>Manajemen User</span></a></li>
        <li><a href="Laporan"><i class="fa fa-bar-chart"></i> <span>Laporan Penjualan</span></a></li>

        <?php } else {
          ?>
            <li><a href="app"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="konsumen"><i class="fa fa-user-plus"></i> <span>Data Konsumen</span></a></li>
        <li><a href="minat"><i class="fa fa-phone"></i> <span>Data Minat</span></a></li>
        <li><a href="penjualan"><i class="fa fa-shopping-cart"></i> <span>Data Penjualan</span></a></li>
        <li><a href="slider"><i class="fa fa-image"></i> <span>Data Slider</span></a></li>
        <li><a href="Series"><i class="fa fa-circle-o"></i> Series</a></li>
        <li><a href="Type"><i class="fa fa-circle-o"></i> Type</a></li>
        <li><a href="Warna"><i class="fa fa-circle-o"></i> Warna</a></li>
        <li><a href="Mobil"><i class="fa fa-circle-o"></i> Mobil</a></li>
        <li><a href="hubungi_kami"><i class="fa fa-envelope"></i> <span>Hubungi Kami</span></a></li>
        
      
        <li><a href="a_user"><i class="fa fa-users"></i> <span>Manajemen User</span></a></li>
        <li><a href="Laporan"><i class="fa fa-bar-chart"></i> <span>Laporan Penjualan</span></a></li>
          <?php
        } ?>
        <!-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Faqs</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Tentang Aplikasi</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>