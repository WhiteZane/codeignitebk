
<?php
print_r($page_item);
?>
<div class="gridContainer clearfix">
	<div class="hero" ><img src = "<?php echo site_url(); ?>Images/Logosmall.png" alt="LindseyJones"></div>
	<div class="contact"><a href="http://www.lindsey-jones.com">Home</a> | <a href="http://www.lindsey-jones.com/Selfstudy.html">LindseyJones Product Catalog</a></div>
	<div class="title"><?php echo $page_item['pageHeaderTitle']; ?>
		
	</div>
	<div class="tableCNT">
	  	<table class="comparetable">
	  		<tr>
	      	<td>&nbsp;<?php echo $page_item['pRowDescription'];?></td>
	      	<td><?php echo $page_item['pTableCompare1'];?></td>
	      	<td><?php echo $page_item['pTableCompare2'];?></td>
	    	</tr>

			<?php if(isset($page_item)) {
     			foreach ($page_item as $value):  ?>

	    		<tr>
	        		<td><?php echo $page_item['cDescription']; ?></td>
	                	<td><?php echo $page_item['compare1']; ?></td>
	                	<td><?php echo $page_item['compare2']; ?></td>
	          	</tr> 

			 <?php endforeach;} ?> 

		</table>
	</div>

</div>
	<div class="foot"><?php echo $page_item['pageFooter']; ?></div>