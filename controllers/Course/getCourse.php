<?php
    include('../../models/CourseModel.php');
    $course = new CourseModel();
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $ok = $course -> getCourse('course_id',$course_id); 
        $oka = $course -> getStudentCourse('course_id',$course_id);  
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>EDIT USER</title>
    <link href="../../css/w3.css" rel="stylesheet"/>    
   <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/angular.min.js"></script>
    <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>    
    <!-- <script type="text/javascript" src="../../toastr-master/toastr.min.js"></script>     -->
</head>
<body>
    <form method="POST">
        <div style="width:600px;margin-top:100px;margin-left:500px" ng-app="app" ng-controller="ctrl" class="w3-container w3-grey w3-card-2 w3-round">  
            </br>
            </center><center><h2> COURSE VIEW</h2></center>
            <br> 
            <?php 
                foreach($ok as $record){                
            ?>             
                <table>
                    <tr>
                        <td><label style="width:170px;margin-left:50px">Course Code </label></td>
                        <td><input type="text" style="width:170px;margin-left:30px" disabled class="w3-input w3-round-medium  w3-sand" name="code" value="<?php echo $record['course_code']; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label style="width:170px;margin-left:50px">Course Name </label></td>
                        <td><input type="text" style="width:370px;margin-left:30px" disabled class="w3-input  w3-round-medium w3-sand" name="name" value="<?php echo $record['course_name']; ?>"/></td>
                    </tr>
                </table>
                </br>
                </br>
               
                </br>
            <?php }?>
                <table class="w3-table">
                      <tr>
                        <th class="w3-large w3-center" ng-repeat="h in header"> {{h}} </th>
                    </tr>
                <?php
                    foreach ($oka as $key) {
                ?>
                    <tr>
                        <td class="w3-center"><?php echo $key['student_idno']; ?></td>
                        <td class="w3-center"><?php echo strtoupper($key['student_familyname']) . "," . strtoupper($key['student_givenname']);?></td>
                        <td class="w3-center"><?php echo $key['student_level']; ?></td>
                    </tr>
                <?php } ?>
                </table>
            
        </center>
            <center><a href="http://localhost/itcongress/views/CourseView.php"><img src="../../img/back.png" width="80px"></img></a>
            </div>
    </form>
        <script type="text/javascript">
        var app = angular.module("app",[]);
        app.controller("ctrl",function($http,$scope){
            $scope.header = ["IDNO","NAMES","LEVEL"];
        });
    </script>
</body>
</html>
    