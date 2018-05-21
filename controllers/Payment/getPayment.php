<?php
    include('../../models/PaymentModel.php');
    $payment = new PaymentModel();
    if(isset($_GET['payment_id'])){
        $payment_id = $_GET['payment_id'];
        $ok = $payment -> getPayment('payment_id',$payment_id);       
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>EDIT PAYMENT</title>
    <link href="../../css/w3.css" rel="stylesheet"/>    
</head>
<body>
    <form method="POST">
        <div style="width:600px;margin-top:100px;margin-left:500px" class="w3-container w3-grey w3-card-2 w3-round">
            <center><h2> VIEW PAYMENT </h2></center>             
            </br>
            <?php 
                foreach($ok as $record){                
            ?>             
                <table>
                    <tr>
                        <td><label style="width:170px;margin-left:70px"> Payment ID </label></td>
                        <td><input type="text" disabled style="width:150px;margin-left:30px" class="w3-input w3-round-medium w3-sand" value="<?php echo $record['payment_id']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px">Receipt ID </label></td>
                        <td><input type="text" disabled name="receipt_id" style="width:270px;margin-left:30px" class="w3-input w3-round-medium w3-sand" value="<?php echo $record['payment_receipt_id']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px">Student ID </label></td>
                        <td><input type="text" disabled name="student_id" style="width:270px;margin-left:30px" class="w3-input w3-round-medium w3-sand" value="<?php echo $record['student_id']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px">Tshirt </label></td>
                        <td><input type="text" disabled name="tshirt" style="width:150px;margin-left:30px" class="w3-input w3-round-medium w3-sand" value="<?php echo $record['tshirt']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px">Ticket </label></td>
                        <td><input type="text" disabled name="ticket" style="width:150px;margin-left:30px" class="w3-input w3-round-medium w3-sand" value="<?php echo $record['ticket']; ?>"/></td>
                    </tr>
                </table>
            <?php }?>
            </br>
            </br>
            <center><a href="http://localhost/itcongress/views/PaymentView.php"><img src="../../img/back.png" width="80px"></img></a></center>
            </br>
        </div>
    </form>
</body>
</html>
    