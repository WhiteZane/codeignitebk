<style >
	body{margin-left:50px;}
</style>
<h2><?php echo $title; ?></h2>

<?php foreach ($page as $page_item): ?>

        <h3><?php echo $page_item['pageName']; ?></h3>
        <div class="main">
                <?php echo $page_item['pageHeaderTitle']; ?>
        </div>
        <p><a href="<?php echo site_url("pagebuilder/{$page_item['slug']}"); ?>"><button>View page</button></a>
        <a class="button" href="<?php echo site_url('pagebuilder/editView/'.$page_item['pageID']); ?>"><button>Edit</button></a></p> 
<?php endforeach; //{$page_item['pageID']}?>