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
<script type = 'text/javascript' src = "<?php echo site_url(); ?>_js/jscolor.js"></script>  
<style >
	form{margin-left:50px;
      margin-bottom: 25px;
  }
  
</style>
<h1><?php echo $title; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('create'); ?>
	
	<!--Builds the outside of the page -->
    <h2>Page Name (url)</h2><br />
    <input type="input" name="pageName" /><br /><br />

    <h2> Page Header</h2><br />
    <textarea name="pageHeaderTitle"></textarea><br /><br />
    <div class="pageRow_style">
      <div class="pageColumn_style">
        <h2>Title column 0 (default is null)</h2><br />
        <textarea type="input" name="pRowDescription" ></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <h2>Title column 1</h2><br />
        <textarea name="pTableCompare1" ></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <h2>Title column 2</h2><br />
        <textarea name="pTableCompare2" /></textarea><br /><br />
      </div>
    </div>
    <div class="pageRow_style">
      <div class="pageColumn_style">
        <h2> Page Footer<h2><br />
        <textarea name="pageFooter"></textarea><br /><br />
      </div>
        <div class="pageColumn_style">
          <table style="border:2px solid black; width:580px; margin-top: 40px; margin-bottom: 40px;">
            <h2>Pick table colors</h2>
            <tr id="styleHead">
              <th>Header</th>
              <th>preview</th>
              <th>colors</th>
            </tr>
            
            <tr id="styleRow">
              <td>Row 1</td>
              <td>preview</td>
              <td>colors</td>
            </tr>
            <tr id="styleRow2">
              <td>Row 2</td>
              <td>preview</td>
              <td>colors</td>
            </tr>
            <p> (Only sets row color.) </p>
          </table>

          <p>
            Header:
            <input name="headColor" type="hidden" id="color_value" value="F5F5F5">
            <button class="jscolor {valueElement:'color_value', styleElement:'styleHead'}" >Pick a color</button></p>
           <p>
            First Row:
            <input name="rowColor" type="hidden" id="color_value1" value="FAFCFD">
            <button class="jscolor {valueElement:'color_value1', styleElement:'styleRow'}" >Pick a color</button></p>
            <p>Second Row:
            <input name="rowColor2" type="hidden" id="color_value2" value="E7F5F8">
            <button class="jscolor {valueElement:'color_value2', styleElement:'styleRow2'}">Pick a color</button>
            

          </p>
          <br /><br />

          

        </div>
      </div>
    <input type="submit" name="submit" value="Build compare page" />

</form>

