<?php
/**
 * 載入 datatables 元件資料 ( javascript + css )
 *
 */

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
        <!-- DataTables - buttons -->
        <link rel="stylesheet" href="../../library/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../library/adminlte/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        
        <style type="text/css">
            /* Ensure that the demo table scrolls */
            th, td { white-space: nowrap; }
            div.dataTables_wrapper {
                width: 800px;
                margin: 0 auto;
            }
 
            div.ColVis {
                float: left;
            }
        </style>',
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
    'content' => '');

/**
 * $footer 參數設定
 */
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
        <!-- DataTables - Button -->
        <script src="../../library/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <!-- jszip  -->
        <script src="../../library/adminlte/plugins/jszip/jszip.min.js"></script>
        <!-- pdfmake -->
        <script src="../../library/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="../../library/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
        <!-- datatables-fixedcolumns -->
        <script src="../../library/adminlte/plugins/datatables-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>
        <script src="../../library/adminlte/plugins/datatables-fixedcolumns/js/fixedColumns.bootstrap4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../library/adminlte/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../library/adminlte/dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function () {
                $(\'#example1\').DataTable({
                    dom: \'Bfrtip\',
                    buttons: [
                        {   extend: \'collection\',
                            text: \'<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i>&nbsp;&nbsp;匯出\',
                            buttons: [
                                 {  extend: \'copy\',
                                    text: \'<span class="glyphicon glyphicon-download-alt pull-left"></span> Copy</button>\',
                                    titleAttr: \'Copy\',
                                    className: \'btn btn-secondary\',
                                    exportOptions: {
                                        orthogonal: \'export\',
                                        columns: \':visible\',
                                        stripHtml:false
                                    }
                                },
                                {   extend: \'csv\',
                                    text: \'<span class="glyphicon glyphicon-download-alt pull-left"></span> CSV</button>\',
                                    titleAttr: \'CSV\',
                                    className: \'btn btn-secondary\',
                                    exportOptions: {
                                        orthogonal: \'export\',
                                        columns: [0, \':visible\'],
                                        stripHtml:false
                                    }
                                },
                                {   extend: \'excel\',
                                    text: \'<span class="glyphicon glyphicon-download-alt pull-left"></span> Excel</button>\',
                                    titleAttr: \'Excel\',
                                    className: \'btn btn-secondary\',
                                    exportOptions: {
                                        orthogonal: \'export\',
                                        columns: [0, \':visible\'],
                                        stripHtml:false
                                    }
                                },
                                {   extend: \'pdf\',
                                    text: \'<span class="glyphicon glyphicon-download-alt pull-left"></span> PDF</button>\',
                                    titleAttr: \'PDF\',
                                    className: \'btn btn-secondary\',
                                    exportOptions: {
                                        orthogonal: \'export\',
                                        columns: [0, \':visible\'],
                                        stripHtml:false
                                    }
                                },
                                {   extend: \'print\',
                                    text: \'<span class="glyphicon glyphicon-download-alt pull-left"></span> Print</button>\',
                                    titleAttr: \'Print\',
                                    className: \'btn btn-secondary\',
                                    exportOptions: {
                                        orthogonal: \'export\',
                                        columns: \':visible\',
                                        stripHtml:false
                                    }
                                }
                            ]
                        },
                        {   extend: \'colvis\',
                            text: \'<i class=\"fa fa-columns\"></i>&nbsp;&nbsp;欄位</button>\',
                            titleAttr: \'欄位\',
                            className: \'btn btn-secondary\',
                            columns: \':gt(0)\',
                            columnText: function ( dt, idx, title ) {
                                   return (idx+1)+\': \'+title;
                            }
                        },
                    ],
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                    "columnDefs": [
                         { "visible": false, "targets": 1 },
                         { "visible": false, "targets": 3 }
                    ]
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

