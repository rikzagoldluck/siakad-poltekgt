<?php
include_once '../function/core.php';

if (isset($_SESSION['adm']['user']) && isset($_SESSION['adm']['pass'])) {
  redirect('dashboard');
}

$sqltp = select("*", "tbl_semester LIMIT 1");
$tp 
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="<?base('assets/images/icon/favicon.ico');?>" />
    <link rel="stylesheet" href="<?=base('assets-new/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?=base('assets-new/css/font-awesome.min.css');?>" />
    <link rel="stylesheet" href="<?=base('assets-new/css/themify-icons.css');?>" />
    <link rel="stylesheet" href="<?=base('assets-new/css/metisMenu.css');?>" />
    <link rel="stylesheet" href="<?=base('assets-new/css/owl.carousel.min.css');?>" />
    <link rel="stylesheet" href="<?=base('assets-new/css/slicknav.min.css');?>" />
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?=base('assets-new/css/typography.css');?>" />
    <link rel="stylesheet" href="<?=base('assets-new/css/default-css.css');?>" />
    <link rel="stylesheet" href="<?=base('assets-new/css/styles.css');?>" />
    <link rel="stylesheet" href="<?=base('assets-new/css/responsive.css');?>" />
    <link rel="stylesheet" href="<?= base('assets/css/sweetalert.css'); ?>" media="screen" title="no title">

    <!-- modernizr css -->
    <script src="<?=base('assets-new/js/vendor/modernizr-2.8.3.min.js');?>"></script>
    <script type="text/javascript" src="<?= base('assets/js/sweetalert.min.js'); ?>"></script>

  </head>

  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
      <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
      <div class="container">
        <div class="login-box ptb--100">
          <form action="" method="POST">
            <div class="login-form-head">
              <h4>Sign In</h4>
              <p>Welcome to SIAKAD POLTEK-GT</p>
            </div>
            <div class="login-form-body">
              <div class="form-gp">
                <label for="username">Username</label>
                <input type="text" id="username" name="username"/>
                <i class="ti-email"></i>
                <div class="text-danger"></div>
              </div>
              <div class="form-gp">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"/>
                <i class="ti-lock"></i>
                <div class="text-danger"></div>
              </div>
              <div class="form-gp">
                <select class="form-control" name="level">
                  <option value="">-- Select Level --</option>
                  <option value="1">Administrator</option>
                  <option value="2">Operator</option>
                </select>
              </div>
              <div class="row mb-4 rmber-area">
                <div class="col-6">
                  <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" />
                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                  </div>
                </div>
                <div class="col-6 text-right">
                  <a href="#">Forgot Password?</a>
                </div>
              </div>
              <div class="submit-btn-area">
                <button id="form_submit" type="submit" name="submit">Submit <i class="ti-arrow-right"></i></button>
                <div class="login-other row mt-4">
                  <div class="col-6">
                    <a class="fb-login" href="#">Log in with <i class="fa fa-facebook"></i></a>
                  </div>
                  <div class="col-6">
                    <a class="google-login" href="#">Log in with <i class="fa fa-google"></i></a>
                  </div>
                </div>
              </div>
              <div class="form-footer text-center mt-5">
                <p class="text-muted">Don't have an account? Tell Admin!</p>
              </div>
            </div>
          </form>
        </div>
        <div class="footer" style="border: none; background: none !important; color: #fff">
          Copyright &copy;
          <?= date('Y'); ?>
          :: Politeknik Gajah Tunggal
        </div>
      </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="<?= base('assets-new/js/vendor/jquery-2.2.4.min.js');?>"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= base('assets-new/js/popper.min.js');?>"></script>
    <script src="<?= base('assets-new/js/bootstrap.min.js');?>"></script>
    <script src="<?= base('assets-new/js/owl.carousel.min.js');?>"></script>
    <script src="<?= base('assets-new/js/metisMenu.min.js');?>"></script>
    <script src="<?= base('assets-new/js/jquery.slimscroll.min.js');?>"></script>
    <script src="<?= base('assets-new/js/jquery.slicknav.min.js');?>"></script>

    <!-- others plugins -->
    <script src="<?= base('assets-new/js/plugins.js');?>"></script>
    <script src="<?= base('assets-new/js/scripts.js');?>"></script>
  </body>
</html>
<?php
if (isset($_POST['submit'])) {
    $username   = anti_inject($_POST['username']);
    $password   = anti_inject($_POST['password']);
    $level      = anti_inject($_POST['level']);
  
    if (empty(trim($username)) || empty(trim($password))) {
      echo "<script>sweetAlert('Oops!', 'Kolom Username dan Password harus diisi!', 'error');</script>";
      echo notice(0);
    } else {
      if (empty($level)) {
        echo "<script>sweetAlert('Oops!', 'Pilih level terlebih dahulu!', 'error');</script>";
        echo notice(0);
      } else {
        $cekuname = cekuname($username);
        $ceknow   = mysqli_num_rows($cekuname);
  
        if ($ceknow != 0) {
          $data = mysqli_fetch_assoc($cekuname);
  
          //Checking password match
          $cekpass  = password_verify($password, $data['password']);
  
          if ($cekpass === TRUE && $level == $data['super']) {
            @$_SESSION['adm']['user']  = $data['username'];
            @$_SESSION['adm']['pass']  = $data['password'];
            @$_SESSION['adm']['super'] = $data['super'];
            @$_SESSION['adm']['id']    = $data['id'];
            @$_SESSION['thn_ajaran']   = $tp->tahun_ajaran;
            redirect('dashboard');
          } else {
            echo "<script>sweetAlert('Oops!', 'Username atau Password tidak cocok!', 'error');</script>";
            echo notice(0);
          }
  
        } else {
          echo "<script>sweetAlert('Oops!', 'Username atau Password salah!', 'error');</script>";
          echo notice(0);
        }
  
      }
    }
  
  }
  
  ?>
