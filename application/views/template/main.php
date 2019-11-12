<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/logouin.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Pusat Penelitian dan Penerbitan LPPM UIN Suska Riau</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?= base_url(); ?>assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?= base_url(); ?>assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker-standalone.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js">
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="green" data-background-color="black" data-image="<?= base_url(); ?>assets/img/sidebar.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    <img src="<?= base_url() ?>/assets/img/logouin.png" style=width:30px>
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    PUSLITAN
                </a>
            </div>
            <div class="sidebar-wrapper">
                <?php
                $session = $this->session->userdata('nip');
                if (!empty($session)) : ?>
                    <?php if ($this->session->userdata('nip') == 'Administrator') : ?>
                        <div class="user">
                            <div class="photo">
                                <img src="<?= base_url(); ?>assets/img/faces/avatar.jpg" />
                            </div>
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                                    <span>
                                        <?= $this->session->userdata('nip'); ?>
                                        <b class="caret"></b>
                                    </span>
                                </a>
                                <div class="clearfix"></div>
                                <div class="collapse" id="collapseExample">
                                    <ul class="nav">
                                        <li>
                                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                                <span class="sidebar-mini">L</span>
                                                <span class="sidebar-normal">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="user">
                            <div class="photo">
                                <img src="<?= base_url(); ?>assets/img/faces/avatar.jpg" />
                            </div>
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                                    <span>
                                        <?php
                                                $session = $this->session->userdata('nip');
                                                $nama = "SELECT * FROM `DOSEN`
                                                    WHERE `nip` = $session";
                                                $result = $this->db->query($nama)->result_array();
                                                foreach ($result as $r) {
                                                    $nama2 = $r['nama'];
                                                } ?>
                                        <?= $nama2 ?>
                                        <b class="caret"></b>
                                    </span>
                                </a>
                                <div class="clearfix"></div>
                                <div class="collapse" id="collapseExample">
                                    <ul class="nav">
                                        <li>
                                            <a href="<?= base_url('Profile') ?>">
                                                <span class="sidebar-mini">MP</span>
                                                <span class="sidebar-normal">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                                <span class="sidebar-mini">L</span>
                                                <span class="sidebar-normal">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <ul class="nav">
                        <?php
                            //join tabel user menu dengan user access menu
                            $level = $this->session->userdata('level');
                            if ($level == '') {
                                $level = 2;
                            }
                            $query = "SELECT `user_menu`.`id`, `title`,`url`, `icon`
                                    FROM `user_menu` JOIN `user_access_menu`
                                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                    WHERE `user_access_menu`.`level` = $level
                                    ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
                            $menu = $this->db->query($query)->result_array();
                            ?>

                        <?php foreach ($menu as $m) : ?>

                            <?php
                                    $menuid = $m['id'];
                                    $querysub = " SELECT * FROM `user_sub_menu`
                                            WHERE `menu_id` = $menuid
                                            AND `is_active` = 1
                            ";
                                    $submenu = $this->db->query($querysub)->result_array();
                                    if (count($submenu) > 0) {
                                        ?>
                                <?php if ($m['title'] == $title) : ?>
                                    <li class="active">
                                    <?php else : ?>
                                    <li>
                                    <?php endif; ?>
                                    <a data-toggle="collapse" href="#<?= $m['url']  ?>">
                                        <i class="material-icons"><?= $m['icon'] ?></i>
                                        <p><?= $m['title'] ?>
                                            <b class="caret"></b>
                                        </p>
                                    </a>
                                    <div class="collapse" id="<?= $m['url'] ?>">
                                        <ul class="nav">
                                            <?php foreach ($submenu as $sm) : ?>
                                                <?php if ($sm['sub_title'] == $subtitle) : ?>
                                                    <li class="active">
                                                    <?php else : ?>
                                                    <li>
                                                    <?php endif; ?>
                                                    <a href="<?= base_url($sm['url'])  ?>">
                                                        <span class="sidebar-mini"><?= $sm['icon'] ?></span>
                                                        <span class="sidebar-normal"><?= $sm['sub_title'] ?></span>
                                                    </a>
                                                    </li>
                                                <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    </li>
                                <?php
                                        } else {
                                            ?>
                                    <?php if ($m['title'] == $title) : ?>
                                        <li class="active">
                                        <?php else : ?>
                                        <li>
                                        <?php endif; ?>
                                        <a href="<?= base_url($m['url'])  ?>">
                                            <i class="material-icons"><?= $m['icon'] ?></i>
                                            <p><?= $m['title'] ?></p>
                                        </a>
                                        </li>
                                    <?php
                                            }
                                            ?>

                                <?php endforeach; ?>
                    </ul>

                <?php else : ?>
                    <ul class="nav">
                        <?php
                            //join tabel user menu dengan user access menu
                            $level = $this->session->userdata('level');
                            if ($level == '') {
                                $level = 2;
                            }
                            $query = "SELECT `user_menu`.`id`, `title`,`url`, `icon`
                                    FROM `user_menu` JOIN `user_access_menu`
                                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                    WHERE `user_access_menu`.`level` = $level
                                    ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
                            $menu = $this->db->query($query)->result_array();
                            ?>

                        <?php foreach ($menu as $m) : ?>

                            <?php
                                    $menuid = $m['id'];
                                    $querysub = " SELECT * FROM `user_sub_menu`
                                            WHERE `menu_id` = $menuid
                                            AND `is_active` = 1
                            ";
                                    $submenu = $this->db->query($querysub)->result_array();
                                    if (count($submenu) > 0) {
                                        ?>
                                <?php if ($m['title'] == $title) : ?>
                                    <li class="active">
                                    <?php else : ?>
                                    <li>
                                    <?php endif; ?>
                                    <a data-toggle="collapse" href="#<?= $m['url']  ?>">
                                        <i class="material-icons"><?= $m['icon'] ?></i>
                                        <p><?= $m['title'] ?>
                                            <b class="caret"></b>
                                        </p>
                                    </a>
                                    <div class="collapse" id="<?= $m['url'] ?>">
                                        <ul class="nav">
                                            <?php foreach ($submenu as $sm) : ?>
                                                <?php if ($sm['sub_title'] == $subtitle) : ?>
                                                    <li class="active">
                                                    <?php else : ?>
                                                    <li>
                                                    <?php endif; ?>
                                                    <a href="<?= base_url($sm['url'])  ?>">
                                                        <span class="sidebar-mini"><?= $sm['icon'] ?></span>
                                                        <span class="sidebar-normal"><?= $sm['sub_title'] ?></span>
                                                    </a>
                                                    </li>
                                                <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    </li>
                                <?php
                                        } else {
                                            ?>
                                    <?php if ($m['title'] == $title) : ?>
                                        <li class="active">
                                        <?php else : ?>
                                        <li>
                                        <?php endif; ?>
                                        <a href="<?= base_url($m['url'])  ?>">
                                            <i class="material-icons"><?= $m['icon'] ?></i>
                                            <p><?= $m['title'] ?></p>
                                        </a>
                                        </li>

                                    <?php
                                            }
                                            ?>

                                <?php endforeach; ?>
                                <li>
                                    <a></a>
                                    <i class="material-icons">folder</i>
                                    <p>Login</p>
                                </li>
                    </ul>

                <?php endif; ?>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <p class="navbar-brand" href="#"> Pusat Penelitian dan Penerbitan </p>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                    <br>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <?= $contents ?>
                </div>
            </div>
            <footer class="footer">

                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="#">LPPM UIN Suska Riau</a>, Pusat Penelitian dan Penerbitan
                </p>
        </div>
        </footer>
    </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModal">Apakah anda yakin ingin logout?</h5>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                    <a type="button" class="btn btn-primary" href="<?= base_url('Auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?= base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="<?= base_url(); ?>assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="<?= base_url(); ?>assets/js/es6-promise-auto.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?= base_url(); ?>assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="<?= base_url(); ?>assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="<?= base_url(); ?>assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="<?= base_url(); ?>assets/js/bootstrap-notify.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="<?= base_url(); ?>assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="<?= base_url(); ?>assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="<?= base_url(); ?>assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="<?= base_url(); ?>assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="<?= base_url(); ?>assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?= base_url(); ?>assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="<?= base_url(); ?>assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="<?= base_url(); ?>assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?= base_url(); ?>assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url(); ?>assets/js/demo.js"></script>

</html>