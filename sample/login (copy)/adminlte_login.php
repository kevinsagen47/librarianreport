<?php
/**
 * @date         2020-09-03
 * @author       Shih, Deng-Kai <pinkuang@mail.nsysu.edu.tw>
 * @copyright    2020 Shih, Deng-Kai
 * @license
 * @rev          0.0.1
 */

namespace nsysu\lis\templates;


class adminlte_login
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
            <style>
            body,html{height:100%}
            body{
                background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('test.jpg');
                min-height:100%
                background-position:center;
                background-size:cover;
            }
            </style>
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

            <link rel="stylesheet" href="../../library/adminlte/plugins/fontawesome-free/css/all.min.css">
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="../../library/adminlte/dist/css/adminlte.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
            <link rel="stylesheet" href="../../library/fancybox/dist/jquery.fancybox.min.css">

        </head>
    
       <?php echo (isset($header['body'])) ? $header['body'].chr(13).chr(10) : '<body class="hold-transition login-page" >'.chr(13).chr(10); 
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
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="login-logo" name="logo" id="logo" >
                <a href="../">Librarian's <b>Daily Activity Report Website</b></a>
            </div>
            <!-- /.login-logo -->

            <div class="card">
                <div class="card-body login-card-body">
                <!-- /.login-title -->
                <p class="login-box-msg" name="head" id="head" >Sign in to start your session</p>
                <!-- /.login-title -->

                <!-- /.login-main -->
                <!-- <form action="../library/common/cors_conf.php" method="post" name="fmlogin" id="fmlogin" > -->
                <!-- <form action="lib/auth_check.php" method="post" name="fmlogin" id="fmlogin" > -->
                <form method="post" name="fmlogin" id="fmlogin" >
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="account" id="account" placeholder="Account">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <input type="hidden" name="lang" id="lang" value="zh" >
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="signin" id="signin" >Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?php echo (isset($content['content'])) ? $content['content'].chr(13).chr(10) : ''.chr(13).chr(10); ?>
                </form>
                <!-- /.login-main -->

                <p class="mb-1">
                    <a href="https://sso.nsysu.edu.tw/index.php/passport/forget" name="forget" id="forget" target="_blank" >I forgot my password</a>
                </p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
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

        <?php
        /**
         * script
         */
        echo isset($footer['script']) ? $footer['script'].chr(13).chr(10) : ''.chr(13).chr(10);
        ?>
        <script type="text/javascript" src="../../library/adminlte/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../../library/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="../../library/adminlte/dist/js/adminlte.js"></script>
        <script type="text/javascript" src="../../library/adminlte/dist/js/pages/dashboard.js"></script>
        <script type="text/javascript" src="../../library/adminlte/dist/js/demo.js"></script>
        <script type="text/javascript" src="../../library/adminlte/plugins/print_r.js"></script>
        <script type="text/javascript" src="../../library/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script type="text/javascript" src="../../library/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
        <script type="text/javascript" src="../../library/fancybox/dist/jquery.fancybox.min.js"></script>
        <script>
              $.widget.bridge('uibutton', $.ui.button)
        </script>

        <script type="text/javascript" src="../../library/adminlte/plugins/login.js"></script>

        </body>
        </html>
        <?php
    }
}