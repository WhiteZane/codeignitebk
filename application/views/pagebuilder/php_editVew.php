<?php if(isset($page_item)) {
     			foreach ($page_item as $content ):  ?>
	    		<tr>
	    			<td><?php echo (isset($content['rowOrder'])) ? $content['rowOrder'] : " "; ?></td>
	        		<td><?php echo (isset($content['cDescription'])) ? $content['cDescription'] : " "; ?></td>
	                	<td><?php echo (isset($content['compare1'])) ? $content['compare1'] : " "; ?></td>
	                	<td><?php echo (isset($content['compare2'])) ? $content['compare2'] : " "; ?></td>
	                	<!-- check content ID and set it-->
	                	<?php $content['contentID'] = (isset($content['contentID'])) ? $content['contentID'] : 0; ?>
	                	<td><a class="custom_button btn neutral" 
	                		href="
	                		<?php 
	                			$edit = $content['contentID'];
	                			$IDpage = $page_item[0]['pageID'];
	                			if ($edit == 0 ){

	                			echo site_url('createRow/' . $IDpage);
	                			} else {
	                				echo site_url('editContent/'. $edit);
	                			}  
	                		?>"
	                		>
	                		Edit</a></td>
							
							<td><a onClick="return confirm('Are you sure you want to delete?')" class="custom_button btn red" 
	                		href="
	                		<?php 
	                			$delete = $content['contentID'];
	                			$IDpage = $page_item[0]['pageID'];
	                			if ($delete == 0 ){
	                				echo '#';
	                			} else {
	                				echo site_url('deleteContent/'.$delete.'/'. $IDpage);
	                			}  
	                		?>"
	                		>
	                		Delete</a></td>	                	
	                		
	          	</tr> 

			 <?php endforeach;} ?> 