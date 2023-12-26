<?php
    ob_start();
    require_once 'DB.php';
    
    // $_POST["name"] = 'Stellar Infosys';
    // $_POST["email"] = 'infosysstellar@gmail.com';
    // $_POST["password"] = '123456';
    // $_POST["mobile"] = '7021912919';
    error_log(print_r($_POST,true));
    if(isset($_POST["name"]) && !empty($_POST["name"]) && 
    isset($_POST["email"]) && !empty($_POST["email"]) &&
    isset($_POST["password"]) && !empty($_POST["password"])&&
    isset($_POST["mobile"]) && !empty($_POST["mobile"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $created_on = date("Y-m-d H:i:s");
        
        
        $pass = $_POST['password'];
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));	
        $password = hash('sha256', $pass . $salt); 
        for($round = 0; $round < 65536; $round++) 
        { 
        	$password = hash('sha256', $password . $salt); 
        }
        $hash = $password;
        
        $sql = "INSERT INTO register(name,email,mobile,hash,salt,created_on) VALUES ('$name','$email','$mobile','$hash','$salt','$created_on')";
        if (!mysqli_query($conn, $sql)) {
            $data["response"]='n';
            $data['error'] = TRUE;
            $data["message"]='Data not inserted';
            echo json_encode($data);
        }else{
            $data['response']="y";
            $data['error']=FALSE;
            $data["message"]='Registration successful';
            echo json_encode($data);
        }
    }
    else{
        $data["response"]='n';
        $data['error'] = TRUE;
        $data["message"]='All field required';
        echo json_encode($data);
    }
?>