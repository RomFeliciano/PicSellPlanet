<?php

    session_start();

    if(isset($_POST['login']))
    {
        require_once 'myLogin.php';
        $myLogin = new myLogin();

        $email = $_POST['email'];
        $password = $_POST['password'];

        if($myLogin->checkIfUserExist("email", $email))
        {
            if($myLogin->checkIfUserVerified($email))
            {
                $hashed_password = $myLogin->getData("password", $email);
                if(password_verify($password, $hashed_password))
                {
                    $type = $myLogin->getData("type", $email);
                    $id = $myLogin->getData("id", $email);
                    if($type === "Lensman")
                    {
                        echo '
                            <script>
                                alert ("Welcome User");
                            </script>
                        ';
                        $_SESSION['logged_in_lm']= true;
                        $_SESSION['user_id_lm']= $id;
                        $data = $myLogin->getAllData($email);
                        foreach($data as $key => $value)
                        {
                            if($key != 'user_password' && !is_numeric($key))
                                $_SESSION['login_'.$key] = $value;
                        }
                        header("location: ../user_functions/lensman/lensman_dashboard.php?page=home");
                    }
                    if($type === "Customer")
                    {
                        echo '
                            <script>
                                alert ("Welcome User");
                            </script>
                        ';
                        $_SESSION['logged_in_cm']= true;
                        $_SESSION['user_id_cm']= $id;
                        $data = $myLogin->getAllData($email);
                        foreach($data as $key => $value)
                        {
                            if($key != 'user_password' && !is_numeric($key))
                                $_SESSION['login_'.$key] = $value;
                        }
                        header("location: ../user_functions/customer/customer_dashboard.php?page=home");
                    }
                }
                else
                {
                    $_SESSION['alert_session']=true;
                    $_SESSION['alert_text_lg']="Wrong password";
                    header("location: ../login.php");
                }
            }
            else
            {
                $_SESSION['alert_session']=true;
                $_SESSION['alert_text_lg']="User is not verified";
                header("location: ../login.php");
            }
        }
        else
        {
            $_SESSION['alert_session']=true;
            $_SESSION['alert_text_lg']="User is not registered";
            header("location: ../login.php");
        }
    }