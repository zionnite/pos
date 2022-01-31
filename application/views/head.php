
<?php
$site_name      =$this->Admin_db->get_site_name();
$site_logo      =$this->Admin_db->get_site_logo();
// $this->uri->segment(1)

?>

<head>
    
  <title>
    <?php
          if($this->uri->segment(1) =='Super-Admin'){
              if($this->uri->segment(2) ==''){
                  echo 'Super-Admin | Dashboard';
              }
              elseif($this->uri->segment(2) =='view_plan'){
                  echo 'Super-Admin | View Plan';
              }
              elseif($this->uri->segment(2) =='edit_plan'){
                  echo 'Super-Admin | Edit Plan';
              }
              elseif($this->uri->segment(2) =='manage_store'){
                  echo 'Super-Admin | Manage Store';
              }
              elseif($this->uri->segment(2) =='store_owner'){
                  echo 'Super-Admin | Store Owner';
              }
              elseif($this->uri->segment(2) =='store_detail'){
                  echo 'Super-Admin | Store Detail';
              }
              elseif($this->uri->segment(2) =='settings'){
                  echo 'Super-Admin | Settings';
              }
              elseif($this->uri->segment(2) =='settings'){
                  echo 'Super-Admin | Settings';
              }
              elseif($this->uri->segment(2) =='site_details'){
                  echo 'Super-Admin | Site Details';
              }
              elseif($this->uri->segment(2) =='set_payment_api'){
                  echo 'Super-Admin | Set Payment Api';
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
        content="POS">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url();?>files/site_logo/<?php echo $site_logo;?>" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/bower_components/bootstrap/dist/css/bootstrap.min.css">
     <!-- sweet alert framework -->
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/css/sweetalert.css">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/bower_components/jquery.steps/demo/css/jquery.steps.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/icon/feather/css/feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/css/jquery.mCustomScrollbar.css">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <!-- radial chart.css -->
    <link rel="stylesheet" href="<?php echo base_url();?>files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">

</head>