<?php
$a = session_id();
if(empty($a)) {
    exit();
    } 
        
?>
<h2>Success</h2>

<?php echo '<div class="red">'. validation_errors() .'</div>'; ?>

<?php echo form_open('compare/editAdmin'); ?>
    <input type="hidden" name="title" value="edit" /><br />
    <br />
    <input type="submit" name="submit" value="Edit page" />

</form>
<?php echo form_open('compare/create'); ?>
    <input type="hidden" name="title" value="create"/><br />
    <br />
    <input type="submit" name="submit" value="Create" />

</form>
