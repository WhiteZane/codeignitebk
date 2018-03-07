
<?php
//print_r($page_item);
//print_r($page_content);
?>

<div class="gridContainer clearfix">
	<div class="hero" ><img src = "<?php echo site_url(); ?>Images/Logosmall.png" alt="LindseyJones"></div>
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
	          	</tr> 

			 <?php endforeach;} ?> 

		</table>
	</div>

</div>
	<div class="foot"><?php echo $page_item[0]['pageFooter']; ?></div>