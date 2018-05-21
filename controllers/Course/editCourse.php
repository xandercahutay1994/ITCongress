<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>EDIT COURSE</title>
    <link rel="stylesheet" type="text/css" href="../../toastr-master/toastr.css" />
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>
    <link href="../../css/w3.css" rel="stylesheet"/>   
</head>

<?php
    include('../../models/CourseModel.php');
    $course = new CourseModel();
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $ok = $course -> getCourse('course_id',$course_id);   
        if(isset($_POST['update'])){
            $code = $_POST['code'];
            $name = $_POST['name'];
            if($code == "" || $name == "")
            {
                echo "<span id='low'></span>";
                echo "<script>toastr.error('Fill all fields please.....Error Updating Course!');</script>";
                echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/controllers/Course/editCourse.php?course_id=$course_id';},1500);</script>";    
            }else{
               $oka = $course -> edit(array("course_code","course_name"),array($code,$name),'course_id',$course_id);
                echo "<span id='low'></span>";
                echo "<script>toastr.success('Course Updated!');</script>";
                echo "<script>setTimeout(function(){window.location='http://localhost/itcongress/views/CourseView.php';},1500);</script>";       
            } 
        }
    }
    if(isset($_POST['cancel'])){
        echo "<script>window.location='http://localhost/itcongress/views/CourseView.php';</script>";
    }
?>
<body>
    <form method="POST">
        <div style="width:600px;margin-top:100px;margin-left:500px;background-image:url('../../img/it23.jpg');" class="w3-container w3-card-2 w3-round">
            <center><h2 class="w3-text-white"> EDIT COURSE </h2></center>             
            </br>
            <?php 
                foreach($ok as $record){                
            ?>             
                <table>
                    <tr>
                        <td><label style="width:170px;margin-left:50px" class="w3-text-white">Course Code </label></td>
                        <td><input type="text" style="width:170px;margin-left:30px" class="w3-input w3-round-medium w3-hover-yellow" name="code" value="<?php echo $record['course_code']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:50px" class="w3-text-white">Course Name </label></td>
                        <td><input type="text" style="width:370px;margin-left:30px" class="w3-input w3-round-medium w3-hover-yellow" name="name" value="<?php echo $record['course_name']; ?>"/></td>
                    </tr>
                </table>
                </br>
                </br>
                <div class="w3-center">
                    <button type="submit" name="update" class="w3-btn w3-green w3-round w3-hover-grey"> Update </button>
                    &nbsp &nbsp<button type="submit" name="cancel" class="w3-btn w3-red w3-round w3-hover-grey"> Cancel </button>
                </div>  
                </br>
            <?php }?>
        </div>  
    </form>
</body>
</html>
    