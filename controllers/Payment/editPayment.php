<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>EDIT PAYMENT</title>
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>    
    <link href="../../css/w3.css" rel="stylesheet"/>    
</head>
<?php
    include('../../models/PaymentModel.php');
    $payment = new PaymentModel();
    if(isset($_GET['payment_id'])){
        $payment_id = $_GET['payment_id'];
        $stud_id = $_GET['student_id'];
        $ok = $payment -> getPayment('payment_id',$payment_id);
        $oks = $payment -> studentID('student_id',$stud_id);
        foreach($oks as $okay){
            $code = $okay['student_idno'];
            $id = $okay['student_id'];
        }
        if(isset($_POST['update'])){
            $receipt_id = $_POST['receipt_id'];
            $student_id = $_POST['student_id'];
            $tshirt = $_POST['tshirt'];
            $ticket = $_POST['ticket'];
            if($receipt_id == 0 || $tshirt == 0 || $ticket == 0)
            {
                echo "<span id='low'></span>";
                echo "<script>toastr.error('Fill all fields please.....Error Updating Payment!');</script>";
                echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/controllers/Payment/editPayment.php?payment_id=$payment_id&student_id=$stud_id';},1500);</script>";    
            }else{
                $oka = $payment -> edit(array("payment_receipt_id","tshirt","ticket"),array($receipt_id,$tshirt,$ticket),'payment_id',$payment_id);
                $oka = $payment -> updateTshirtTicket(array("student_tshirt","student_ticket"),array($tshirt,$ticket),"student_id",$student_id);
                echo "<span id='low'></span>";
                echo "<script>toastr.success('User Updated!');</script>";
                echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/PaymentView.php';},1500);</script>";
            }
        }
    }
    if(isset($_POST['cancel'])){
        echo "<script>window.location='http://localhost/itcongress/views/PaymentView.php';</script>";
    }
?>
<body>
    <form method="POST">
        <div style="width:600px;margin-top:100px;margin-left:500px;background-image:url('../../img/it23.jpg');" class="w3-container w3-card-2 w3-round">
            <center><h2 class="w3-text-white"> EDIT PAYMENT </h2></center>             
            </br>
            <?php 
                foreach($ok as $record){                
            ?>             
                <table>
                    <tr>
                        <td><label style="width:170px;margin-left:70px" class="w3-text-white"> Payment ID </label></td>
                        <td><input type="text" disabled style="width:130px;margin-left:30px" class="w3-input w3-grey w3-round-medium" value="<?php echo $record['payment_id']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px" class="w3-text-white">Receipt ID </label></td>
                        <td><input type="number" name="receipt_id" min="1" maxlength="11" style="width:270px;margin-left:30px" class="w3-input w3-round-medium w3-yellow w3-hover-sand" value="<?php echo $record['payment_receipt_id']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px" class="w3-text-white">Student ID </label></td>
                        <td><input type="number" name="student_idno" disabled min="1" style="width:270px;margin-left:30px" class="w3-input w3-grey w3-round-medium" value="<?php echo $code; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px" class="w3-text-white">Tshirt </label></td>
                        <td><input type="number" name="tshirt" min="1" style="width:130px;margin-left:30px" class="w3-input w3-yellow w3-hover-sand w3-round-medium" value="<?php echo $record['tshirt']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:70px" class="w3-text-white">Ticket </label></td>
                        <td><input type="number" name="ticket" min="1" style="width:130px;margin-left:30px" class="w3-input w3-yellow w3-round-medium w3-hover-sand" value="<?php echo $record['ticket']; ?>"/></td>
                        <td><input type="hidden" name="student_id" value="<?php echo $id; ?>"></td>
                        
                    </tr>
                </table>
                </br>
                </br>
                <div class="w3-center">
                    <button type="submit" id="register" name="update" class="w3-btn w3-green w3-round w3-hover-grey"> Update </button>
                    &nbsp &nbsp<button type="submit" name="cancel" class="w3-btn w3-red w3-round w3-hover-grey"> Cancel </button>
                </div>
                </br>
            <?php }?>
        </div> 
    </form>
</body>
</html>
    