<?php
    class C_register
    {
        
        function register()
        {
            include('models/m_user.php');
            $m_user = new M_user();
            if(isset($_POST['register']))
            {
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];
                $pwd_cfrm = $_POST['pwd_cfrm'];
                $status = 0;
                $access_code = md5($pwd);
                $level = 'Customer';
                if($pwd_cfrm == $pwd){
                    if(!$m_user->emailExists($email))
                    {
                        $hash = password_hash($pwd, PASSWORD_BCRYPT);
                        if($m_user->addUser($email,$hash,$status,$access_code,$level)){
                            $send_to_email = $email;
                            $body="Hi {$send_to_email}.<br /><br />";
                            $body.="Please click the following link to verify your email and login: http://localhost:8888/new/verify.php/?access_code={$access_code}";
                            $subject="Verification Email";
                            if($this->sendEmailViaPhpMail($send_to_email, $subject, $body))
                                echo "<div class='alert alert-success'> Verification link was sent to your email. Click that link to login. </div>";
                            else echo "<div class='alert alert-danger'> User was created but unable to send verification email. Please contact admin.</div>";
                        }
                        else echo "<div class='alert alert-danger'> Register Failed </div>";
                    }
                    else {
                        echo "<div class='alert alert-danger'>";
                            echo "The email you specified is already registered. Please try again or <a href='http://localhost:8888/new/login.php'>login.</a>";
                        echo "</div>";
                    }
                }
                else echo "<div class='alert alert-danger'>Xác nhận sai mật khẩu</div>";
            }
        }
        public function sendEmailViaPhpMail($send_to_email, $subject, $body){
    
            $from_name="OES";
            $from_email="ADMIN";
        
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "From: {$from_name} <{$from_email}> \n";
        
            if(mail($send_to_email, $subject, $body, $headers)){
                return true;
            }else{
                return false;
            }
        }
    }
?>