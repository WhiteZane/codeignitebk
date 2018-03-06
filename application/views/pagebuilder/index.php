<style>form{
width:300px;
border:1px solid grey;
padding:2%;
margin:0 auto;
margin-top: 300px;}
.red{color:red;}</style>


<?php echo '<div class="red">'. validation_errors() .'</div>'; ?>

<?php echo form_open(' '); ?>
	
	<h2><?php echo $title; ?></h2>

    <label for="user">username</label><br />
    <input type="input" name="username" /><br />
    <br />
    <label for="pswd">password</label><br />
    <input type="password" name="password"></input><br />
    <br />
    <input type="submit" name="submit" value="Login" />

</form>
