<?php
    //include('../controllers/registerUser.php');

?>
<!doctype html>
<html>
    <head>
        <title> IT CONGRESS 2018 </title>
        <meta charset="utf-8"/>
        <link href = "../css/w3.css" rel="stylesheet"/>
        <script type="text/javascript" src="../js/angular.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/toastr.css"/>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="w3-container" ng-app="app" ng-controller="ctrl">
            <h3> PAYMENT MANAGEMENT </h3>
            <span class="w3-right"></span>
            <div class="w3- tab w3-teal">
                <a href="UserView.php" class="w3-button">HOME</a>
                <a href="StudentView.php" class="w3-button">STUDENT</a>
                <a href="CourseView.php" class="w3-button">COURSE</a>
                <a href="PaymentView.php" class="w3-button">PAYMENT</a>
                <a href="ReportView.php" class="w3-button" >REPORT</a>
            </div>
            </br>
            <!-- <button onclick="document.getElementById('user').style.display='block'" name="add" > +ADD </button> -->
            <a href="../views/payment/PaymentAdd.php" class="w3-button w3-round w3-large w3-blue">+ADD </a>
            <input type="text" ng-model="search" placeholder="SEARCH.." class="w3-padding w3-right"/> 
            </br></br>
                <table class="w3-table w3-responsive w3-striped w3-card-2 w3-bordered" >
                    <tr>
                        <th class="w3-large w3-center" ng-repeat="h in header"> {{h}} </th>
                    </tr>
                    <tr ng-repeat="u in payment | orderBy : 'payment_receipt_id' | filter : search">
                        <td class="w3-center" style="padding: 5px">{{u.payment_id}}</td>
                        <td class="w3-center">{{u.payment_receipt_id | uppercase}}</td>
                        <td class="w3-center"  ng-repeat="x in student | filter : { student_id: u.student_id}">{{x.student_idno }}</td>
                        <td class="w3-center" ng-repeat="x in student | filter :  {student_id: u.student_id}">{{x.student_givenname + " " + x.student_familyname | uppercase}}</td>
                        <td class="w3-center">{{u.tshirt}}.00</td>
                        <td class="w3-center">{{u.ticket}}.00</td>
                        <td class="w3-center"><a href="../controllers/Payment/getPayment.php?payment_id={{u.payment_id}}"><img src="../img/view.png" width="28px" hspace="10"  class="w3-image"></a>
                        <a href="../controllers/Payment/editPayment.php?payment_id={{u.payment_id}}&student_id={{u.student_id}}"> <img src="../img/edit.png" width="28px"  class="w3-image"></a>
                        <a href="../controllers/Payment/deletePayment.php?payment_id={{u.payment_id}}&student_id={{u.student_id}}" onclick="return confirm('Are you sure');"><img src="../img/trash.png" width="28px"  class="w3-image"></a></td>
                    </tr>
            </table>
        </div>
        <script type="text/javascript">
            var app = angular.module("app",[]);
            app.controller("ctrl",function($http,$scope){
                $scope.header = ["PAYMENT ID","PAYMENT RECEIPT ID","ID NUMBER","STUDENT NAME","TSHIRT","TICKET","ACTION"];
                $http({
                    url : 'http://localhost/itcongress/controllers/Payment/getAllPayment.php',
                    method: 'GET'
                }).then(function(response){
                    $scope.payment = response.data;
           
                });
                $http({
                    url : 'http://localhost/itcongress/controllers/Student/getAllStudent.php',
                    method: 'GET'
                }).then(function(response){
                    $scope.student = response.data;
           
                });
            });

        </script>
    </body>
</html>