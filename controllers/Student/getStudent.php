<?php
    include('../../models/StudentModel.php');
    $student = new StudentModel();
    if(isset($_GET['student_id'])){
        $student_id = $_GET['student_id'];
        $ok = $student -> getStudent('student_id',$student_id);   
    }
    if(isset($_POST['cancel'])){
        echo "<script>window.location='http://localhost/itcongress/views/StudentView.php';</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>EDIT USER</title>
    <link href="../../css/w3.css" rel="stylesheet"/>    
</head>
<body>
    <form method="POST">
        <div style="width:1000px;margin-top:90px;margin-left:300px" class="w3-container w3-card-2 w3-round w3-grey" ng-app="app" ng-controller="ctrl">
           <center><h3> VIEW STUDENT </h3></center>             
            </br>
            <?php 
                foreach($ok as $record){                
            ?>  
                <table class="w3-table">
                    <tr>
                        <td><label style="margin-left:40px">ID Number </label></td>
                        <td><input type="text" style="width:170px;margin-left:-50px" disabled class="w3-input w3-round" value="<?php echo $record['student_idno']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px">Family Name </label></td>
                        <td><input type="text" style="width:240px;margin-left:-50px" disabled name="familyname" class="w3-input w3-round w3-sand" value="<?php echo $record['student_familyname']; ?>"/></td>
                        <td><label>Tshirt </label></td>
                        <td><input type="text" style="width:140px;margin-left:-50px" disabled name="tshirt" class="w3-input w3-round w3-sand" value="<?php echo $record['student_tshirt']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px">Given Name </label></td>
                        <td><input type="text" style="width:240px;margin-left:-50px" disabled name="givenname" class="w3-input w3-round w3-sand" value="<?php echo $record['student_givenname']; ?>"/></td>    
                        <td><label>Ticket </label></td>
                        <td><input type="text" style="width:140px;margin-left:-50px" disabled name="ticket" class="w3-input w3-round w3-sand" value="<?php echo $record['student_ticket']; ?>"/> </td>                   
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px">Course Code </label></td>
                        <td><input type="text" style="width:240px;margin-left:-50px" disabled name="card_code" class="w3-input w3-round w3-sand" value="<?php echo $record['student_course_id']; ?>"/></td>
                        <td><label>Size </label></td>
                        <td><input type="text" style="width:140px;margin-left:-50px" disabled name="ticket" class="w3-input w3-round w3-sand" value="<?php echo $record['student_tshirt_size']; ?>"/> </td>                   
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px">Student Level </label></td>
                        <td><input type="text" style="width:80px;margin-left:-50px" disabled name="level" class="w3-input w3-round w3-sand" value="<?php echo $record['student_level']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px">Card Code </label></td>
                        <td><input type="text" style="width:240px;margin-left:-50px" disabled name="card_code" class="w3-input w3-round w3-sand" value="<?php echo $record['student_card_code']; ?>"/></td>
                    </tr>
                    
                </table>
            <?php }?>
            </br>
            <center><a href="http://localhost/itcongress/views/StudentView.php"><img src="../../img/back.png" width="80px"></img></a></center>
            </br></br> 
    </form>
</body>
</html>
