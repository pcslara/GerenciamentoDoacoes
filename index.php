<html>
    <?php
        if(!isset($_SESSION)) session_start();
        if (isset( $_SESSION['loginerrormsg'])) {
            echo $_SESSION['loginerrormsg'];
            unset( $_SESSION['loginerrormsg']);
        }
        session_destroy();
    ?>  
	    <form role="form" action="auth/user/auth_user.php" method="post">
			<label  for="user">Username</label>
        	<input type="text" name="user" placeholder="Usernames..." id="form-username">
            <label for="pass">Password</label>
        	<input type="password" name="pass" placeholder="Password...">
            <button type="submit" >Sign in!</button>
	    </form>
    
    

</html>


