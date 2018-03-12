<?php
  if (isset($this->session->userdata['logged_in'])) {
  $username = 'admin';
  } else {
  $newURL = 'http://rtcompare.com/';
  header('Location: '.$newURL);
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

<?php echo form_open('editPage/'.$page_item['pageID']); ?>
    
    <!--Builds the outside of the page -->
    <label for="pageName">Page Name (url)</label><br />
    <input type="input" name="pageName" value="<?php echo $page_item['pageName'];?>" /><br /><br />

    <label for="pageHeaderTitle"> Page Header</label><br />
    <textarea name="pageHeaderTitle"><?php echo $page_item['pageHeaderTitle'];?></textarea><br /><br />

    <div class="pageRow_style">
      <div class="pageColumn_style">
        <label for="pRowDescription">Title Description column 0<br />(default is null)</label><br />
        <textarea type="input" name="pRowDescription"><?php echo $page_item['pRowDescription'];?></textarea><br /><br />
      </div>

      <div class="pageColumn_style">
        <label for="pTableCompare1">Compare Title column 1</label><br />
        <textarea name="pTableCompare1" ><?php echo $page_item['pTableCompare1'];?></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <label for="pTableCompare2">Compare Title column 2</label><br />
        <textarea name="pTableCompare2"/><?php echo $page_item['pTableCompare2'];?></textarea><br /><br />
      </div>
      </div>
     <label for="pageFooter"> Page Footer</label><br />
    <textarea name="pageFooter"><?php echo $page_item['pageFooter'];?></textarea><br /><br />
    
    <input type="submit" name="submit" value="Edit compare page" />

</form>