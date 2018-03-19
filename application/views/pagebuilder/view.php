
<?php
//print_r($page_item);
//print_r($page_content);

?>
<?php $imageLocation = (isset($page_item[0]['imgName'])) ? 'uploads/' .  $page_item[0]['imgName'] : ""; ?>
<style>
	.comparetable tr:nth-child(2n+3){
		background-color:#<?php echo (isset($page_item[0]['rowColor2'])) ? $page_item[0]['rowColor2'] : ""; ?>;	
	}
	.comparetable tr:nth-child(2n){
		background-color:#<?php echo (isset($page_item[0]['rowColor'])) ? $page_item[0]['rowColor'] : ""; ?>;
	}
	.comparetable tr:nth-child(1){
		background-color:#<?php echo (isset($page_item[0]['headColor'])) ? $page_item[0]['headColor'] : ""; ?>;
	}
</style>
<div class="gridContainer clearfix">
	<div class="hero" ><img src = "<?php echo site_url() . $imageLocation; ?>" alt="" ></div>
	
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
	                	<td><?php echo (isset($content['compare1']))? $content['compare1'] : " "; ?></td>
	                	<td><?php echo (isset($content['compare2']))? $content['compare2'] : " "; ?></td>
	          	</tr> 

			 <?php endforeach;} ?> 

		</table>
	</div>

</div>
	<div class="foot"><?php echo $page_item[0]['pageFooter']; ?></div>