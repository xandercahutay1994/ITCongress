<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>    
</head>
<body>
<?php
    include('../../models/PaymentModel.php');
    $payment = new PaymentModel();
    $message = "Error deleting";
    if(isset($_GET['payment_id']) && isset($_GET['student_id'])){
        $payment_id = $_GET['payment_id'];
        $student_id = $_GET['student_id'];
        $ok = $payment -> deletePayment('payment_id',$payment_id);
        $oka = $payment -> updateTshirtTicket(array("student_tshirt","student_ticket"),array(0,0),"student_id",$student_id);
        echo "<span id='low'></span>";
        echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/PaymentView.php';},500);</script>";
        echo "<script>toastr.success('Deleted Successfully!');</script>";
    }
?>
</body>
</html>