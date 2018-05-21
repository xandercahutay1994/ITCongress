<?php
    include('../../models/PaymentModel.php');
    $payment = new PaymentModel();
    $rows = json_encode($payment -> getAllPayment());
    echo $rows;//echo json_encode($rows); 
   // print_r($rows);
    return $rows;  
?>