<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('head');?>

<body>
    <!-- Pre-loader start -->
    
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php $this->load->view('nav_bar');?>
            <?php //$this->load->view('side_bar');?>

            


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                <?php
                    if($user_status =='store_owner'){
                        $this->load->view('nav_bar/owner_store_nav_sidebar');

                    }else if($user_status =='manager'){
                        $this->load->view('nav_bar/manager_nav_sidebar');
                    }else if($user_status =='sales_rep'){
                        $this->load->view('nav_bar/staff_nav_sidebar');
                    }else if($user_status =='admin'){
                        $this->load->view('nav_bar/admin_nav_sidebar');
                    }
                ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                        <?php isset($content)?$this->load->view($content):NULL;?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('js_file');?>
</body>


</html>