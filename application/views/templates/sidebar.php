<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">codeigniter</div>
      </a>
        <hr class="sidebar-divider">

      <!-- query menu -->
      <?php 

      $role_id = $this->session->userdata('role_id');

      $querymenu = "SELECT `user_menu`.`id`, `menu` FROM `user_menu` JOIN `User_access_menu` on `user_menu`.`id` = `user_access_menu`.`menu_id` WHERE `User_access_menu`.`role_id` = $role_id

      ORDER BY `User_access_menu`.`menu_id` asc";

      $menu = $this->db->query($querymenu)->result_array();

       ?>

       <!-- looping menu -->

       <?php foreach ($menu as $m) : ?>

      

        <div class="sidebar-heading">
        <?= $m['menu']; ?>
      </div>

      <?php 

      $menuid = $m['id'];

      $querysubmenu = "SELECT * from `user_sub_menu` join `user_menu` on `user_sub_menu`.`menu_id` = `user_menu`.`id` where  `user_sub_menu`.`menu_id` = $menuid and  `user_sub_menu`.`is_active` = 1 ";

      $subMenu = $this->db->query($querysubmenu)->result_array();

       ?>

       <?php foreach($subMenu as $sm) : ?>

         <?php if($title == $sm['title']) : ?>
          <li class="nav-item active">
            <?php else : ?>
              <li class="nav-item">
            <?php endif; ?>
        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
          <i class="<?= $sm['icon']; ?>"></i>
          <span><?= $sm['title']; ?></span></a>
      </li>


       <?php endforeach; ?>
         <hr class="sidebar-divider">
    <?php endforeach; ?>
       <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->