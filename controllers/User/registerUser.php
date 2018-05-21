<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>
</head>
<?php
    include('../../models/UserModel.php');
    $user = new UserModel();
    if(isset($_POST['register'])){
        $fname = $_POST['fullname'];
        $email = $_POST['email'];
        $pword = $_POST['password'];
        if($fname == "" || $email == "" || $pword == "")
        {
            echo "<span id='low'></span>";
            echo "<script>toastr.error('Fill all fields please.....Error Adding User!');</script>";
            echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/user/UserAdd.php';},1500);</script>";    
        }else{
            $ok = $user -> addUser(array("",$fname,$email,$pword));
            echo "<span id='low'></span>";
            echo "<script>toastr.success('Successfully Added User!');</script>";
            echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/UserView.php';},1500);</script>";
        }    
    }else
    if(isset($_POST['cancel'])){
        echo "<script>window.location='http://localhost/itcongress/views/UserView.php';</script>"; 
    }
    
?>
</html>