<?php
//print_r($page_item);
//print_r($page_content);
?>

<div class="gridContainer clearfix">
	<div class="hero" ><img src = "<?php echo site_url(); ?>Images/Logosmall.png" alt="LindseyJones"></div>
	<div class="contact"><a href="http://www.lindsey-jones.com">Home</a> | <a href="http://www.lindsey-jones.com/Selfstudy.html">LindseyJones Product Catalog</a></div>
	<br /><a class="button" href="<?php echo site_url('index.php'); ?>"><button>Pages Archive</button></a><br />
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
	        		<td><?php echo $content['cDescription']; ?></td>
	                	<td><?php echo $content['compare1']; ?></td>
	                	<td><?php echo $content['compare2']; ?></td>
	                	<td><a class="button" href="<?php echo site_url('editContent/'.$content['contentID']); ?>"><button>Edit</button></a></td>
	          	</tr> 

			 <?php endforeach;} ?> 

		</table>
		<a class="button" href="<?php echo site_url('createRow/' .$content['pageID']) ?>"><button>Add Rows</button></a>
	</div>

</div>
	<div class="foot"><?php echo $page_item[0]['pageFooter']; ?></div>