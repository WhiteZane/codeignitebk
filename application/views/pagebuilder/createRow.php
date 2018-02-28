<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
 <script>
  tinymce.init({
  selector: 'textarea',
  height: 400,
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
	form{margin-left:50px;}
</style>

<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('pagebuilder/createRow'); ?>

    <!--Builds the compare rows -->
     <label for="pageID">Select Page Name</label><br /><br />
      <select name="pageID">
        <?php foreach ($page as $page_item): ?>
            <option value='<?php echo $page_item["pageID"]; ?>'><?php echo $page_item['pageName']; ?></option>
        <?php endforeach; ?>
      </select><br /><br />

    <label for="cDescription"> Row description </label><br />
    <textarea name="cDescription"></textarea><br /><br />

    <label for="compare1"> Compare column 1 item</label><br />
    <textarea name="compare1"></textarea><br /><br />

    <label for="compare2"> Compare column 2 item</label><br />
    <textarea name="compare2"></textarea><br /><br />

    <input type="submit" name="submit" value="Add compare item" />

</form>

