<?php
    class C_login
    {
        function login()
        {
            include('models/m_user.php');
            $m_user = new M_user();
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];
                $emailExists = $m_user->emailExists($email);
                if($emailExists && password_verify($pwd, $m_user->pwd) && $m_user->status == 1)
                {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['access_level'] = $m_user->level;
                    if($user->access_level=='Admin'){
                        header("Location: http://localhost:8888/new/admin/index.php?action=login_success");
                    }
                    else{
                        header("Location: http://localhost:8888/new/index.php?action=login_success");
                    }
                }
                else {
                    echo "<div class='alert alert-danger' role='alert'>
                        Access Denied.<br />
                        Your username or password maybe incorrect
                        </div>";
                }
            }
        }
        

    }
?>