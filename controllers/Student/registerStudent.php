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
<?php
    include('../../models/StudentModel.php');
    $student = new StudentModel();
    if(isset($_POST['register'])){
        $idno = $_POST['idno'];
        $fname = $_POST['familyname'];
        $givenname = $_POST['givenname'];
        $course_code = $_POST['course_code'];
        $level = $_POST['level'];
        $card_code = $_POST['card_code'];
        $size = $_POST['size'];
        if($idno == 0 || $fname == "" || $givenname == "" || $course_code == "" || $card_code == "" || $level == 0 || $size == "")
        {
            echo "<span id='low'></span>";
            echo "<script>toastr.error('Fill all fields please.....Error Adding Student!');</script>";
            echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/student/StudentAdd.php';},1500);</script>";    
        }else{
            $ok = $student -> addStudent(array("",$idno,$fname,$givenname,$course_code,$level,0,0,0,$card_code,$size));
            echo "<span id='low'></span>";
            echo "<script>toastr.success('Successfully Added Student!');</script>";
            echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/StudentView.php';},1500);</script>";    
        }
    }else
    if(isset($_POST['cancel'])){
        echo "<script>window.location='http://localhost/itcongress/views/StudentView.php';</script>"; 
    }
?>

</html>