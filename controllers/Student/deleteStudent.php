<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>    
</head>
<body>

</body>
</html>
<?php
    include('../../models/StudentModel.php');
    $student = new StudentModel();
    $message = "Error deleting";
    if(isset($_GET['student_id'])){
        $student_id = $_GET['student_id'];
        $ok = $student -> deleteStudent('student_id',$student_id);
        $oka = $student -> deleteForeignPayment('student_id',$student_id);
        echo "<span id='low'></span>";
        echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/StudentView.php';},500);</script>";
        echo "<script>toastr.success('Deleted Successfully!');</script>";
    }
?>