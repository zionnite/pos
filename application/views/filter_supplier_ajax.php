<table class="table table-striped footable footable-1 footable-paging footable-paging-center breakpoint-lg" style="">
<thead>
		<tr class="footable-header">
			<th class="footable-sortable footable-first-visible" style="display: table-cell;">
				S/N<span class="fooicon fooicon-sort"></span></th>

			<th class="footable-sortable footable-first-visible" style="display: table-cell;">Store
				<span class="fooicon fooicon-sort"></span></th>

			<th class="footable-sortable footable-first-visible" style="display: table-cell;">Branch
				<span class="fooicon fooicon-sort"></span></th>



			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Supplier Name<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Supplier Email<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Supplier Phone No<span
					class="fooicon fooicon-sort"></span></th>

			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Date Created</th>
			<th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;"></th>
		</tr>
	</thead>

	<tbody>
		<?php	
                                            $i=1;
                                            
                                            if(is_array($get_info)){
                                                foreach($get_info as $row){
                                                    $id				        =$row['id'];
                                                    $store_id		        =$row['store_id'];
                                                    $store_owner_id	        =$row['store_owner_id'];
                                                    
                                                    $store_name 	        =$row['store_name'];
                                                    $branch_name            =$row['branch_store_name'];
                                                    $branch_store_id        =$row['branch_store_id'];

                                                    $sub_email      =$row['email'];
                                                    $sub_name       =$row['name'];
                                                    $sub_phone      =$row['phone'];

                                                    $date			=$row['date_created'];
                                                    $time			=$row['time'];


                                                    $store_logo             =$this->Action->get_store_logo_by_store_id($store_id);
                                                    $store_name_2           =$this->Action->get_store_name_2_by_store_id($store_id);
                                        ?>

		<tr>
			<td><?php echo $i++;?></td>
			<td>
				<img style="height:100px;width:100px"
					src="<?php echo base_url();?>store_img/<?php echo $store_name_2;?>/images/<?php echo $store_logo;?>"
					alt="">
				<br /><?php echo $store_name;?>
			</td>
			<td><?php echo $branch_name;?></td>
			<td><?php echo $sub_name;?></td>
			<td><?php echo $sub_email;?></td>
			<td><?php echo $sub_phone;?></td>
			<td><?php echo $date;?></td>
			<td>
				<a href="javascript:;" id="delete_branch_<?php echo $id;?>" data-id="<?php echo $id;?>"
					class="btn btn-danger btn-sm">Delete</a>
			</td>
		</tr>

		<script type="text/javascript" src="<?php echo base_url();?>files/bower_components/jquery/dist/jquery.min.js">
		</script>

		<script>
			$(document).ready(function () {
				$('#delete_branch_<?php echo $id;?>').click(function (e) {
					e.preventDefault();
					var id = $(this).data('id');
					swal({
							title: "Are you sure you want to DELETE this Supplier?",
							icon: "warning",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {

								$.ajax({
									type: 'POST',
									url: '<?php echo base_url();?>Office/delete_supplier/' +
										id,

									success: function (resp) {
										if (resp == 'ok') {

											swal({
												title: "Success",
												text: "Supplier has been been removed from List!",
												icon: "success",
												closeOnClickOutside: false,

											});

										} else if (resp == 'err') {

											swal({
												title: "Oops!",
												text: "Database Could not connect to server!",
												icon: "info",
												closeOnClickOutside: false,

											});

										}
									}
								});

							} else {
								swal("Delete Cancelled");
							}
						});
				});

			});

		</script>

		<?php
                                            }
                                        }
                                        ?>
	</tbody>
	<tfoot>
		
	</tfoot>
</table>

<?php 
    if(!is_array($get_info)){
?>
    <div class="alert alert-warning" style="margin-top:1%;">No Supplier has been added to Database yet!</div>
<?php
    }
?>
  

<ul class="pagination">
		<?php echo $pagelinks ?>
	</ul>