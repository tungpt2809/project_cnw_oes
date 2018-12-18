<?php
include_once('public/layout/layout_head.php');
include('controllers/c_login.php');
$c_login = new C_login();
$c_login->login();
?>
    <form action= "" method="POST">
        <h3>Login</h3>        
        <input placeholder="Email" type="text" required="" name="email">
        <input placeholder="Password" type="password" required="" name="pwd">
        <a href="register.php" style="margin-left: 22px;">Do not have account? Sign Up</a>
        <br/>
        <button type="submit" name="login">Lest's GO</button>
    </form>
<?php include_once('public/layout/layout_foot.php');?>