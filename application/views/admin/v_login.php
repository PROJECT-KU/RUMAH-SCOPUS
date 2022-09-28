<!--============================= TITLE =============================-->
<head>
<title><?php echo $title; ?></title>
</head>
<!--============================= END =============================-->

<!--============================= CONTENT =============================-->
<body class="hold-transition login-page">
  <div class="login-box">
    <div>
      <p><?php echo $this->session->flashdata('msg'); ?></p>
    </div>

      <div class="login-box-body">
        <h1 style="position: relative;" class="text-center text-bold">ADMIN RUMAH SCOPUS</h1>
        <p class="login-box-msg"> <img width="200px;" src="<?php echo base_url() . 'theme/images/logo/scopus.png' ?>"></p>
        <hr />

      <form action="<?php echo site_url() . 'admin/login/auth' ?>" method="post">

        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
          <!--<div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>-->
          
          <div class="col-xs-4">
            <a href="<?php echo base_url() . '' ?>"><button type="button" class="btn btn-warning btn-block btn-flat">Home</button></a>
          </div>
          <div class="col-xs-8">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>

      </form>
      <hr />

      <p>
        <center>Copyright <?php echo date('Y'); ?> Rumah Scopus <br /> All Right Reserved</center>
      </p>

    </div>
  </div>
</body>
<!--============================= END CONTENT =============================-->

<!--============================= JAVA SCRIPT =============================-->
  <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url() . 'assets/plugins/iCheck/icheck.min.js' ?>"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
  <!--============================= END JAVA SCRIPT =============================-->
