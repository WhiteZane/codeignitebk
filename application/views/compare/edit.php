<h2><?php echo $title; ?></h2>
 
<?php echo validation_errors(); ?>
 
<?php echo form_open('compare/edit/'.$compare_item['id']); ?>
    <table>
        <tr>
            <td><label for="title">Title</label></td>
            <td><input type="input" name="title" size="50" value="<?php echo $compare_item['title'] ?>" /></td>
        </tr>
        <tr>
            <td><label for="text">Text</label></td>
            <td><textarea name="compare1" rows="10" cols="40"><?php echo $compare_item['compare1'] ?></textarea></td>
        </tr>
        <tr>
            <td><label for="text">Text</label></td>
            <td><textarea name="ljcompare" rows="10" cols="40"><?php echo $compare_item['ljcompare'] ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Edit compare item" /></td>
        </tr>
    </table>
</form>