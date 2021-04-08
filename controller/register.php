<?php
if(isset($_POST['submit'])){
    //Add Database connection
    require_once '../controller/database.php';
    require_once '../models/Student.php';
    require_once '../models/Database.php';

    //Instantiate Customer
    $cusstomer= new Customer();

    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['pswd'];
    $confirmPass=$_POST['confirmPswd'];

    //Customer Data
    $customerData =[
        'fname'=> $fname,
        'lname'=> $lname,
        'email'=> $email,
        'password'=> $password
    ];

    // Instantiate Customer
    $customer= new Customer();

    //if fields are empty
    if (empty($fname) ||empty($lname) || empty($email) || empty($password) || empty($confirmPass)){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/signUp.php";</script>';
        exit();
    }elseif(!preg_match("/^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}$/",$email)){
        echo '<script>alert("Invalid email")</script>';
        echo '<script>window.location.href = "../view/signUp.php";</script>';
        exit();
    }elseif($password !== $confirmPass){
        echo '<script>alert("Passwords do not match")</script>';
        echo '<script>window.location.href = "../view/signUp.php";</script>';
        exit();
    }else{
        //Customer Email
        $customerEmail=[
            'email'=>$email
        ];
        if($customer->getCustomerEmail($customerEmail)){
            echo '<script>alert("Username Taken")</script>';
            echo '<script>window.location.href = "../view/signUp.php";</script>';
            exit();
        }
        else{
            
            $hashedPass= password_hash($password, PASSWORD_DEFAULT);

            //Customer Data
            $customerData =[
                'fname'=> $fname,
                'lname'=> $lname,
                'email'=> $email,
                'password'=> $hashedPass
            ];
            
            //Add Customer To Do
            if($customer->addCustomer($customerData)){
                echo '<script>alert("Well Done. You have been registered successfully")</script>';
                echo '<script>window.location.href = "../view/signIn.php";</script>';
                exit();

            }
            else{
                header("Location: ../view/signUp.php?error=sqlerror1");
                exit();
            }
        }
        
    }
    
}

?>