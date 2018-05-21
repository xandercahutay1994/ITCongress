<!doctype html>
<html>
<head>
    <title> IT CONGRESS 2018 </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>   
<?php
    include('../../models/CourseModel.php');
    $course = new CourseModel();
    $message = "Error deleting";
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $ok = $course -> deleteCourse('course_id',$course_id);
        echo "<span id='low'></span>";
        echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/CourseView.php';},500);</script>";
        echo "<script>toastr.success('Deleted Successfully!');</script>";
         
    }
?>
</head>
</html>