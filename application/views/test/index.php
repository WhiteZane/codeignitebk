	<h2><?php echo $title; ?></h2>

	<?php foreach ($test as $test_item): ?>

	        <h3><?php echo $test_item['title']; ?></h3>
	        <div class="main">
	                <?php echo $test_item['text']; ?>
	        </div>
	        <br /><br />

	<?php endforeach; ?>