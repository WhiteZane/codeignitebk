<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = 'admin';
  } else {
  $newURL = 'http://rtcompare.com/';
  header('Location: '.$newURL);
}
?>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
 <script>
  tinymce.init({
  selector: 'textarea',
  height: 200,
  width: 500,
  plugins: 'codesample code',
  codesample_dialog_width: '400',
  codesample_dialog_height: '400',
  codesample_languages: [
        {text: 'HTML/XML', value: 'markup'},
        {text: 'JavaScript', value: 'javascript'},
        {text: 'CSS', value: 'css'},
        {text: 'PHP', value: 'php'},
        {text: 'Ruby', value: 'ruby'},
        {text: 'Python', value: 'python'},
        {text: 'Java', value: 'java'},
        {text: 'C', value: 'c'},
        {text: 'C#', value: 'csharp'},
        {text: 'C++', value: 'cpp'}
    ],
  toolbar: 'codesample code undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});
  </script>
<style >
    form{margin-left:50px;
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