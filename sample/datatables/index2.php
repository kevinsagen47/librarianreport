<?php
/**
 * @param array $header
 */
function html_header(
    $header = array('refresh' => '<meta content=\'60\' http-equiv=\'refresh\'>',
                    'script' => '
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../library/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../library/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../library/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../library/adminlte/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">',
                    'title' => '測試網頁 - 2020',
                    'body' => '<body class="hold-transition sidebar-mini" >')
        ) {
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        /**
         * refresh html
         */
        echo (isset($header['refresh'])) ? $header['refresh'].chr(13).chr(10) : ''.chr(13).chr(10);
        ?>

        <title><?php echo (isset($header['title'])) ? $header['title'] : 'no title'; ?></title>


        <!-- import components { start } -->
        <?php echo (isset($header['script'])) ? $header['script'].chr(13).chr(10) : ''.chr(13).chr(10); ?>
        <!-- import components { end } -->
    </head>

    <?php echo (isset($header['body'])) ? $header['body'].chr(13).chr(10) : '<body class="hold-transition sidebar-mini" >'.chr(13).chr(10); ?>
        <div class="wrapper">
    <?php
}

/**
 * @param array $navbar
 */
function html_navbar(
    $navbar =array('left' => '
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item d-none d-sm-inline-block" >
                <label class="nav-link" id="lbe_lang" >語言</label>
            </li>

            <div class="nav-item">
                <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" value="zh">中文</option>
                    <option value="en">English</option>
                </select>
            </div>

        </ul>',
                   'search' => '
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>',
                   'right' => '
        <ul class="navbar-nav ml-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <!--<i class="far fa-address-card"></i>-->
                    <img src="" class="img-rounded elevation-2" alt="User Image">
                    <!-- <span class="badge badge-warning navbar-badge">15</span>-->
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">dengkai - Deng-Kai</span>
                    <div class="dropdown-divider"></div>

                    <span class="dropdown-item dropdown-header">
                            權限 - 管理者
                        </span>

                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item dropdown-footer">logout</a>
                </div>
            </li>

        </ul>')
        ) {
?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

<?php
/**
 * Left navbar links
 */
echo isset($navbar['left']) ? $navbar['left'].chr(13).chr(10) : ''.chr(13).chr(10);

/**
 * Search Form
 */
echo isset($navbar['search']) ? $navbar['search'].chr(13).chr(10) : ''.chr(13).chr(10);

/**
 * Right navbar links
 */
echo isset($navbar['right']) ? $navbar['right'].chr(13).chr(10) : ''.chr(13).chr(10);

?>
    </nav>
    <!-- /.navbar -->
    <?php
}

/**
 * @param array $sidebars
 */
function html_siderbar(
    $sidebars = array('logo' => '
            <a href="https://lis.nsysu.edu.tw" class="brand-link" target="_blank" id="NSYSU_LOG" >
                <img src="../../library/adminlte/dist/img/nsysu.png" alt="NSYSU LIS Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .9">
                <span class="brand-text font-weight-light">國立中山大學</span>
            </a>',
                     'title' => '',
                     'menu' => '')

) {
    ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <?php

        /**
         * Brand Logo
         */
        echo isset($sidebars['logo']) ? $sidebars['logo'].chr(13).chr(10) : ''.chr(13).chr(10);

        ?>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php
            /**
             * Sidebar user panel (optional)
             */
            echo isset($sidebars['title']) ? $sidebars['title'].chr(13).chr(10) : ''.chr(13).chr(10);
            ?>
            </div>

            <nav class="mt-2">
            <?php
            /**
             * Sidebar Menu
             */
            echo isset($sidebars['menu']) ? $sidebars['menu'].chr(13).chr(10) : ''.chr(13).chr(10);
            ?>
            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>
<?php
}

function html_content(
    $content = array('header' => '
      <div class="col-sm-6">
          <h1>DataTables</h1>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
          </ol>
      </div>',
                     'content' => '')
) {
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <?php
                    /**
                     * content-header
                     */
                    echo isset($content['header']) ? $content['header'].chr(13).chr(10) : ''.chr(13).chr(10);
                    ?>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    /**
                     * Main content
                     */
                    echo isset($content['content']) ? $content['content'].chr(13).chr(10) : ''.chr(13).chr(10);
                    ?>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    </div>
    <!-- /.content-wrapper -->
<?php
}

/**
 * @param array $footer
 */
function html_footer(
    $footer = array('script' => '
        <!-- jQuery -->
        <script src="../../library/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../library/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="../../library/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../library/adminlte/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../library/adminlte/dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });

                $(\'#example2\').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>',
        'html' => '
       <footer class="main-footer">
            <strong>Copyright © 2020 NSYSU LIS. All rights reserved. </strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.0.1
            </div>
        </footer>')
    ) {

    /**
     * footer
     */
    echo isset($footer['html']) ? $footer['html'].chr(13).chr(10) : ''.chr(13).chr(10);
?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

    <?php
    /**
     * script
     */
    echo isset($footer['script']) ? $footer['script'].chr(13).chr(10) : ''.chr(13).chr(10);
    ?>
    </body>
</html>
<?php
}


/**
 * $header 參數設定
 */
$header = array('refresh' => '<meta content=\'60\' http-equiv=\'refresh\'>',
    'script' => '
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../library/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../library/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../library/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../library/adminlte/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">',
    'title' => '測試網頁 - 2020',
    'body' => '<body class="hold-transition sidebar-mini" >');

/**
 * $navbar 參數設定
 */
$navbar =array('left' => '
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item d-none d-sm-inline-block" >
                <label class="nav-link" id="lbe_lang" >語言</label>
            </li>

            <div class="nav-item">
                <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" value="zh">中文</option>
                    <option value="en">English</option>
                </select>
            </div>

        </ul>',
    'search' => '
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>',
    'right' => '
        <ul class="navbar-nav ml-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <!--<i class="far fa-address-card"></i>-->
                    <img src="" class="img-rounded elevation-2" alt="User Image">
                    <!-- <span class="badge badge-warning navbar-badge">15</span>-->
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">dengkai - Deng-Kai</span>
                    <div class="dropdown-divider"></div>

                    <span class="dropdown-item dropdown-header">
                            權限 - 管理者
                        </span>

                    <div class="dropdown-divider"></div>
                    <a href="" class="dropdown-item dropdown-footer">logout</a>
                </div>
            </li>

        </ul>');

/**
 * $sidebars 參數設定
 */
$sidebars = array('logo' => '
            <a href="https://lis.nsysu.edu.tw" class="brand-link" target="_blank" id="NSYSU_LOG" >
                <img src="../../library/adminlte/dist/img/nsysu.png" alt="NSYSU LIS Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .9">
                <span class="brand-text font-weight-light">國立中山大學</span>
            </a>',
    'title' => '',
    'menu' => '');

/**
 * $content 參數設定
 */
$content = array('header' => '
      <div class="col-sm-6">
          <h1>DataTables</h1>
      </div>
      <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
          </ol>
      </div>',
    'content' => '
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div><!-- /.card-header -->
            
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </thead>
                    <tbody>
<tr>
    <td>Trident</td>
    <td>Internet
        Explorer 4.0
    </td>
    <td>Win 95+</td>
    <td> 4</td>
    <td>X</td>
</tr>
<tr>
    <td>Trident</td>
    <td>Internet
        Explorer 5.0
    </td>
    <td>Win 95+</td>
    <td>5</td>
    <td>C</td>
</tr>
<tr>
    <td>Trident</td>
    <td>Internet
        Explorer 5.5
    </td>
    <td>Win 95+</td>
    <td>5.5</td>
    <td>A</td>
</tr>
<tr>
    <td>Trident</td>
    <td>Internet
        Explorer 6
    </td>
    <td>Win 98+</td>
    <td>6</td>
    <td>A</td>
</tr>
<tr>
    <td>Trident</td>
    <td>Internet Explorer 7</td>
    <td>Win XP SP2+</td>
    <td>7</td>
    <td>A</td>
</tr>
<tr>
    <td>Trident</td>
    <td>AOL browser (AOL desktop)</td>
    <td>Win XP</td>
    <td>6</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Firefox 1.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td>1.7</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Firefox 1.5</td>
    <td>Win 98+ / OSX.2+</td>
    <td>1.8</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Firefox 2.0</td>
    <td>Win 98+ / OSX.2+</td>
    <td>1.8</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Firefox 3.0</td>
    <td>Win 2k+ / OSX.3+</td>
    <td>1.9</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Camino 1.0</td>
    <td>OSX.2+</td>
    <td>1.8</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Camino 1.5</td>
    <td>OSX.3+</td>
    <td>1.8</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Netscape 7.2</td>
    <td>Win 95+ / Mac OS 8.6-9.2</td>
    <td>1.7</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Netscape Browser 8</td>
    <td>Win 98SE+</td>
    <td>1.7</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Netscape Navigator 9</td>
    <td>Win 98+ / OSX.2+</td>
    <td>1.8</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Mozilla 1.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td>1</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Mozilla 1.1</td>
    <td>Win 95+ / OSX.1+</td>
    <td>1.1</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Mozilla 1.2</td>
    <td>Win 95+ / OSX.1+</td>
    <td>1.2</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Mozilla 1.3</td>
    <td>Win 95+ / OSX.1+</td>
    <td>1.3</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Mozilla 1.4</td>
    <td>Win 95+ / OSX.1+</td>
    <td>1.4</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Mozilla 1.5</td>
    <td>Win 95+ / OSX.1+</td>
    <td>1.5</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Mozilla 1.6</td>
    <td>Win 95+ / OSX.1+</td>
    <td>1.6</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Mozilla 1.7</td>
    <td>Win 98+ / OSX.1+</td>
    <td>1.7</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Mozilla 1.8</td>
    <td>Win 98+ / OSX.1+</td>
    <td>1.8</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Seamonkey 1.1</td>
    <td>Win 98+ / OSX.2+</td>
    <td>1.8</td>
    <td>A</td>
</tr>
<tr>
    <td>Gecko</td>
    <td>Epiphany 2.20</td>
    <td>Gnome</td>
    <td>1.8</td>
    <td>A</td>
</tr>
<tr>
    <td>Webkit</td>
    <td>Safari 1.2</td>
    <td>OSX.3</td>
    <td>125.5</td>
    <td>A</td>
</tr>
<tr>
    <td>Webkit</td>
    <td>Safari 1.3</td>
    <td>OSX.3</td>
    <td>312.8</td>
    <td>A</td>
</tr>
<tr>
    <td>Webkit</td>
    <td>Safari 2.0</td>
    <td>OSX.4+</td>
    <td>419.3</td>
    <td>A</td>
</tr>
<tr>
    <td>Webkit</td>
    <td>Safari 3.0</td>
    <td>OSX.4+</td>
    <td>522.1</td>
    <td>A</td>
</tr>
<tr>
    <td>Webkit</td>
    <td>OmniWeb 5.5</td>
    <td>OSX.4+</td>
    <td>420</td>
    <td>A</td>
</tr>
<tr>
    <td>Webkit</td>
    <td>iPod Touch / iPhone</td>
    <td>iPod</td>
    <td>420.1</td>
    <td>A</td>
</tr>
<tr>
    <td>Webkit</td>
    <td>S60</td>
    <td>S60</td>
    <td>413</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Opera 7.0</td>
    <td>Win 95+ / OSX.1+</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Opera 7.5</td>
    <td>Win 95+ / OSX.2+</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Opera 8.0</td>
    <td>Win 95+ / OSX.2+</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Opera 8.5</td>
    <td>Win 95+ / OSX.2+</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Opera 9.0</td>
    <td>Win 95+ / OSX.3+</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Opera 9.2</td>
    <td>Win 88+ / OSX.3+</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Opera 9.5</td>
    <td>Win 88+ / OSX.3+</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Opera for Wii</td>
    <td>Wii</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Nokia N800</td>
    <td>N800</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Presto</td>
    <td>Nintendo DS browser</td>
    <td>Nintendo DS</td>
    <td>8.5</td>
    <td>C/A<sup>1</sup></td>
</tr>
<tr>
    <td>KHTML</td>
    <td>Konqureror 3.1</td>
    <td>KDE 3.1</td>
    <td>3.1</td>
    <td>C</td>
</tr>
<tr>
    <td>KHTML</td>
    <td>Konqureror 3.3</td>
    <td>KDE 3.3</td>
    <td>3.3</td>
    <td>A</td>
</tr>
<tr>
    <td>KHTML</td>
    <td>Konqureror 3.5</td>
    <td>KDE 3.5</td>
    <td>3.5</td>
    <td>A</td>
</tr>
<tr>
    <td>Tasman</td>
    <td>Internet Explorer 4.5</td>
    <td>Mac OS 8-9</td>
    <td>-</td>
    <td>X</td>
</tr>
<tr>
    <td>Tasman</td>
    <td>Internet Explorer 5.1</td>
    <td>Mac OS 7.6-9</td>
    <td>1</td>
    <td>C</td>
</tr>
<tr>
    <td>Tasman</td>
    <td>Internet Explorer 5.2</td>
    <td>Mac OS 8-X</td>
    <td>1</td>
    <td>C</td>
</tr>
<tr>
    <td>Misc</td>
    <td>NetFront 3.1</td>
    <td>Embedded devices</td>
    <td>-</td>
    <td>C</td>
</tr>
<tr>
    <td>Misc</td>
    <td>NetFront 3.4</td>
    <td>Embedded devices</td>
    <td>-</td>
    <td>A</td>
</tr>
<tr>
    <td>Misc</td>
    <td>Dillo 0.8</td>
    <td>Embedded devices</td>
    <td>-</td>
    <td>X</td>
</tr>
<tr>
    <td>Misc</td>
    <td>Links</td>
    <td>Text only</td>
    <td>-</td>
    <td>X</td>
</tr>
<tr>
    <td>Misc</td>
    <td>Lynx</td>
    <td>Text only</td>
    <td>-</td>
    <td>X</td>
</tr>
<tr>
    <td>Misc</td>
    <td>IE Mobile</td>
    <td>Windows Mobile 6</td>
    <td>-</td>
    <td>C</td>
</tr>
<tr>
    <td>Misc</td>
    <td>PSP browser</td>
    <td>PSP</td>
    <td>-</td>
    <td>C</td>
</tr>
<tr>
    <td>Other browsers</td>
    <td>All others</td>
    <td>-</td>
    <td>-</td>
    <td>U</td>
</tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    ');


$footer = array('script' => '
        <!-- jQuery -->
        <script src="../../library/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../library/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="../../library/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../library/adminlte/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../library/adminlte/dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });

                $(\'#example2\').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>',
    'html' => '
       <footer class="main-footer">
            <strong>Copyright © 2020 NSYSU LIS. All rights reserved. </strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.0.1
            </div>
        </footer>');

html_header($header);

html_navbar($navbar);

html_siderbar($sidebars);

html_content($content);

html_footer($footer);
?>

