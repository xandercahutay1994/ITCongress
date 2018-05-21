<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>
</head>
<body>

<?php
    include('../../models/CourseModel.php');
    //include('getMaxId.php');
    $course = new CourseModel();
    if(isset($_POST['register'])){
        $code = $_POST['code'];
        $name = $_POST['name'];
        if($code == "" || $name == "")
        {
            echo "<span id='low'></span>";
            echo "<script>toastr.error('Fill all fields please.....Error Adding Course!');</script>";
            echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/course/CourseAdd.php';},1500);</script>";    
        }else{
            $ok = $course -> addCourse(array("",$code,$name));
            echo "<span id='low'></span>";
            echo "<script>toastr.success('Successfully Added Course!');</script>";
            echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/CourseView.php';},1500);</script>";              
        }
    }else
    if(isset($_POST['cancel'])){
        echo "<script>window.location='http://localhost/itcongress/views/CourseView.php';</script>"; 
    }
    
?>
    
</body>
</html>