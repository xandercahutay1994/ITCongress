    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>EDIT STUDENT</title>
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/angular.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>    
    <link href="../../css/w3.css" rel="stylesheet"/>       
</head>
<?php
    include('../../models/StudentModel.php');  
    $student = new StudentModel();
    if(isset($_GET['student_id'])){
        $student_id = $_GET['student_id'];
        $course_id = $_GET['course_id'];
        $ok = $student -> getStudent('student_id',$student_id);    
        $oks = $student -> courseCode('student_course_id',$course_id);
        foreach($oks as $okay){
            $id = $okay['course_id'];
            $code = $okay['course_code'];
        }
        if(isset($_POST['update'])){
            $fname = $_POST['familyname'];
            $givenname = $_POST['givenname'];
            $course_code = $_POST['course_code'];
            $level = $_POST['level'];
            $card_code = $_POST['card_code'];
            $size = $_POST['size'];
            $attended = $_POST['attended'];  
            if($fname == "" || $givenname == "" || $course_code == "" || $card_code == "" || $level == 0  || 
                $attended == "" || $size == "")
            {
                echo "<span id='low'></span>";
                echo "<script>toastr.error('Fill all fields please.....Error Updating Student!');</script>";
                echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/controllers/Student/editStudent.php?student_id=$student_id&course_id=$course_id';},1500);</script>";    
            }else{
                $oka = $student -> edit(array("student_familyname","student_givenname","student_course_id","student_ticket","student_attended","student_card_code","student_tshirt_size"),array($fname,$givenname,$course_id,$level,$attended,$card_code,$size),'student_id',$student_id);
                echo "<span id='low'></span>";
                echo "<script>toastr.success('Student Updated!');</script>";
                echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/StudentView.php';},1500);</script>";
            }  
        }      
    }
    if(isset($_POST['cancel'])){
        echo "<script>window.location='http://localhost/itcongress/views/StudentView.php';</script>";
    }
    
?>
<body>
    <form method="POST">
    <div style="width:1000px;margin-top:90px;margin-left:300px;background-image:url('../../img/it23.jpg');" class="w3-container w3-card-2 w3-round">
            <center><h2 class="w3-text-white"> EDIT STUDENT </h2></center>             
            </br>
            <?php 
                foreach($ok as $record){                
            ?>  
                <table class="w3-table">
                    <tr>
                        <td><label style="margin-left:40px" class="w3-text-white">ID Number </label></td>
                        <td><input type="text" style="width:170px;margin-left:-40px" disabled class="w3-input w3-round-medium" value="<?php echo $record['student_idno']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px" class="w3-text-white">Family Name </label></td>
                        <td><input type="text" style="width:240px;margin-left:-40px" name="familyname" class="w3-input w3-round-medium w3-hover-yellow" value="<?php echo $record['student_familyname']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px" class="w3-text-white">Given Name </label></td>
                        <td><input type="text" style="width:240px;margin-left:-40px" name="givenname" class="w3-input w3-round-medium w3-hover-yellow" value="<?php echo $record['student_givenname']; ?>"/></td>
                        <td><label style="margin-left:35px" class="w3-text-white">Tshirt Size </label></td>
                        <td>
                            <input type="text" min="0" max="1" style="width:240px;margin-left:-40px" name="size" class="w3-input w3-round-medium w3-hover-yellow" value="<?php echo $record['student_tshirt_size']; ?>"/></td>
                        </td>    
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px" class="w3-text-white">Course Code </label></td>
                        <td><input type="text" id="student_code" style="width:240px;margin-left:-40px" name="course_code" class="w3-input w3-round-medium w3-hover-yellow" value="<?php echo $code;?>"/></td>
                        <!-- <td>
                            <select name="course_id" class="w3-select" style="width:240px;margin-left:10px"/>
                                <option value="" selected disabled hidden></option>
                                <option selected=""><?php echo $code;?></option>
                            </select> 
                        </td> -->
                        <td><label style="margin-left:40px" class="w3-text-white">Attended </label></td>
                        <td><input type="number" min="0" max="1" style="width:80px;margin-left:-40px" name="attended" class="w3-input w3-round-medium w3-hover-yellow" value="<?php echo $record['student_attended']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px" class="w3-text-white">Student Level </label></td>
                        <td><input type="number" min="1" max="4" style="width:80px;margin-left:-40px" name="level" class="w3-input w3-round-medium w3-hover-yellow" value="<?php echo $record['student_level']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="margin-left:40px" class="w3-text-white" >Card Code </label></td>
                        <td><input type="text" style="width:240px;margin-left:-40px" name="card_code" class="w3-input w3-round-medium w3-hover-yellow" value="<?php echo $record['student_card_code']; ?>"/></td>
                        <td><input type="hidden" id="student_code" style="width:240px;margin-left:-40px" name="course_id" class="w3-input w3-round-medium" value="<?php echo $id;?>"/></td>
                    </tr>
                </table>
            <?php }?>
                </br></br> 
                <div class="w3-center">
                    <button type="submit" name="update" class="w3-btn w3-green w3-round w3-hover-grey"> Update </button>
                    &nbsp &nbsp <button type="submit" name="cancel" class="w3-btn w3-red w3-round w3-hover-grey"> Cancel </button>
                </div> 
            </br>
        </div>
    </form>
    </body>
</html>
