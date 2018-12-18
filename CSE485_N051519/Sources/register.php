<?php 
    include('public/layout/layout_head.php');
    include('controllers/c_register.php');
    $c_register = new C_register();
    $c_register->register();
?>

<form action="" method="POST">
    <h3>Sign Up</h3>
    <input placeholder="Email" type="text" required="" name="email">
    <input placeholder="Password" type="password" required="" name="pwd">
    <input placeholder="Confirm Password" type="password" required="" name="pwd_cfrm">
    <button type="submit" name="register">Sign Up</button>
</form>

<?php include('public/layout/layout_foot.php');