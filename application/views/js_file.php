<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/popper.js/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/modernizr/modernizr.js"></script>
<!-- Chart js -->
<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/chart.js/dist/Chart.js"></script>
<!-- amchart js -->
<script src="<?php echo base_url();?>files/assets/pages/widget/amchart/amcharts.js"></script>
<script src="<?php echo base_url();?>files/assets/pages/widget/amchart/serial.js"></script>
<script src="<?php echo base_url();?>files/assets/pages/widget/amchart/light.js"></script>
<script src="<?php echo base_url();?>files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>files/assets/js/SmoothScroll.js"></script>
<script src="<?php echo base_url();?>files/assets/js/pcoded.min.js"></script>
<!-- custom js -->
<script src="<?php echo base_url();?>files/assets/js/vartical-layout.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>files/assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>files/assets/js/script.min.js"></script>


<!-- sweet alert js -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>files/assets/js/modal.js"></script> 
<!-- sweet alert modal.js intialize js -->

<!-- modalEffects js nifty modal window effects -->
<script type="text/javascript" src="<?php echo base_url();?>files/assets/js/modalEffects.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>files/assets/js/classie.js"></script>



<script type="text/javascript">

    $(document).ready(function(){
        setInterval(function() { 
            $.ajax({
                url: '<?php echo base_url();?>CheckSession/check_session',
                type: 'POST',
                data: {dis_current_url:'<?php echo current_url();?>'},
                success: function(data) {
                    if(data =='inactivity'){
                        window.location = '<?php echo base_url();?>Login';
                    }
                    
                }
            });
        },5000);
    });

</script>


<script>
	$('document').on('load', load_cart());
      
        function load_cart() {
        	var search_term = $('#search_term').val();
			var dataString = 'search_term=' + search_term;
			// alert(dataString);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>Sales_rep/add_sales_cart_ajax",
				data: dataString,
				cache: false,
				success: function (html) {
					$("#dataList").html(html);

				}
			});
    	}
</script>


