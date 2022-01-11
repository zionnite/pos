
<?php
$site_name      =$this->Admin_db->get_site_name();
$site_logo      =$this->Admin_db->get_site_logo();
// $this->uri->segment(1)

?>
<head>
    
<title>
    <?php
          if($this->uri->segment(1) =='Dashboard' || $this->uri->segment(1) =='' || $this->uri->segment(1) ==' '){
            if($this->uri->segment(2) =='view_plan'){
              echo $site_name.' | View Plan';
            }elseif($this->uri->segment(2) =='manage_store'){
                echo $site_name.' | Manage Store';
            }elseif($this->uri->segment(2) =='settings'){
                echo $site_name.' | Settings';
            }elseif($this->uri->segment(2) =='site_details'){
                echo $site_name.' | Update Site Details';
            }elseif($this->uri->segment(2) =='set_payment_api'){
                echo $site_name.' | Update Payment Api';
            }else{
              echo $site_name.' | Admin Portal';
            }
              
          }elseif($this->uri->segment(2) =='open_store'){
              echo $site_name.' | Open Store';
          }elseif($this->uri->segment(2) =='view_supervisor'){
              echo $site_name.' | View Supervisor';
          }elseif($this->uri->segment(2) =='get_supervisor_by_store_id'){
              echo $site_name.' | Filter Supervisor By Store Id';
          }elseif($this->uri->segment(2) =='get_supervisor_by_store_branch_id'){
              echo $site_name.' | Filter Supervisor By Branch Id';
          }elseif($this->uri->segment(2) =='manage_store'){
              echo $site_name.' | Manage Store';
          }elseif($this->uri->segment(2) =='open_branch_store'){
              echo $site_name.' | Open Branch Store';
          }
          elseif($this->uri->segment(2) =='view_sale_rep'){
              echo $site_name.' | View Sale Rep';
          }
          elseif($this->uri->segment(2) =='get_sales_rep_by_store_id'){
              echo $site_name.' | View Sale Rep By Store Id';
          }
          elseif($this->uri->segment(2) =='get_sales_rep_by_store_branch_id'){
              echo $site_name.' | View Sale Rep By Branch Id';
          }
          elseif($this->uri->segment(2) =='view_my_customer'){
              echo $site_name.' | View Customers';
          }
          elseif($this->uri->segment(2) =='filter_customer'){
              echo $site_name.' | Filter Customer';
          }
          elseif($this->uri->segment(2) =='view_my_supplier'){
              echo $site_name.' | View Supplier';
          }
          elseif($this->uri->segment(2) =='filter_supplier'){
              echo $site_name.' | Filter Supplier';
          }
          elseif($this->uri->segment(2) =='view_my_category'){
              echo $site_name.' | View Category';
          }
          elseif($this->uri->segment(2) =='add_stock'){
              echo $site_name.' | Add Stock';
          }
          elseif($this->uri->segment(2) =='view_product'){
              echo $site_name.' | View Product';
          }
          elseif($this->uri->segment(2) =='view_product_in'){
              echo $site_name.' | View Product In-Stock';
          }
          elseif($this->uri->segment(2) =='view_product_out'){
              echo $site_name.' | View Product Out-of-stock';
          }
          elseif($this->uri->segment(2) =='view_my_supplier'){
              echo $site_name.' | View Supplier';
          }
          elseif($this->uri->segment(1) =='Invoice'){
              echo $site_name.' | Invoice';
          }
          elseif($this->uri->segment(1) =='Transaction_history'){
              echo $site_name.' | Transaction History';
          }
          elseif($this->uri->segment(1) =='Sales_rep'){
              echo $site_name.' | New Transaction';
          }
          elseif($this->uri->segment(1) =='Manager_Dashboard'){
              echo $site_name.' | Dashboard (Manager)';
          }
          elseif($this->uri->segment(1) =='Office'){
              echo $site_name.' | Dashboard (Store Owner)';
          }
          elseif($this->uri->segment(1) =='Sales_Dashboard'){
              echo $site_name.' | Dashboard (Staff)';
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/icon/icofont/css/icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/icon/feather/css/feather.css">
    <!--forms-wizard css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/bower_components/jquery.steps/demo/css/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" />
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/assets/css/jquery.mCustomScrollbar.css">
    

    

</head>
