<style >
	body{margin-left:50px;}
</style>
<h2><?php echo $title; ?></h2>

<?php foreach ($page as $page_item): ?>

        <h3><?php echo $page_item['pageName']; ?></h3>
        <div class="main">
                <?php echo $page_item['pageHeaderTitle']; ?>
        </div>
        <p><a href="<?php echo site_url("pagebuilder/{$page_item['slug']}"); ?>">View page</a></p>
<?php endforeach; //{$page_item['pageID']}?>