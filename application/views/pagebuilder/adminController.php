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
<br /><br />
<h1><?php echo $title; ?></h1>
<br />
<a class="custom_button btn" href="<?php echo site_url('create'); ?>">+ Add Page</a></p> 
<?php foreach ($page as $page_item): ?>
        <div class="pageView">
                <h3 class="pageName"><?php echo $page_item['pageName']; ?></h3>
                <div class="preview">
                        <?php echo $page_item['pageHeaderTitle']; ?>
                </div>
                <div class="control">
                        <p><a class="custom_button neutral btn" href="<?php echo site_url("{$page_item['slug']}"); ?>">View page</a>
                        <a class="custom_button neutral btn" href="<?php echo site_url('editView/'.$page_item['pageID']); ?>">Make changes</a>
                        <a onClick="return confirm('Are you sure you want to delete?')" class="custom_button red btn" 
                                                        href="<?php echo site_url('deletePage/'.$page_item['pageID']); ?>" 
                                                        >Delete</a></p> 
                        <p><a onClick="return confirm('<?php echo site_url("{$page_item['slug']}"); ?>')" class="custom_button neutral btn">Show URL</a></p>
                </div>
        </div>
<?php endforeach; ?>
<br /> <br /> <br />
