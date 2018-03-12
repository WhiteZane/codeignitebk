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
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('create'); ?>
	
	<!--Builds the outside of the page -->
    <label for="pageName">Page Name (url)</label><br />
    <input type="input" name="pageName" /><br /><br />

    <label for="pageHeaderTitle"> Page Header</label><br />
    <textarea name="pageHeaderTitle"></textarea><br /><br />
    <div class="pageRow_style">
      <div class="pageColumn_style">
        <label for="pRowDescription">Title column 0 (default is null)</label><br />
        <textarea type="input" name="pRowDescription" ></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <label for="pTableCompare1">Title column 1</label><br />
        <textarea name="pTableCompare1" ></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <label for="pTableCompare2">Title column 2</label><br />
        <textarea name="pTableCompare2" /></textarea><br /><br />
      </div>
    </div>
    <div class="pageRow_style">
      <div class="pageColumn_style">
        <label for="pageFooter"> Page Footer</label><br />
        <textarea name="pageFooter"></textarea><br /><br />
      </div>
        <div class="pageColumn_style">
          <p>
            Header:
            <input name="color" type="hidden" id="color_value" onchange="update(this.color_value)" value="FAFCFD">
            <button class="jscolor {valueElement:'color_value', styleElement:'styleRow'}" >Pick a color</button></p>
           <p>
            First Row:
            <input name="color2" type="hidden" id="color_value" onchange="update(this.color_value)" value="FAFCFD">
            <button class="jscolor {valueElement:'color_value', styleElement:'styleRow'}" >Pick a color</button></p>
            <p>Second Row:
            <input name="color3" type="hidden" id="color_value2" onchange="update2(this.color_value2)" value="E7F5F8">
            <button class="jscolor {valueElement:'color_value2', styleElement:'styleRow2'}">Pick a color</button>
          </p>
          <br /><br />

          <table style="border:2px solid black; width:300px;">
            <tr>
              <th>Column 0</th>
              <th>Column 1</th>
              <th>Column 2</th>
            </tr>
            
            <tr class="styleRow">
              <td>Test</td>
              <td>Test</td>
              <td>Test</td>
            </tr>
            <tr class="styleRow2">
              <td>Test</td>
              <td>Test</td>
              <td>Test</td>
            </tr>
            <tr class="styleRow">
              <td>Test</td>
              <td>Test</td>
              <td>Test</td>
            </tr>
            <tr class="styleRow2">
              <td>Test</td>
              <td>Test</td>
              <td>Test</td>
            </tr>

          </table>

        </div>
      </div>
    <input type="submit" name="submit" value="Build compare page" />

</form>

