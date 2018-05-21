<!DOCTYPE html>
<html>
<head>
    <title>Register Student</title>
    <meta charset="utf-8" />
    <link href="../../css/w3.css" rel="stylesheet"/>  
    <!-- <link href="../../css/my.css" rel="stylesheet"/>  -->
    <script type="text/javascript" src="../../js/angular.min.js"></script>
    <script src="../../js/jquery-3.2.1.min.js"></script> 
</head>
<body>
    <form method="POST" action="http://localhost/itcongress/controllers/Student/registerStudent.php">
        <div style="width:1000px;margin-top:90px;margin-left:300px;background-image:url('../../img/it15.png');" class="w3-container w3-card-2 w3-round" ng-app="app" ng-controller="ctrl">
            <!-- <center><h2> ADD STUDENT </h2></center>              -->
            <center><img src="../../img/it7.png" width="140" /></center>
            <br>
            <table class="w3-table">
                <tr>
                    <td><label style="margin-left:40px" class="w3-text-white">ID Number </label></td>
                    <td> <input type="number" min="1"  style="width:170px;margin-left:-40px" class="w3-input w3-round-medium w3-hover-grey" name="idno" maxLength="11" placeholder="ID Number..."/></td>
                </tr>
                <tr>
                    <td><label style="margin-left:35px" class="w3-text-white">Family Name </label></td>
                    <td> <input type="text" style="width:240px;margin-left:-40px" class="w3-input w3-round-medium w3-hover-grey" name="familyname" placeholder="Family Name..."/></td>
                </tr>
                <tr>
                    <td><label style="margin-left:35px" class="w3-text-white">Given Name </label></td>
                    <td><input type="text" style="width:240px;margin-left:-40px" class="w3-input w3-hover-grey w3-round-medium" name="givenname" placeholder="Given Name..."/></td>
                    <td><label style="margin-left:35px" class="w3-text-white">Tshirt Size </label></td>
                    <td>
                        <select name="size" type="text" style="width:150px;margin-left:-40px" class="w3-input w3-select w3-round-medium w3-center w3-select"/>
                        <option label="Choose Size" disabled selected="selected"></option>
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                     </select> </td>
                    </td>
                </tr>
                <tr>
                    <td><label style="margin-left:35px" class="w3-text-white">Course Code </label></td>
                    <td>
                    <select name="course_code" type="text" style="width:170px;margin-left:-40px" class="w3-input w3-select w3-round-medium w3-center w3-select"/>
                        <option label="Select Course" disabled selected="selected"></option>
                        <option value="{{u.course_id}}" ng-repeat="u in course">{{ u.course_code}}</option>
                     </select>
                    </td>
                </tr>
                <tr>
                    <td><label style="margin-left:35px" class="w3-text-white">Student Level </label></td>
                    <td> 
                    <select name="level" type="text" style="width:170px;margin-left:-40px" class="w3-input w3-select w3-round-medium w3-select"/>
                            <option label="Select Level" disabled selected="selected"></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label style="margin-left:35px" class="w3-text-white">Card Code </label></td>
                    <td> 
                    <input type="text" class="w3-input w3-hover-grey w3-round-medium" name="card_code" style="width:240px;margin-left:-40px" placeholder="Student Card Code..."/></td>
                </tr>
                
            </table>
                </br>  </br> 
                <div class="w3-center">
                    <button type="submit" id="register" name="register" class="w3-btn w3-green w3-round w3-hover-grey"> Register </button>
                    &nbsp &nbsp<button type="submit" name="cancel" class="w3-btn w3-red w3-round w3-hover-grey"> Cancel </button>
                </div> 
            </br>
        </div>
    </form>
    <script type="text/javascript">
        var app = angular.module("app",[]);
        app.controller("ctrl",function($http,$scope){
            $http({
                url : 'http://localhost/itcongress/controllers/course/getAllCourse.php',
                method: 'GET'
            }).then(function(response){
                $scope.course = response.data;
            });
        });
    </script>
</body>
</html>


