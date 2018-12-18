<?php include_once('config/core.php');?>
<div class="container-fluid">
    <header>
        <div class="row">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="<?php echo $home_url; ?>">Online Examination</a>
                <ul class="navbar-nav ml-auto">
                    <?php 
                    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
                    ?>    
                        <li class="nav-item">
                            <a class="nav-link bgr-eee" href="<?php echo $home_url; ?>logout.php">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    <?php    
                    }else{
                    ?>
                        <li class="nav-item bgr-eee">
                            <a class="nav-link" href="<?php echo $home_url; ?>login.php">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item bgr-eee">
                            <a class="nav-link" href="<?php echo $home_url; ?>register.php">
                                <i class="fas fa-user-plus"></i> Sign Up
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    <header>
<div class="container-fluid">
