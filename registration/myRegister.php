<?php

class myRegister
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $link;

    function __construct()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "picsellplanet_database";

        $this->link = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );
        if (mysqli_connect_errno()) {
            $log = "MySQL Error: " . mysqli_connect_error();
            exit($log);
        }
    }

    function __destruct()
    {
        if (isset($this->link)) {
            mysqli_close($this->link);
        }
    }

    public function checkIfUserExist($data_type, $data)
    {
        $dt = 'user_'.$data_type;
        $user_exist_query = "SELECT * FROM `tbl_user_account` WHERE `$dt` = '$data' ";
        $result = mysqli_query($this->link, $user_exist_query);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch[$dt] == $data)
                {
                    #error if the data is already registered
                    return true;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return "Something went wrong, Please try again";
        }
    }

    public function insertLensmanData($user_type, $fullname, $email, $user_sex, $address, $birthday, $contact_num, $id_type, $id_image_path, $bLicense_path, $pfp_image_path, $hashed_password, $v_code)
    {
        $user_type = mysqli_real_escape_string($this->link, $user_type);
        $fullname = mysqli_real_escape_string($this->link, $fullname);
        $email = mysqli_real_escape_string($this->link, $email);
        $address = mysqli_real_escape_string($this->link, $address);
        $user_sex = mysqli_real_escape_string($this->link, $user_sex);
        $birthday = mysqli_real_escape_string($this->link, $birthday);
        $contact_num = mysqli_real_escape_string($this->link, $contact_num);
        $id_type = mysqli_real_escape_string($this->link, $id_type);
        /*$idImgData = addslashes(file_get_contents($id_image_path));
        $bLicenseImgData = addslashes(file_get_contents($bLicense_path));
        $pfpImgData = addslashes(file_get_contents($pfp_image_path));*/
        $id_image_path = mysqli_real_escape_string($this->link, $id_image_path);
        $bLicense_path = mysqli_real_escape_string($this->link, $bLicense_path);
        $pfp_image_path = mysqli_real_escape_string($this->link, $pfp_image_path);
        $hashed_password = mysqli_real_escape_string($this->link, $hashed_password);
        $v_code = mysqli_real_escape_string($this->link, $v_code);

        $qstr = "INSERT INTO `tbl_user_account`(`user_name`, `user_email`, `user_type`, `user_address`, `user_sex`, `user_birthday`, `user_contact`, `user_id_type`, `user_id_image`, `user_business_license_image`, `user_profile_image`, `user_password`, `user_verification_code`) 
        VALUES ('$fullname', '$email', '$user_type', '$address', '$user_sex', '$birthday', '$contact_num', '$id_type', '$id_image_path', '$bLicense_path', '$pfp_image_path', '$hashed_password', '$v_code')";
        return mysqli_query($this->link, $qstr);
    }

    public function insertCustomerData($user_type, $fullname, $email, $user_sex, $address, $birthday, $contact_num, $pfp_image_path, $hashed_password, $v_code)
    {
        $user_type = mysqli_real_escape_string($this->link, $user_type);
        $fullname = mysqli_real_escape_string($this->link, $fullname);
        $email = mysqli_real_escape_string($this->link, $email);
        $address = mysqli_real_escape_string($this->link, $address);
        $user_sex = mysqli_real_escape_string($this->link, $user_sex);
        $birthday = mysqli_real_escape_string($this->link, $birthday);
        $contact_num = mysqli_real_escape_string($this->link, $contact_num);
        //$pfpImgData = addslashes(file_get_contents($pfp_image_path));
        $pfp_image_path = mysqli_real_escape_string($this->link, $pfp_image_path);
        $hashed_password = mysqli_real_escape_string($this->link, $hashed_password);
        $v_code = mysqli_real_escape_string($this->link, $v_code);

        $qstr = "INSERT INTO `tbl_user_account`(`user_name`, `user_email`, `user_type`, `user_address`, `user_sex`, `user_birthday`, `user_contact`, `user_id_type`, `user_id_image`, `user_business_license_image`, `user_profile_image`, `user_password`, `user_verification_code`) 
        VALUES ('$fullname', '$email', '$user_type', '$address', '$user_sex', '$birthday', '$contact_num', NULL, NULL, NULL, '$pfp_image_path', '$hashed_password', '$v_code')";
        return mysqli_query($this->link, $qstr);
    }
}