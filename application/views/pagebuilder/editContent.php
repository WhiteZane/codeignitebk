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
</style>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('editContent/'.$content_item['contentID']); ?>

    <!--Builds the compare rows -->
    
    <input type="hidden" name="pageID" value="<?php echo $content_item['pageID'];?>">

    <div class="pageRow_style">  
      <div class="pageColumn_style">
        <label for="cDescription"> Row description </label><br />
        <textarea name="cDescription"><?php echo $content_item['cDescription'];?></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <label for="compare1"> Compare column 1 item</label><br />
        <textarea name="compare1"><?php echo $content_item['compare1'];?></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <label for="compare2"> Compare column 2 item</label><br />
        <textarea name="compare2"><?php echo $content_item['compare2'];?></textarea><br /><br />
      </div>
    </div>
    <input type="submit" name="submit" value="Submit Edit" />

</form>