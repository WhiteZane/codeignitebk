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

<?php echo form_open('editContent/'.$content_item['contentID']); ?>

    <!--Builds the compare rows -->
    
    <input type="hidden" name="pageID" value="<?php echo $content_item['pageID'];?>">

    <div class="pageRow_style">  
      <div class="pageColumn_style">
        <h2> Row description </h2><br />
        <textarea name="cDescription"><?php echo $content_item['cDescription'];?></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <h2> Compare column 1 item</h2><br />
        <textarea name="compare1"><?php echo $content_item['compare1'];?></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <h2> Compare column 2 item</h2><br />
        <textarea name="compare2"><?php echo $content_item['compare2'];?></textarea><br /><br />
      </div>
    </div>
    <input class="custom_button neutral btn" type="submit" name="submit" value="Submit Edit" />

</form>