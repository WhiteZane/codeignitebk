<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('compare/create'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />
    <br />
    <label for="compare1">Kettering compare</label>
    <textarea name="compare1"></textarea><br />
    <br />
    <label for="ljcompare">Lindsey Jones compare</label>
    <textarea name="ljcompare"></textarea><br />
    <br />
    <input type="submit" name="submit" value="Create compare item" />

</form>