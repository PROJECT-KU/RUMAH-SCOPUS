<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?php echo base_url() . 'theme/images/logo/favicon-32x32.png' ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="color:#D2691E ;"><strong>Member Scopus</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/images/') . $user['foto'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="profile" class="d-block"><?= $user['nama'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            
            
            <?php
            $queryMenu = "SELECT * FROM tbl_menu_member";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php foreach ($menu as $m) : ?>
                    <li class="nav-item has-treeview">
                        <?php if ($title == $m['title']) : ?>
                            <a href="<?= base_url() . $m['url'] ?>" class="nav-link active">
                            <?php else : ?>
                                <a href="<?= base_url() . $m['url'] ?>" class="nav-link">
                                <?php endif; ?>
                                <i class="<?= base_url() . $m['icon'] ?>"></i>
                                <p>
                                    <?= $m['title'] ?>

                                </p>
                                </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

</aside>