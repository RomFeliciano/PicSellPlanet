<?php

    session_start();

    if(isset($_POST['register']))
    {
        
        $user_type = $_POST['user_type'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $user_sex = $_POST['user_sex'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        $contact_num = $_POST['contact_num'];
        $pfp_upload = $_FILES['pfp_upload'];
        $password = $_POST['password'];
        $cPassword = $_POST['cPassword'];

        if($user_type=="Lensman")
        {
            require_once 'register_Lensman.php';

            $id_type = $_POST['id_type'];
            $id_upload = $_FILES['id_upload'];
            $bLicense_upload = $_FILES['bLicense_upload'];

            $files = array($id_upload, $bLicense_upload, $pfp_upload);
            $file_items = array($tmp_name1 = '' => $error1 = '', $tmp_name2 = '' => $error2 = '', $tmp_name3 = '' => $error3 = '');
            foreach($files as $f)
            {
                $tmp[] = $f['tmp_name'];
                $err[] = $f['error'];
            }

            if ($err[0] === 0  && $err[1] === 0 && $err[2] === 0) 
            {
                $foldernames = array("ID-images", "biz-license-img", "profile-images");
                foreach($tmp as $index => $f)
                {
                    $new_img_name = uniqid("IMG-", true) . ".png";
                    $path  = '../images/'. $foldernames[$index] ."/" . $new_img_name;
                    move_uploaded_file($f, $path);
                    $fPath= 'images/'. $foldernames[$index] ."/" . $new_img_name;
                    $new_paths[] = $fPath;
                }

                $a = lensman_add($user_type, $fullname, $email, $user_sex, $address, $birthday, $contact_num, $id_type, $new_paths[0], $new_paths[1], $new_paths[2], $password, $cPassword);
                if ($a == 1) 
                {
                    echo '
                            <script>
                                alert ("Success Lensman");
                            </script>
                        ';
                    header("location: ../login.php");
                } 
                else 
                {
                    foreach($new_paths as $path)
                    {
                        unlink($path);
                    }
                    $_SESSION['alert_session']=true;
                    $_SESSION['alert_text']=$a;
                    header("location: ../registration.php");
                }
            } 
            else 
            {
                echo '
                    <script>
                        alert ("Failed Lensman");
                        window.location.href="../registration.php";
                    </script>
                ';
            }
            //header("location: ../index.php");
        }
        if($user_type=="Customer")
        {
            require_once 'register_Customer.php';

            $tmp_name = $pfp_upload['tmp_name'];
            $error = $_FILES['pfp_upload']['error'];

            if ($error === 0) 
            {
                $new_img_name = uniqid("IMG-", true) . ".png";
                $new_path = '../images/profile-images/' . $new_img_name;
                move_uploaded_file($tmp_name, $new_path);

                $fPath = 'images/profile-images/' . $new_img_name;

                $a = customer_add($user_type, $fullname, $email, $user_sex, $address, $birthday, $contact_num, $fPath, $password, $cPassword);
                if ($a == 1) 
                {
                    echo '
                            <script>
                                alert ("Success Customer");
                            </script>
                        ';
                    header("location: ../login.php");
                } 
                else 
                {
                    unlink($new_path);
                    $_SESSION['alert_session']=true;
                    $_SESSION['alert_text_rg']=$a;
                    header("location: ../registration.php");
                }
            } 
            else 
            {
                echo '
                    <script>
                        alert ("Failed Customer");
                        window.location.href="../registration.php";
                    </script>
                ';
            }
            //header("location: ../index.php");
        }
    }
