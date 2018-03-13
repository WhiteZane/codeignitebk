<?php
if (isset($this->session->userdata['logged_in'])) {
	$username = 'admin';
	} else {
	$newURL = 'http://rtcompare.com/';
	header('Location: '.$newURL);
        
}

?>
<style >
	body{margin-left:50px;}
</style>
<h2><?php echo $title; ?></h2>
<a class="button" href="<?php echo site_url('create'); ?>"><button>+ Add Page</button></a></p> 
<?php foreach ($page as $page_item): ?>

        <h3><?php echo $page_item['pageName']; ?></h3>
        <div class="main">
                <?php echo $page_item['pageHeaderTitle']; ?>
        </div>
        <p><a href="<?php echo site_url("{$page_item['slug']}"); ?>"><button>View page</button></a>
        <a class="button" href="<?php echo site_url('editView/'.$page_item['pageID']); ?>"><button>Make changes</button></a></p> 
        <p><a onClick="return confirm('<?php echo site_url("{$page_item['slug']}"); ?>')" class="button"><button>Show URL</button></a></p>
        <a onClick="return confirm('Are you sure you want to delete?')" class="button" 
                                        href="<?php echo site_url('deletePage/'.$page_item['pageID']); ?>" 
                                        ><button>Delete</button></a>
<?php endforeach; ?>
<br /> <br />
