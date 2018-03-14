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
    h1 {
    margin-top: 25px;
    margin-bottom: 25px;
    margin-left: 25px;
  }

</style>
<h1><?php echo $title; ?></h1>

<?php echo validation_errors(); ?>

<?php echo form_open('editPage/'.$page_item['pageID']); 
  //print_r($page_item);
  //set colors
  $page_item['headColor'] = (isset($page_item['headColor'])) ? $page_item['headColor'] : 'F5F5F5';
  $page_item['rowColor'] = (isset($page_item['rowColor'])) ? $page_item['rowColor'] : 'FAFCFD';
  $page_item['rowColor2'] = (isset($page_item['rowColor2'])) ? $page_item['rowColor2'] : 'E7F5F8';
  $getHeadColor = $page_item['headColor'];
  $getRowColor = $page_item['rowColor']; 
  $getRowColor2 = $page_item['rowColor2']; 

 /* print_r($getHeadColor);
  print_r($getRowColor);
  print_r($getRowColor2);*/

?>
    
    <!--Builds the outside of the page -->
    <h2>Page Name (url)</h2><br />
    <input type="input" name="pageName" value="<?php echo $page_item['pageName'];?>" /><br /><br />

    <h2> Page Header</h2><br />
    <textarea name="pageHeaderTitle"><?php echo $page_item['pageHeaderTitle'];?></textarea><br /><br />

    <div class="pageRow_style">
      <div class="pageColumn_style">
        <h2>Title Description column 0<br />(normally empty)</h2><br />
        <textarea type="input" name="pRowDescription"><?php echo $page_item['pRowDescription'];?></textarea><br /><br />
      </div>

      <div class="pageColumn_style">
        <h2>Compare Title column 1</h2><br />
        <textarea name="pTableCompare1" ><?php echo $page_item['pTableCompare1'];?></textarea><br /><br />
      </div>
      <div class="pageColumn_style">
        <h2>Compare Title column 2</h2><br />
        <textarea name="pTableCompare2"/><?php echo $page_item['pTableCompare2'];?></textarea><br /><br />
      </div>
      </div>
        <div class="pageRow_style">
      <div class="pageColumn_style">
        <h2> Page Footer<h2><br />
        <textarea name="pageFooter"><?php echo $page_item['pageFooter'];?></textarea><br /><br />
      </div>
      <!-- start color picker -->
        <div class="pageColumn_style">
          <table style="border:1px solid grey; width:580px; margin-top: 40px; margin-bottom: 40px;">
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

          </table>
          <p>
            Header:
            <input name="headColor" type="hidden" id="color_value" value="<?php echo  $getHeadColor; ?>" >
            <button class="jscolor {valueElement:'color_value', styleElement:'styleHead'}" >Pick a color</button></p>
           <p>
            First Row:
            <input name="rowColor" type="hidden" id="color_value1" value="<?php echo $getRowColor; ?>" >
            <button class="jscolor {valueElement:'color_value1', styleElement:'styleRow'}" >Pick a color</button></p>
            <p>Second Row:
            <input name="rowColor2" type="hidden" id="color_value2" value="<?php echo $getRowColor2; ?>">
            <button class="jscolor {valueElement:'color_value2', styleElement:'styleRow2'}">Pick a color</button>
          </p>
          <br /><br />

          

        </div>
      </div>
    
    <input class="custom_button neutral btn" style="margin-bottom: 25px;" type="submit" name="submit" value="Save Changes" />

</form>