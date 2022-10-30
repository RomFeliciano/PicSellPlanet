<?php
    require ("../connection.php");

    if(isset($_GET['email']) && isset($_GET['v_code']))
    {
        //$query = "SELECT * FROM `tbl_lensmen_user` WHERE `email`= '$_GET[email]' AND `verification_code` = '$_GET[v_code]'";
        $query = "SELECT * FROM `tbl_user_account` WHERE `user_email`= '$_GET[email]' AND `user_verification_code` = '$_GET[v_code]'";
        $result = mysqli_query($con, $query);
        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['user_verified'] == 0)
                {
                    //$update = "UPDATE `tbl_lensmen_user` SET `is_verified` = '1' WHERE `email` = '$result_fetch[email]'";
                    $update = "UPDATE `tbl_user_account` SET `user_verified` = '1' WHERE `user_email` = '$result_fetch[user_email]'";
                    if(mysqli_query($con, $update))
                    {
                        echo "
                            <script>
                                alert('Email Verification Successful');
                                window.location.href='../login.php'
                            </script>
                        ";
                    }
                    else
                    {
                        echo "
                            <script>
                                alert('Cannot run query');
                                window.location.href='../login.php'
                            </script>
                        ";
                    }
                }
                else
                {
                    echo "
                        <script>
                            alert('Email is already verified');
                            window.location.href='../login.php'
                        </script>
                    ";
                }
            }
        }
        else
        {
            echo "
                <script>
                    alert('Cannot run query');
                    window.location.href='../index.php'
                </script>
            ";
        }
    }