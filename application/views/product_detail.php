<div class="main-body">
	<div class="page-wrapper">
		<!-- Page-header start -->
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<div class="d-inline">
							<h4>Product detail</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="page-header-breadcrumb">
						<ul class="breadcrumb-title">
							<li class="breadcrumb-item" style="float: left;">
								<a href="javascript:;"> <i class="feather icon-home"></i> </a>
							</li>
							<li class="breadcrumb-item" style="float: left;"><a href="#!">Product</a>
							</li>
							<li class="breadcrumb-item" style="float: left;"><a href="#!">Product Detail</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Page-header end -->

		<!-- Page body start -->
		<div class="page-body">

            <?php 
                $i=1;
                                            
                if(is_array($get_info)){
                    foreach($get_info as $row){
                        $prod_id 		        =$row['prod_id'];

                        $store_id		        =$row['store_id'];
                        $store_name 	        =$row['store_name'];
                        $branch_id              =$row['branch_id'];
                        $branch_name            =$row['branch_name'];
                        $store_owner_id	        =$row['store_owner_id'];
                        $prod_name              =$row['prod_name'];
                        $prod_size              =$row['prod_size'];
                        $prod_bunk              =$row['prod_bunk'];
                        $prod_cat               =$row['prod_cat'];
                        $prod_sub_cat           =$row['prod_sub_cat'];
                        $prod_color             =$row['prod_color'];
                        $prod_supplier          =$row['prod_supplier'];
                        $prod_brand             =$row['prod_brand'];
                        $prod_desc              =$row['prod_desc'];
                        $prod_cost              =$row['prod_cost'];
                        $prod_price             =$row['prod_price'];
                        $prod_whole             =$row['prod_whole'];
                        $prod_weight            =$row['prod_weight'];
                        $prod_discount          =$row['prod_discount'];
                        $prod_image             =$row['prod_image'];
                        $meta_title             =$row['meta_title'];
                        $meta_key               =$row['meta_key'];
                        $meta_desc              =$row['meta_desc'];
                        $date                   =$row['date_created'];
                        $time                   =$row['time'];


                        $currency               =$row['currency'];
                        
                        $store_logo             =$this->Action->get_store_logo_by_store_id($store_id);
                        $store_name_2           =$this->Action->get_store_name_2_by_store_id($store_id);
                        $cat_name               =$this->Action->get_category_name_by_cat_id($prod_cat);
                        $sub_cat_name           =$this->Action->get_sub_category_name_by_sub_cat_id($prod_sub_cat);

                        $sublier_name           =$this->Action->get_supplier_name_by_id($prod_supplier);

                        if($prod_bunk > 0){
                            $bunk_status    = 'In-Stock';
                        }else{
                            $bunk_status    = 'Out-of-stock';
                        }
            ?>
			<div class="row">
				<div class="col-md-12">
					<!-- Product detail page start -->
					<div class="card product-detail-page">
						<div class="card-block"  style="margin-right:65px;">
							<div class="row">
								<div class="col-lg-5  ">
									<div class="port_details_all_img row">
										<div class="col-lg-12 m-b-15">
											<div id="big_banner" class="slick-initialized slick-slider">
                                            <img class="img img-fluid"
																src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/product/<?php echo $prod_image;?>"
																alt="">

											</div>
										</div>
										
									</div>
								</div>


                                
								<div class="col-lg-7   product-detail" id="product-detail">
									<div class="row">
										<div>
											<div class="col-lg-12">
												<!-- <span class="txt-muted d-inline-block">Product -->
																									<!-- </span> -->
												<span class="f-right">Availablity : <a href="#!"> <?php echo $bunk_status;?> </a> </span>
											</div>
											<div class="col-lg-12">
												<h4 class="pro-desc"><?php echo $prod_name;?></h4>
											</div>
											<div class="col-lg-12">
												<span class="txt-muted"> Supplier :  <?php echo $sublier_name;?> </span>
											</div>
											<div class="col-lg-12">
												<span class="txt-muted"> Category : <?php echo $cat_name;?> (<b style="color:red;"><?php echo $sub_cat_name;?>)</b> </span>
											</div>
											
                                            
											<div class="col-lg-12">
												<span class="text-primary product-price"><i
														class="icofont icofont-cur-dollar"></i><?php echo $currency.$this->cart->format_number($prod_price);?></span>
												<span class="done-task txt-muted"><?php echo $currency.$this->cart->format_number($prod_cost);?></span>
												<hr>
												<p>
                                                    <?php echo $prod_desc;?>
												</p>
												<hr>
												<h6 class="f-16 f-w-600 m-t-10 m-b-10">Quantity</h6>
                                                <p><?php echo $prod_bunk;?></p>


                                                <h6 class="f-16 f-w-600 m-t-10 m-b-10">Size</h6>
                                                <p>
                                                    <?php
                                                        $size  =explode(",",$prod_size);;
                                                        $i=0;
                                                        for($i; $i<count($size); $i++){
                                                            if(count($size) > 1){
                                                            
                                                                echo $size[$i].',';
                                                    
                                                            }else{
                                                                echo $size[$i];
                                                            }
                                                        }
                                                    ?>    
                                                </p>

                                                <h6 class="f-16 f-w-600 m-t-10 m-b-10">Colour</h6>
                                                <p>
                                                    <?php
                                                        $color  =explode(",",$prod_color);;
                                                        $i=0;
                                                        for($i; $i<count($color); $i++){
                                                            if(count($color) > 1){
                                                            
                                                                echo $color[$i].', ';
                                                    
                                                            }else{
                                                                echo $color[$i];
                                                            }
                                                        }
                                                    ?>
                                                </p>
											</div>
											
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Product detail page end -->
				</div>
			</div>

            <?php 
                    }
                }else{
                    echo '<div class="alert alert-danger">Unable to fetch Product details</div>';
                }
            ?>
		
		</div>
		<!-- Page body end -->
	</div>
</div>
