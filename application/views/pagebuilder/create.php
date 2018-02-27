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

<?php echo form_open('pagebuilder/create'); ?>
	
	<!--Builds the outside of the page -->
    <label for="pageName">Page Name</label><br />
    <input type="input" name="pageName" /><br /><br />

    <label for="pageHeaderTitle"> Page Header</label><br />
    <textarea name="pageHeaderTitle"></textarea><br /><br />

    <label for="pRowDescription">Title Description column 0<br />(default is null)</label><br />
    <textarea type="input" name="pRowDescription" ></textarea><br /><br />

    <label for="pTableCompare1">Compare Title column 1</label><br />
    <textarea name="pTableCompare1" ></textarea><br /><br />

    <label for="pTableCompare2">Compare Title column 2</label><br />
    <textarea name="pTableCompare2" /></textarea><br /><br />

     <label for="pageFooter"> Page Footer</label><br />
    <textarea name="pageFooter"></textarea><br /><br />
    
    <input type="submit" name="submit" value="Build compare page" />

</form>