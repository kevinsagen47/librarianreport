<?php
/**
 * @date         2020-09-03
 * @author       Shih, Deng-Kai <pinkuang@mail.nsysu.edu.tw>
 * @copyright    2020 Shih, Deng-Kai
 * @license
 * @rev          0.0.1
 */

namespace nsysu\lis\templates;


class adminlte
{

    public function __construct()
    {
    }

    /**
     * @param array $header
     */
    public function html_header(
        $header = array(
            'refresh' => '',
            'script' => '',
            'title' => '',
            'body' => '')
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
     * @param array $nab
     */
    public function html_navbar(
        $nab =array(
            'left' => '',
            'search' => '',
            'right' => '')
            ) {
        ?>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <?php
        /**
         * Left navbar links
         */
        echo isset($nab['left']) ? $nab['left'].chr(13).chr(10) : ''.chr(13).chr(10);

        /**
         * Search Form
         */
        echo isset($nab['search']) ? $nab['search'].chr(13).chr(10) : ''.chr(13).chr(10);

        /**
         * Right navbar links
         */
        echo isset($nab['right']) ? $nab['right'].chr(13).chr(10) : ''.chr(13).chr(10);

        ?>
        </nav>
        <!-- /.navbar -->
    <?php
    }

    /**
     * @param array $sidebars
     */
    public function html_siderbar(
        $sidebars = array(
            'logo' => '',
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

    /**
     * @param array $content
     */
    public function html_content(
        $content = array(
            'header' => '',
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
    public function html_footer(
        $footer = array(
            'script' => '',
            'html' => '')
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
}