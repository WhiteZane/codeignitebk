
<style>form{margin-left:25px;}.red{color:red;}</style>
<h2><?php echo $title; ?></h2>

<?php echo '<div class="red">'. validation_errors() .'</div>'; ?>

<?php echo form_open('compare/create'); ?>

    <label for="title">Title</label><br />
    <input type="input" name="title" /><br />
    <br />
    <label for="compare1">Kettering compare</label><br />
    <textarea rows="5" cols="100" name="compare1"></textarea><br />
    <br />
    <label for="ljcompare">Lindsey Jones compare</label><br />
    <textarea rows="5" cols="100" name="ljcompare"></textarea><br />
    <br />
    <input type="submit" name="submit" value="Create compare item" />

</form>