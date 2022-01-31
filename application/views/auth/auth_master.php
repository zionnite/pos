
<!DOCTYPE html>
<html lang="en">


<?php
$site_name      =$this->Admin_db->get_site_name();
$site_logo      =$this->Admin_db->get_site_logo();
// $this->uri->segment(1)

?>
<head>
<title>
    <?php
          if($this->uri->segment(1) =='Login' || $this->uri->segment(1) =='' || $this->uri->segment(1) ==' '){
            if($this->uri->segment(2) =='forgot_password'){
              echo $site_name.' | Forgot Password Page';
            }elseif($this->uri->segment(2) =='confirm_reset_password'){
                echo $site_name.' | Confirm Reset Password ';
            }else{
              echo $site_name.' | Login Page';
            }
              
          }
          ?> 
  
  </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords"
        content="Pos">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url();?>files/site_logo/<?php echo $site_logo;?>" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/css/style.css">
</head>

<body class="fix-menu">

    <!--load page-->
    <?php isset($content)?$this->load->view($content):NULL;?> 
    <!--end load page-->

    <!-- Required Jquery -->
    <script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>files/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo base_url();?>files/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>files/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="<?php echo base_url();?>files/bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript"
        src="<?php echo base_url();?>files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript"
        src="<?php echo base_url();?>files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>files/assets/js/common-pages.js"></script>
</body>


</html>