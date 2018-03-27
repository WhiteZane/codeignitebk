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

<?php 
  // find the last row from previous page 
  $lastRow = (isset(end($rows)['rowOrder'])) ? end($rows)['rowOrder'] : 0; 
  $lastRow += 1;
  ?>
<script type = 'text/javascript' src = "<?php echo site_url(); ?>_js/tinymce/tinymce.min.js"></script> 
<script type = 'text/javascript' src = "<?php echo site_url(); ?>_js/tiny.js"></script> 
<style >
	form{margin-left:25px;
      margin-bottom: 25px;
  }
     h1 {
    margin-top: 25px;
    margin-bottom: 25px;
    margin-left: 25px;
  }
</style>
<h1><?php echo $title; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('createRow'); ?>

    <!--Builds the compare rows -->
     <h2>Select Page Name</h2><br /><br />
      <select name="pageID">
        <option value='<?php echo $currentpage; ?>'><?php echo $selected; ?></option>
        <?php foreach ($page as $page_item): ?>
        <option value='<?php echo $page_item["pageID"]; ?>'><?php echo $page_item['pageName']; ?></option>
        <?php endforeach; ?>
      </select><br /><br />
    <div class="pageRow_style">  
      <div class="pageColumn_style">
        <h2> Row description </h2><br />
        <textarea name="cDescription"></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <h2> Compare column 1 item</h2><br />
        <textarea name="compare1"></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
      <h2> Compare column 2 item</h2><br />
      <textarea name="compare2"></textarea><br /><br />
      </div>
    </div>
      <input type="hidden" name="rowCount" value="<?php echo $lastRow?>">
      <input class="custom_button btn neutral" type="submit" name="submit" value="Build Row" />
     

</form>

