<!doctype html>
<html>
    <head>
        <title> IT CONGRESS 2018 </title>
        <meta charset="utf-8"/>
        <link href = "../css/w3.css" rel="stylesheet"/>
        <link href = "../css/my.css" rel="stylesheet"/>
        <script type="text/javascript" src="../js/angular.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/toastr.css"/>
        <!-- <script src="../js/jquery-2.1.4.min.js"></script> -->
        <script src="../js/jquery-3.2.1.min.js"></script>
        <!-- <script src="../bootstrap/dist/js/bootstrap.js"></script> -->
        <!-- <script src="../bootstrap/dist/css/bootstrap.css"></script> -->
        <!-- <script src="../bootstrap/dist/css/bootstrap.min.css"></script> -->
        <!-- <script src="../bootstrap/dist/js/bootstrap.min.js"></script>  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="dropdown w3-container" ng-app="app" ng-controller="ctrl">
            <h3> REPORT MANAGEMENT </h3>
            <span class="w3-right"></span>
            <div class="w3-tab w3-teal dropdown">   
                <a href="UserView.php" class="w3-button">HOME</a>
                <a href="StudentView.php" class="w3-button">STUDENT</a>
                <a href="CourseView.php" class="w3-button">COURSE</a>
                <a href="PaymentView.php" class="w3-button">PAYMENT</a>
                <a href="ReportView.php" class="w3-button dropdown-toggle" data-toggle="dropdown">REPORT
                <span class="caret"></span></a>
                <span class="dropdown-menu" style="margin-left: 350px">
                  <button onclick="document.getElementById('tshirt').style.display='block'" class="w3-text-black w3-round w3-button w3-hover-grey">Tshirt List Payments</button><br>
                  <button onclick="document.getElementById('ticket').style.display='block'" class="w3-text-black w3-round w3-button w3-hover-grey">Ticket List Payments</button><br>
                  <button onclick="document.getElementById('both').style.display='block'" class="w3-text-black w3-round w3-button w3-hover-grey">Ticket & Tshirt List Payments</button>
                </span>
            </div>
                
            </br>
            </br></br> 
            <div id="tshirt" class="w3-modal">
                <div class="w3-modal-content w3-card-4">
                    <header class="w3-container w3-indigo"> 
                        <span onclick="document.getElementById('tshirt').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <center><h2>Tshirt Report Details</h2></center>
                    </header>
                    <div class="w3-container">
                        <br>
                        <table class="w3-table">
                            <tr>
                                <th class="w3-large w3-center" ng-repeat="h in header">{{h}}</th>
                            </tr>
                            <tr ng-repeat="u in student">
                                <div class="w3-card-2">
                                    <td class="w3-center" ng-repeat="p in payment | filter : { student_id:  u.student_id }" style="margin-right: 80px">{{u.student_givenname + " " + u.student_familyname | uppercase}}</td>
                                    <td class="w3-center" ng-repeat="p in payment | filter : { student_id:  u.student_id }">{{p.tshirt}}</td>
                                </div>
                            </tr>
                        </table>
                        <br>
                        <div class="w3-container">
                            <b style="margin-left: 500px" class="w3-large"> TOTAL  = &nbsp &nbsp &nbsp &nbsp <u>{{ totalTshirtPayments() }}.00</u></b>   
                        </div>
                        <br>
                    </div>
                </div>
            </div>  
            <div id="ticket" class="w3-modal">
                <div class="w3-modal-content w3-card-4">
                    <header class="w3-container w3-indigo"> 
                        <span onclick="document.getElementById('ticket').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <center><h2>Ticket Report Details</h2></center>
                    </header>
                    <div class="w3-container">
                        <br>
                        <table class="w3-table">
                            <tr>
                                <th class="w3-large w3-center" ng-repeat="h in header2">{{h}}</th>
                            </tr>

                            <tr ng-repeat="u in student">
                                <div class="w3-card-2">
                                    <td class="w3-center" style="margin-right: 80px" ng-repeat="p in payment | filter : { student_id:  u.student_id }">{{u.student_givenname + " " + u.student_familyname | uppercase}}</td>
                                    <td class="w3-center" ng-repeat="p in payment | filter : { student_id:  u.student_id }">{{p.ticket}}</td>
                                </div>
                            </tr>
                        </table>
                        <br>
                        <div class="w3-container">
                            <b style="margin-left: 510px" class="w3-large"> TOTAL  = &nbsp &nbsp &nbsp &nbsp <u> {{ totalTicketPayments()}}.00</u></b>   
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div id="both" class="w3-modal">
                <div class="w3-modal-content w3-card-4">
                    <header class="w3-container w3-indigo"> 
                        <span onclick="document.getElementById('both').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                        <center><h2>Tshirt & Ticket Report Details</h2></center>
                    </header>
                    <div class="w3-container">
                        <br>
                        <table class="w3-table">
                            <tr>
                                <th class="w3-large w3-center" ng-repeat="h in header3">{{h}}</th>
                            </tr>
                            <tr ng-repeat="u in student">
                                <div class="w3-card-2">
                                    <td class="w3-center" style="margin-right: 80px" ng-repeat="p in payment | filter : { student_id:  u.student_id }">{{u.student_givenname + " " + u.student_familyname | uppercase}}</td>
                                    <td class="w3-center" ng-repeat="p in payment | filter : { student_id:  u.student_id }">{{p.tshirt}}</td>
                                    <td class="w3-center" ng-repeat="p in payment | filter : { student_id:  u.student_id }">{{p.ticket}}</td>
                                </div>
                            </tr>
                        </table>
                        <br>
                        <div class="w3-container">
                            <b style="margin-left: 395px"> =  &nbsp &nbsp {{ totalTshirtPayments() }}.00
                            <span style="margin-left: 180px"> =  &nbsp &nbsp {{ totalTicketPayments() }}.00</span></b>     
                        </div>
                        <br>
                        <div class="w3-container">
                            <span style="margin-left: 475px" class="w3-large"><b>TOTAL  &nbsp =  &nbsp <u>{{ total() }}.00 </u></b></span>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            var app = angular.module("app",[]);
            app.controller("ctrl",function($http,$scope){
                $scope.header = ["Student Names","Tshirt Payments"];
                $scope.header2 = ["Student Names","Ticket Payments"];
                $scope.header3 = ["Student Names","Tshirt Payments","Ticket Payments"];
                $http({
                    url : 'http://localhost/itcongress/controllers/payment/getAllPayment.php',
                    method: 'GET'
                }).then(function(response){
                    $scope.payment = response.data;
                });
                $http({
                    url : 'http://localhost/itcongress/controllers/Student/getSmallSize.php',
                    method: 'GET'
                }).then(function(response){
                    $scope.studentSizeSmall = response.data;
                }); 
                $http({
                    url : 'http://localhost/itcongress/controllers/student/getAllStudent.php',
                    method: 'GET'
                }).then(function(response){
                    $scope.student = response.data;
                });   
                $scope.totalTicketPayments = function(){
                var total = 0;
                    for(count=0;count<$scope.payment.length;count++){
                        total += parseInt($scope.payment[count].ticket,10);
                    }
                    return total;
                };
                $scope.totalTshirtPayments = function(){
                var total = 0;
                    for(count=0;count<$scope.payment.length;count++){
                        total += parseInt($scope.payment[count].tshirt,10);
                    }
                    return total;
                };
                $scope.total = function(){
                var total = 0;
                var total2 = 0;  
                var total3 = 0;
                    for(count=0;count<$scope.payment.length;count++){
                        total += parseInt($scope.payment[count].ticket,10);
                    }
                     for(count=0;count<$scope.payment.length;count++){
                        total2 += parseInt($scope.payment[count].tshirt,10);
                    }
                    total3 = total + total2;
                    return total3;
                }
            });
        </script>
    </body>
</html>