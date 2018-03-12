<?php 
 //check for login
  if (isset($this->session->userdata['logged_in'])) {
  $username = 'admin';
  } else {
  $newURL = 'http://rtcompare.com/';
  header('Location: '.$newURL);
}
  // test for page selection
  if (!empty($currentpage)){
    isset($currentpage);
    $selected = 'page selected';
  } else {
    $currentpage = 'select a page';
    $selected = 'select a page';
  }
?>
<script type = 'text/javascript' src = "<?php echo site_url(); ?>_js/tinymce/tinymce.min.js"></script> 
<script type = 'text/javascript' src = "<?php echo site_url(); ?>_js/tiny.js"></script> 
<style >
	form{margin-left:50px;
      margin-bottom: 25px;
  }
</style>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('createRow'); ?>

    <!--Builds the compare rows -->
     <label for="pageID">Select Page Name</label><br /><br />
      <select name="pageID">
        <option value='<?php echo $currentpage; ?>'><?php echo $selected; ?></option>
        <?php foreach ($page as $page_item): ?>
        <option value='<?php echo $page_item["pageID"]; ?>'><?php echo $page_item['pageName']; ?></option>
        <?php endforeach; ?>
      </select><br /><br />
    <div class="pageRow_style">  
      <div class="pageColumn_style">
        <label for="cDescription"> Row description </label><br />
        <textarea name="cDescription"></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <label for="compare1"> Compare column 1 item</label><br />
        <textarea name="compare1"></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
      <label for="compare2"> Compare column 2 item</label><br />
      <textarea name="compare2"></textarea><br /><br />
      </div>
    </div>
      <input type="submit" name="submit" value="Add compare item" />
     

</form>

