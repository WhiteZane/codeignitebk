<style>form{margin-left:25px;}.red{color:red;}</style>
<h2><?php echo $title; ?></h2>

<?php echo '<div class="red">'. validation_errors() .'</div>'; ?>

<?php echo form_open(' '); ?>

    <label for="user">username</label><br />
    <input type="input" name="username" /><br />
    <br />
    <label for="pswd">password</label><br />
    <input type="password" name="password"></input><br />
    <br />
    <input type="submit" name="submit" value="Login" />

</form>
