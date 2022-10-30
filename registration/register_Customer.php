<?php

    require 'register_data_checker.php';

    function customer_add($user_type, $fullname, $email, $user_sex, $address, $birthday, $contact_num, $pfp_image_path, $password, $cPassword)
    {
        require_once 'myRegister.php';
        $myRegister = new myRegister();

        if($myRegister->checkIfUserExist("email", $email))
        {
            return "The email you've provided is already registered";
        }
        else
        {
            if(!validate_number($contact_num))
            {
                return "The number you've provided is not valid";
            }
            else
            {
                if(check_age($birthday))
                {
                    if(check_password("length", $password, $cPassword))
                    {
                        if(check_password("match", $password, $cPassword))
                        {
                            $v_code = bin2hex(random_bytes(16));
                            require_once 'email_verification.php';
                            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            if($myRegister->insertCustomerData($user_type, $fullname, $email, $user_sex, $address, $birthday, $contact_num, $pfp_image_path, $hashed_password, $v_code) && sendMail($email, $v_code))
                            {
                                return true;
                            }
                            else
                            {
                                return "Registration Failed";
                            }
                        }
                        else
                        {
                            return "Password does not match";
                        }
                    }
                    else
                    {
                        return "Password is too short";
                    }
                }
                else
                {
                    return "Your age has not met the requirements";
                }
            }
            
        }
    }