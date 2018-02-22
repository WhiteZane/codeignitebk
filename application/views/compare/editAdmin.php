<?php
session_start();
$sid = session_id();
$sidcheck = session_id(md5('LindseyJones'));
if($sid !== $sidcheck) {
    $this->load->view('compare/fail');
    exit();
    } 
?>
<div class="gridContainer clearfix">
<div class="hero" ><img src = "<?php echo site_url(); ?>Images/Logosmall.png" alt="LindseyJones"></div>
<div class="contact"><a href="http://www.lindsey-jones.com">Home</a> | <a href="http://www.lindsey-jones.com/Selfstudy.html">LindseyJones Product Catalog</a></div>
<div class="title"><span class="suptext">2016 TMC and Clinical Simulation HomeStudy Course Comparison Chart</span><br/><span class ="lindsey">Lindsey</span><span class="jones">Jones</span><span class="tm">TM</span> <span class="kettering">vs. Kettering National Seminars</span><span class="tm">TM</span><br/><span class="subtext">Analysis completed May 11th, 2016</span></div>
<div class="tableCNT">
  <table class="comparetable">
    <tr>
      <td>&nbsp;</td>
      <td><span class="kettering">Kettering</span></td>
      <td><span class="lindsey">Lindsey</span><span class="jones">Jones</span></td>
    </tr>
<?php foreach ($compare as $compare_item): ?>
        <tr>
            <td><?php echo $compare_item['title']; ?></td>
            <td><?php echo $compare_item['compare1']; ?></td>
            <td><?php echo $compare_item['ljcompare']; ?></td>
            <td>
                <a  class="button" href="<?php echo site_url('compare/'.$compare_item['slug']); ?>"><button>View</button></a>
                <a class="button" href="<?php echo site_url('compare/edit/'.$compare_item['id']); ?>"><button>Edit</button></a> 
                <!-- <a href="<?php //echo site_url('compare/delete/'.$compare_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a> -->
            </td>
        </tr>
<?php endforeach; ?>
</table>