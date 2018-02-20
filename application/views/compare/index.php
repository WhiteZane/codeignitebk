<h2><?php echo $title; ?></h2>

<?php foreach ($compare as $compare_item): ?>

        <h3><?php echo $compare_item['title']; ?></h3>
        <div class="main">
                <?php echo $compare_item['compare1']; ?>
                <?php echo $compare_item['ljcompare']; ?>
        </div>
        <p><a href="<?php echo site_url('compare/'.$compare_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>

