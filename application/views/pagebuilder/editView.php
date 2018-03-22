
<?php
//print_r($page_item);
//print_r($page_content);
if (isset($this->session->userdata['logged_in'])) {
  $username = 'admin';
  } else {
  $newURL = 'http://rtcompare.com/';
  header('Location: '.$newURL);
}
//check for an image and set it
$imageLocation = (isset($page_item[0]['imgName'])) ? 'uploads/' .  $page_item[0]['imgName'] : "";
$pageNum = $page_item[0]['pageID'];
?>
<script type = 'text/javascript' src = "<?php echo site_url(); ?>_js/jquery-3.3.1.min.js"></script>
<script type = 'text/javascript' src = "<?php echo site_url(); ?>_js/bootstrap.min.js"></script>
<style>
	.comparetable tr:nth-child(2n+3){
		background-color:#<?php echo (isset($page_item[0]['rowColor2'])) ? $page_item[0]['rowColor2'] : ""; ?>;	
	}
	.comparetable tr:nth-child(2n){
		background-color:#<?php echo (isset($page_item[0]['rowColor'])) ? $page_item[0]['rowColor'] : ""; ?>;
	}
	.comparetable thead{
		background-color:#<?php echo (isset($page_item[0]['headColor'])) ? $page_item[0]['headColor'] : ""; ?>;
	}
	.comparetable tr:nth-child(1) td{
		    color: #646464;
		    font-size: 16px;
		    text-align:left;
	}
	.arrow a{
		font-size: 20px;
		color:#008CBA;
		margin-left: 20px;

	}
</style>
<div class="gridContainer clearfix">
	<br /><a class="custom_button btn red" href="<?php echo site_url('adminController'); ?>"> <- Back</a><br />
	<br /><a class="custom_button btn neutral" href="<?php echo site_url('editPage/'.$page_item[0]['pageID']); ?>">Edit Page</a><br />
	<div class="hero" ><img src = "<?php echo site_url() . $imageLocation; ?>" alt=""></div>
	
	
	<div class="alert alert-success" style="display:none;">
	<div class="title"><?php echo $page_item[0]['pageHeaderTitle']; ?>	
	</div>
	
	</div>
	<div class="tableCNT">
	  	<table class="comparetable">
	  		
	  		<thead>
		  		<tr>
		      	<td>Change Row Order</td>
		      	<td>&nbsp;<?php echo $page_item[0]['pRowDescription'];?></td>
		      	<td><?php echo $page_item[0]['pTableCompare1'];?></td>
		      	<td><?php echo $page_item[0]['pTableCompare2'];?></td>
		      	<td></td>
		      	<td></td>
		    	</tr>
	  		</thead>
	  		
	    	<tbody id="showdata">
	    	</tbody>

		</table>
		<?php $lastRow = (isset(end($page_item)['rowOrder'])) ? end($page_item)['rowOrder'] : 0; ?>
		<a href="<?php echo site_url('createRow/' .$page_item[0]['pageID']). '/' . $lastRow ?>" class="custom_button btn">+ Add Row</a>
		
	</div>
</div>
	<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        Do you want to delete this row?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" id="btnDelete" class="btn red">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<div class="foot"><?php echo $page_item[0]['pageFooter']; ?></div>
	<script>
		$(function(){
			//call to function
			showAllRows();
			
			
			

			//function 
			function showAllRows(){
				
				$.ajax({
					url: '<?php echo base_url() ?>showAllRows/<?php echo $pageNum ?>',
					async:false,
					dataType: 'json',
					success: function(data){
						var html = '' ;
						var i;
						var IDcontent;
						var IDpage;
						var editBtn;
						var deleteBtn;
						var create = location.protocol + '//' + location.host + '/createRow/';
						var edit = location.protocol + '//' + location.host + '/editContent/';
						var del = location.protocol + '//' + location.host + '/deleteContent/';
						//starting the loop for creating ajax rows.
						for (i=0; i < data.length; i++){
								
								//creating the edit and delete buttons content
								IDcontent = data[i].contentID;
								IDpage = data[i].pageID;
											if (IDcontent == 0){
												editBtn= create + IDpage;
											} else {
												editBtn = edit + IDcontent;}
										deleteBtn = del + IDcontent + '/' + IDpage ;
							
							//creating the rows 
							html += '<tr>'+
										'<td>'+data[i].rowOrder+
										'<span class="arrow">'+
											'<a href="javascript:;" class="item-up" id="btnUp"  data="'+data[i].contentID+'">&#8679;</a>'+
										'</span>'+ 
										'<span class="arrow">'+
											'<a href="javascript:;" class="item-down" id="btnDown"   data="'+data[i].contentID+'">&#8681;</a>'+
										'</span> </td>'+
										'<td>'+data[i].cDescription+'</td>'+
										'<td>'+data[i].compare1+'</td>'+
										'<td>'+data[i].compare2+'</td>'+
										'<td><a href="'+editBtn+'" class="custom_button btn neutral"> Edit </a></td>'+ 
										'<td><a href="javascript:;" class="custom_button btn red item-delete" data="'+data[i].contentID+'"> Delete </a></td>'+ 
									'</tr>';
									
						}
						
						$('#showdata').html(html);
						console.log(data);
					},
					error: function(){
						alert('Could not get Data from Database');
					}
				}); 
				

			}
			
			//delete
			$('#showdata').on('click', '.item-delete', function(){
				var id = $(this).attr('data');
				$('#deleteModal').modal('show');

				$('#btnDelete').click(function(){
					$.ajax({
						type:'ajax',
						method:'get',
						async: false,
						url:'<?php echo base_url() ?>deleteRow',
						data:{id:id},
						dataType: 'json',
						success:function(response){
							if(response.success){
								$('#deleteModal').modal('hide');
								$('alert-success').html('Row Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
								showAllRows();
							}else{
								alert('error');
							}

						},
						error:function(){
							alert('error deleting');
						}
					});	
				});
			});
			
			//move row up 
			$('#showdata').on("click", ".item-down", function(){
				var id = $(this).attr('data');
				});
			$(document).on("click", ".item-down", function(){
				var id = $(this).attr('data');
				$.ajax({
					type:'ajax',
					method:'get',
					async: false,
					url:'<?php echo base_url() ?>rowUp',
					data:{id:id},
					dataType: 'json',
					success:function(response){
							if(response.success){
								$('alert-success').html('Row moved successfully').fadeIn().delay(4000).fadeOut('slow');
								showAllRows();
							}else{
								alert('error');
							}

						},
						error:function(){
							alert('error moving row');
						}
				});
			});
			
			//move row down
			
			$(document).on("click", ".item-up", function(){
				var id = $(this).attr('data');
				$.ajax({
					type:'ajax',
					method:'get',
					async: false,
					url:'<?php echo base_url() ?>rowDown',
					data:{id:id},
					dataType: 'json',
					success:function(response){
							if(response.success){
								$('alert-success').html('Row moved successfully').fadeIn().delay(4000).fadeOut('slow');
								showAllRows();
							}else{
								alert('error');
							}

						},
						error:function(){
							alert('error moving row');
						}
				});
			});

		});
		
		
	</script>
	