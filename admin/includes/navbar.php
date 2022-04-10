<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <br>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
          <img src="img/logo2.png" alt="">
        </div>
      </a>
      <br>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="vendors-details.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Vendor's Details</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="customers-details.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Customer's Details</span></a>
      </li>


      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="total-order.php">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Total Orders</span></a>
      </li>

      

      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="contact-queries.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Contact Us Querie's</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item active">
        <a class="nav-link" href="gym-newslatter.php">
          <i class="fas fa-fw fa-question"></i>
          <span>Newslatter</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <!--<div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>-->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form method="post" action="search-order.php" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search by Order Id, Customer name, Email, Vendor Reg No, Gym Name..." name="order_id" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="order_search">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form method="post" action="search-order.php" class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search by Order Id, Customer name, Email, Vendor Reg No, Gym Name..." name="order_id" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit" name="order_search">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                      
                    </div>
                  </div>
                  <p>Search by Order Id, Customer name, Email, Vendor Reg No, Gym Name...</p>
                </form>

              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin_name ?></span>
                <img class="img-profile rounded-circle" src="./img/profile_picture/blog-4.jpg" alt="vendor profile picture">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->