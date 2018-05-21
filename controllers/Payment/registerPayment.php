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
    include('../../models/PaymentModel.php');
    $payment = new PaymentModel();
    if(isset($_POST['register'])){
        $receipt_id = $_POST['receipt_id'];
        $tshirt = $_POST['tshirt'];
        $ticket = $_POST['ticket'];
        $stud_idno = $_POST['idno'];
        $stud_id = $_POST['stud_id'];
        if($receipt_id == 0 || $tshirt == 0 || $ticket == 0)
        {
            echo "<span id='low'></span>";
            echo "<script>toastr.error('Fill all fields please.....Error Adding Payment!');</script>";
            echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/payment/PaymentAdd.php';},1500);</script>";       
        }else{
            $ok = $payment -> addPayment(array("",$receipt_id,$stud_id,$tshirt,$ticket));
            $oka = $payment -> updateTshirtTicket(array("student_tshirt","student_ticket"),array($tshirt,$ticket),"student_idno",$stud_idno);
            echo "<span id='low'></span>";
            echo "<script>toastr.success('Successfully Added Payment!');</script>";
            echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/PaymentView.php';},1500);</script>";
        }
    }else
    if(isset($_POST['cancel'])){
        echo "<script>window.location='http://localhost/itcongress/views/PaymentView.php';</script> "; 
    }
?>
</html>