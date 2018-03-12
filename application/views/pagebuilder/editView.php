
<?php
//print_r($page_item);
//print_r($page_content);
if (isset($this->session->userdata['logged_in'])) {
  $username = 'admin';
  } else {
  $newURL = 'http://rtcompare.com/';
  header('Location: '.$newURL);
 
}
?>

<div class="gridContainer clearfix">
	<div class="hero" ><img src = "<?php echo site_url(); ?>Images/Logosmall.png" alt="LindseyJones"></div>
	<br /><a class="button" href="<?php echo site_url('adminController'); ?>"><button>Pages Archive</button></a><br />
	<br /><a class="button" href="<?php echo site_url('editPage/'.$page_item[0]['pageID']); ?>"><button>Edit Page</button></a><br />
	
	
	<div class="title"><?php echo $page_item[0]['pageHeaderTitle']; ?>	
	</div>
	<div class="tableCNT">
	  	<table class="comparetable">
	  		<tr>
	      	<td>&nbsp;<?php echo $page_item[0]['pRowDescription'];?></td>
	      	<td><?php echo $page_item[0]['pTableCompare1'];?></td>
	      	<td><?php echo $page_item[0]['pTableCompare2'];?></td>
	    	</tr>

			<?php if(isset($page_item)) {
     			foreach ($page_item as $content ):  ?>

	    		<tr>
	        		<td><?php echo (isset($content['cDescription'])) ? $content['cDescription'] : " "; ?></td>
	                	<td><?php echo (isset($content['compare1'])) ? $content['compare1'] : " "; ?></td>
	                	<td><?php echo (isset($content['compare2'])) ? $content['compare2'] : " "; ?></td>
	                	<!-- check content ID and set it-->
	                	<?php $content['contentID'] = (isset($content['contentID'])) ? $content['contentID'] : 0; ?>
	                	<td><a class="button" 
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
	                		<button>Edit</button></a></td>
							
							<td><a onClick="return confirm('Are you sure you want to delete?')" class="button" 
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
	                		<button>Delete</button></a></td>	                	
	                		
	          	</tr> 

			 <?php endforeach;} ?> 

		</table>
		<a class="button" href="<?php echo site_url('createRow/' .$page_item[0]['pageID']) ?>"><button>Add Rows</button></a>
	</div>

</div>
	<div class="foot"><?php echo $page_item[0]['pageFooter']; ?></div>