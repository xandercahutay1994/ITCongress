<!doctype html>
<html>
    <head>
        <title> IT CONGRESS 2018 </title>
        <meta charset="utf-8"/>
        <link  rel="stylesheet" href = "../css/w3.css"/>
        <link  rel="stylesheet" href = "../css/my.css"/>
        
         <!-- <link href = "../css/w3pro.css" rel="stylesheet"/> -->
        <script type="text/javascript" src="../js/angular.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/toastr.css"/>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/angularUtils-master/src/directives/pagination/dirPagination.js"></script>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    </head>
    <body>
        <div class="w3-container" ng-app="app" ng-controller="ctrl">
            <h3> STUDENT MANAGEMENT </h3>
            <span class="w3-right"></span>
            <div class="w3- tab w3-teal">
                <a href="UserView.php" class="w3-button">HOME</a>
                <a href="StudentView.php" class="w3-button">STUDENT</a>
                <a href="CourseView.php" class="w3-button">COURSE</a>
                <a href="PaymentView.php" class="w3-button">PAYMENT</a>
                <a href="ReportView.php" class="w3-button" >REPORT </a>
            </div>
            </br>
            <!-- <button onclick="document.getElementById('user').style.display='block'" name="add" > +ADD </button> -->
            <a href="../views/student/StudentAdd.php" class="w3-button w3-round w3-large w3-blue">+ADD</i></a>
            <input type="text" ng-model="search" id="srch" placeholder="SEARCH.." class="w3-padding w3-right"/> 
            <br><br>
            <span>
                <!-- max-size="3" -->
                <dir-pagination-controls direction-links="true" boundary-links="true" template-url="../js/angularUtils-master/src/directives/pagination/dirPagination.tpl.html">
                </dir-pagination-controls>    
            </span>
            <br>
            <!-- <br>
            View 
            <select ng-model="viewby" ng-change="setItemsPerPage(viewby)">
                <option value="" disabled selected="selected">SELECT PLEASE</option>
                <option>5</option>
                <option>10</option>
                <option>15</option>
            </select>        
            <pre>Selected page # is: {{currentPage}}</pre> -->
                <table class="w3-table w3-responsive w3-striped w3-card-2 w3-bordered" >
                    <tr>
                        <th class="w3-large w3-center w3-theme" ng-repeat="h in header"> {{h}} </th>
                    </tr>
                    <!-- slice(((currentPage-1) * itemsPerPage),((currentPage)*itemsPerPage)) -->
                    <tr dir-paginate="u in student | itemsPerPage:5 |orderBy : 'student_familyname' | filter : search">
                        <td class="w3-center">{{u.student_id}}</td>
                        <td class="w3-center">{{u.student_idno}}</td>
                        <td class="w3-center">{{u.student_familyname | uppercase}}</td>
                        <td class="w3-center">{{u.student_givenname | uppercase}}</td>
                        <td class="w3-center" ng-repeat="c in course | filter : { course_id:  u.student_course_id }">{{c.course_code}}</td>
                        <td class="w3-center">{{u.student_level}}</td>
                        <td class="w3-center">{{u.student_card_code}}</td>
                        <td class="w3-center">{{u.student_tshirt}}.00</td>
                        <td class="w3-center">{{u.student_ticket}}.00</td>
                        <td class="w3-center">{{u.student_tshirt_size}}</td>
                        <td class="w3-center">{{u.student_attended}}</td>
                        <td><a href="../controllers/Student/getStudent.php?student_id={{u.student_id}}"><img src="../img/view.png" width="28px" hspace="10" class="w3-image"></img></a>
                        <a href="../controllers/Student/editStudent.php?student_id={{u.student_id}}&course_id={{u.student_course_id}}"><img src="../img/edit.png" width="28px" class="w3-image"></img></a>
                        <a href="../controllers/Student/deleteStudent.php?student_id={{u.student_id}}" onclick="return confirm('Are you sure');"><img src="../img/trash.png" class="w3-image" width="28px"></img></a></td>
                    </tr>
            </table>
        </div>
        
        <script type="text/javascript">
            var app = angular.module("app",['angularUtils.directives.dirPagination']);
            app.controller("ctrl",function($http,$scope){
                $scope.header = ["STUDENT ID","ID_NO","FAMILYNAME","GIVENNAME","CODE","LEVEL","CARD-CODE","TSHIRT","TICKET","SIZE","ATTENDED","ACTION"];
                $http({
                    url : 'http://localhost/itcongress/controllers/Student/getAllStudent.php',
                    method: 'GET'
                }).then(function(response){
                    $scope.student = response.data;   
                    //return $filter('filter')($scope.data, $scope.q); 
                    
                }); 
                $http({
                    url : 'http://localhost/itcongress/controllers/Course/getAllCourse.php',
                    method: 'GET'
                }).then(function(response){
                    $scope.course = response.data;
                });
                // $scope.viewby = 10;
                // $scope.totalItems = $scope.student;
                // $scope.currentPage = 0;
                // $scope.itemsPerPage = $scope.viewby;
                // $scope.maxSize = 5;

                // $scope.setPage = function(pageNo){
                //     $scope.currentPage = pageNo;
                // }

                // $scope.pageChanged = function(){
                //     console.log('Page changed to: ' + $scope.currentPage);
                // }

                // $scope.setItemsPerPage = function(num){
                //     $scope.itemsPerPage = num;
                //     $scope.currentPage = 1;
                // }
               

            });
        </script>
    </body>
</html>