/**
* Created by hokage on 14/5/15.
* */

var ocs = angular.module('cotocs', ['ui.router', 'ngResource']);

/*
* ====================================
* CONFIGURATION enabling CORS Request using AngularJS BEGINS
* */
ocs.config(['$httpProvider', function($httpProvider) {
    $httpProvider.defaults.useXDomain = true;
    delete $httpProvider.defaults.headers.common['X-Requested-With'];
}
]);
/*
* CONFIGURATION enabling CORS Request using AngularJS ENDS
* ====================================
* */

/*
* ====================================
* CONFIGURATION enabling JSON Resource fetch Request ($resource) using AngularJS BEGINS
* */
ocs.config(['$resourceProvider', function($resourceProvider) {
    $resourceProvider.defaults.stripTrailingSlashes = false;
}]);
/*
* CONFIGURATION enabling JSON Resource fetch Request ($resource) using AngularJS ENDS
* ====================================
* */

/*
* ====================================
* CONFIGURATION of states and location using AngularJS BEGINS
* */
ocs.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider){
    $urlRouterProvider.otherwise('/');

    $stateProvider
        .state('main',
        {
            url: '/',
            templateUrl: 'views/homePage.html'
//            controller: controllerName
        });

    $stateProvider
        .state('display',
        {
            url: '/display',
            templateUrl: 'views/display.html'
//            controller: controllerName
        });

    $stateProvider
        .state('display.me',
        {
            url: '/display.me',
            templateUrl: 'views/display.html',
            controller: 'branchDisplay',
            data: {
                branchCode: 'me'
            }
        });

    $stateProvider
        .state('display.ae',
        {
            url: '/display.ae',
            templateUrl: 'views/display.html',
            controller: 'branchDisplay',
            data: {
                branchCode: 'ae'
            }
        });
    $stateProvider
        .state('display.ce',
        {
            url: '/display.ce',
            templateUrl: 'views/display.html',
            controller: 'branchDisplay',
            data: {
                branchCode: 'ce'
            }
        });

    $stateProvider
        .state('display.cse',
        {
            url: '/display.cse',
            templateUrl: 'views/display.html',
            controller: 'branchDisplay',
            data: {
                branchCode: 'cse'
            }
        });
    $stateProvider
        .state('display.ee',
        {
            url: '/display.ee',
            templateUrl: 'views/display.html',
            controller: 'branchDisplay',
            data: {
                branchCode: 'ee'
            }
        });

    $stateProvider
        .state('display.ece',
        {
            url: '/display.ece',
            templateUrl: 'views/display.html',
            controller: 'branchDisplay',
            data: {
                branchCode: 'ece'
            }
        });

    $stateProvider
        .state('display.it',
        {
            url: '/display.it',
            templateUrl: 'views/display.html',
            controller: 'branchDisplay',
            data: {
                branchCode: 'it'
            }
        });
    $stateProvider
        .state('display.iped',
        {
            url: '/display.iped',
            templateUrl: 'views/display.html',
            controller: 'branchDisplay',
            data: {
                branchCode: 'iped'
            }
        });


    $stateProvider
        .state('login',
        {
            url: '/login',
            templateUrl: 'views/login.html'
//            controller: controllerName
        });
    $stateProvider
        .state('dashboard',
        {
            url: '/dashboard',
            templateUrl: 'views/dashboard.html',
            controller: 'dashboardHandler'
        });
    $stateProvider
        .state('register',
        {
            url: '/register',
            templateUrl: 'views/register.html',
            controller: 'dashboardHandler'
        });
    $stateProvider
        .state('modifyDetails',
        {
            url: '/modify',
            templateUrl: 'views/modify.html',
            controller: 'dashboardHandler'
        });
    $stateProvider
        .state('list',
        {
            url: '/list',
            templateUrl: 'views/list.html',
            controller: 'dashboardHandler'
        });
    $stateProvider
        .state('alottedlist',
        {
            url: '/alottedlist',
            templateUrl: 'views/alottedlist.html',
            controller: 'dashboardHandler'
        });
    $stateProvider
        .state('alottmentletter',
        {
            url: '/alottmentletter',
            templateUrl: 'views/alottmentletter.html',
            controller: 'dashboardHandler'
        });
    $stateProvider
        .state('college_details',
        {
            url: '/college_details',
            templateUrl: 'views/college_details.html',
            controller: 'dashboardHandler'
        });

}]);
/*
* CONFIGURATION of states and location using AngularJS BEGINS
* ====================================
* */

/*
* ======================================
* SERVICE globalDetails BEGINS
* This function will be responsible for defining all global variables for the project
* */
ocs.factory('globalDetails', function () {
    var globalvar = {};
    globalvar.projectTitle = "Online Counselling System";
    globalvar.projectAuthor = "Purnesh Tripathi";
    globalvar.collegeName = "College of Technology, GBPUAT, Pantnagar";
    globalvar.ruthLessDetail = "localhost";
    globalvar.isAuth = 0;
    return globalvar;
});
/*
* ======================================
* SERVICE globalDetails ENDS
* This function will be responsible for defining all global variables for the project
* */

/*
* =====================================
* CONTROLLER universalHandler BEGINS
* This function will handle tasks on a broader level, not delving in petty businesses
* */
ocs.controller('universalHandler', function($scope, $http, globalDetails){
    $scope.projectTitle = globalDetails.projectTitle;
    if($scope.projectTitle){
        console.log("Test: Successful: Load Page Title");
    }
    else{
        console.log("Test: Failed: Load Page Title");
    }
    $scope.projectAuthor = globalDetails.projectAuthor;
    if($scope.projectTitle){
        console.log("Test: Successful: Load Page Author");
    }
    else{
        console.log("Test: Failed: Load Page Author");
    }
});
/*
* CONTROLLER universalHandler ENDS
* This function will handle tasks on a broader level, not delving in petty businesses
* =====================================
* */

/*
* =====================================
* CONTROLLER branchController BEGINS
* This function will fetch all data from the database using $resource
* in order to display it on the display page
* */
ocs.controller('branchController', function($scope, $state, $http, $resource, globalDetails){
    if($state.current.data !== undefined){
        $scope.branchCode = $state.current.data.branchCode;
        var branchApiUrl = "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/api/branch_info/" + $scope.branchCode;
        var b = $resource(branchApiUrl);
        $scope.branchVacancyData = b.get();
        switch($state.current.data.branchCode) {
            case 'ae':
                $scope.branchName = "Agricultural Engineering";
                break;
            case 'me':
                $scope.branchName = "Mechanical Engineering";
                break;
            case 'ce':
                $scope.branchName = "Civil Engineering";
                break;
            case 'cse':
                $scope.branchName = "Computer Engineering";
                break;
            case 'ee':
                $scope.branchName = "Electrical Engineering";
                break;
            case 'ece':
                $scope.branchName = "Electronics and Communication Engineering";
                break;
            case 'iped':
                $scope.branchName = "Industrial & Production Engineering";
                break;
            case 'it':
                $scope.branchName = "Information Technology";
                break;
        }
    }
    else{
        $scope.branchCode = 'it';
        $scope.branchName = "Information Technology";
        $state.go('display.it');
    }
    $scope.projectAuthor = globalDetails.projectAuthor;
});
/*
* CONTROLLER branchController BEGINS
* This function will fetch all data from the database using $resource
* in order to display it on the display page
* =====================================
* */

/*
* =====================================
* CONTROLLER navigationBarHandler BEGINS
* This function will be responsible for defining all functions of the Navigation Bar
* PARENT:: universalHandler
*/
ocs.controller('navigationBarHandler', function($scope, globalDetails, $state) {

    $scope.navBarEntries = [
        {
            state: "home",
            name: "Home",
            href: "#home",
            id: "home-tab-navbar"
        },
        {
            state: "display",
            name: "Display",
            href: "#display",
            id: "documents-required-navbar"
        },

        {
            state: "login",
            name: "Dashboard",
            href: "#login",
            id: "dashboard-navbar",
            controller: "dashboardHandler"
        }
    ];

    $scope.selectedEntry = 0;

    $scope.selectEntry = function(row){
        $scope.selectedEntry = row;
    }
});
/*
* CONTROLLER navigationBarHandler ENDS
* This function will be responsible for defining all functions of the Navigation Bar
* PARENT:: universalHandler
* =====================================
*/

/*
* =====================================
* CONTROLLER dashboardSidebarHandler BEGINS
* This function will handle tasks on a broader level, not delving in petty businesses
* */
ocs.controller('dashboardSidebarHandler', function($scope, globalDetails){
    $scope.sidebarEntries = {
        type: 'untitled-list',
        class: 'nav nav-sidebar',
        contents: [
            {
                href: "display.ae",
                displayText: "Agricultural Engineering"
            },
            {
                href: "display.ce",
                displayText: "Civil Engineering"
            },
            {
                href: "display.cse",
                displayText: "Computer Engineering"
            },
            {
                href: "display.ee",
                displayText: "Electrical Engineering"
            },
            {
                href: "display.ece",
                displayText: "Elec. & Comm. Engineering"
            },
            {
                href: "display.it",
                displayText: "Information Technology"
            },
            {
                href: "display.me",
                displayText: "Mechanical Engineering"
            },
            {
                href: "display.iped",
                displayText: "Production Engineering"
            }
        ]
    };
    $scope.selectedEntry = 0;
    $scope.selectEntry = function(row){
        $scope.selectedEntry = row;
    }
});
/*
* CONTROLLER dashboardSidebarHandler ENDS
* This function will handle tasks on a broader level, not delving in petty businesses
* =====================================
* */

/*
* =====================================
* CONTROLLER signinHandler BEGINS
* This function will handle signin related requests
* */
ocs.controller('signinHandler', function ($scope, globalDetails, $http, $location, $state) {
    if($scope.isAuth == 1){
        console.log("Test: Successful: Display Application State Attained");
        $state.go('display');

    }else{
        $scope.status = $state.current.name;
        $scope.signin = function (username, password) {
            $scope.corsUrl = 'http://'+ globalDetails.ruthLessDetail +'/project/back-end/index.php/authenticate/user/'+username+'/'+password;

        }
    }
});
/*
* CONTROLLER signinHandler BEGINS
* This function will handle signin related requests
* =====================================
* */

/*
 * =====================================
 * CONTROLLER dashboardHandler BEGINS
 * This function will handle dashboard related requests
 * */
ocs.controller('dashboardHandler', function ($scope, globalDetails, $http, $location, $resource, $state) {
    $scope.formData = {};
    /*$scope.registerStudent = function () {
           //Registration Code here
    };
     */

    console.log("Test: Successful: Dashboard Application State Attained");
    $scope.studentDetailPage = 0;
    $scope.listOfStudentsPage = 0;
    $scope.listOfAvailableChoicesPage = 0;
    if($scope.isAuthenticated == 0){
        $state.go("login");
    }

    $scope.authenticationModule = function(username, password) {
        console.log("Authentication Module Accessed");
        if($scope.isAuthenticated == 1){
            $state.go("dashboard");
        }
        else{
            console.log("Authentication Request Received");
            if(username == 'admin' && password=="admin"){
                $scope.isAuthenticated = 1;
                console.log("Authentication Successful");
                console.log("Authentication Request Accepted");
                $state.go("dashboard");
            }
            else{

                console.log("Authentication Request Failed");
            }
        }
    };

    $scope.listStudents = function(){
        console.log("Test: Successful: Counselling Platform Loaded");
        $scope.studentDetailPage = 0;
        $scope.listOfStudentsPage = 1;
        var fetchUrl = "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/api/list_students";
        var b = $resource(fetchUrl);
        $scope.listOfStudents = b.query();
        if($scope.listOfStudents){
            console.log("Test: Successful: The list of Students was successfully fetched");
        }
        else{
            console.log("Test: Failed: There was a problem fetching the list of students");
        }
    };

    $scope.studentDetails = function(rank) {
        $scope.studentDetailPage = 1;
        var testerString = "Test: Successful: Fetch Details for student with rank - " + rank;
        $scope.listOfStudentsPage = 0;
        var fetchUrl = "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/api/student_details/" + rank;
        var b = $resource(fetchUrl);
        $scope.detailsOfStudent = b.query();
        if($scope.detailsOfStudent){
            console.log(testerString);
        }
        else{
            console.log("failed to Fetch student records");
        }
    };

    $scope.availableChoices = function(rank) {
        $scope.listOfStudentsPage = 0;
        $scope.listOfAvailableChoicesPage = 1;
        $scope.currentStudentRank = rank;
        var fetchUrl = "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/api/available_choices/" + rank;
        var b = $resource(fetchUrl);
        $scope.listOfBranches = b.query();
        if($scope.listOfBranches){
            console.log("Test: Successful: Fetch Available branches for student with rank - " + rank);
        }
        else{
            console.log("Test: Failed: Fetch Available branches for student with rank - " + rank);
        }
    };

    $scope.alotSeat = function(collegeCode, branchCode) {
        $scope.currentBranchCode = branchCode;
        var urlPartOne = "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/api/alot_seat";
        var urlPartTwo = "/" + $scope.currentStudentRank + "/" + branchCode + "/" + collegeCode.code;
        var fetchUrl = urlPartOne + urlPartTwo;
        var b = $resource(fetchUrl);
        $scope.alotStatus = b.get();
        if($scope.alotStatus){
            console.log("Test: Successful: Seat Alotment for student with rank - " + $scope.currentStudentRank);
        }
        else{
            console.log("Test: Failed: Seat Alotment for student with rank - " + $scope.currentStudentRank);
        }
    };

    $scope.alottedStudents = function(){
        $state.go('alottedlist');
        var fetchUrl = "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/api/alotted_students";
        var b = $resource(fetchUrl);
        $scope.listOfAlottedStudents = b.query();
    };

    $scope.alottmentLetter = function(rank) {
        var fetchUrl = "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/api/alottment_letter/" + rank;
        var b = $resource(fetchUrl);
        $scope.details = b.query();
        var a = "Details fetched for rank = " + rank;
        $scope.allotedStudentRank = rank;
        console.log(a);
    };

    $scope.fetchCollegeList = function() {
        $scope.collegeListRetrieved = 1;
        var fetchUrl = "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/api/college_list/";
        var b = $resource(fetchUrl);
        $scope.collegeDetailsCollegeList = b.query();
        console.log("College List Retrieval Successfully Complete");
    };

    $scope.fetchBranchListForCollege = function(collegeCode) {
        var fetchUrl = "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/api/list_of_branches/" + collegeCode;
        var b = $resource(fetchUrl);
        var result = b.query();
        $scope.branchListForCollege = result;
        $scope.currentCollegeCode = collegeCode;
        console.log($scope.branchListForCollege);
        var testData = "Branch List Retrieval Successfully Complete for college " + collegeCode;
        console.log(testData);
    };

    $scope.print_report = function(branchCode) {
        var visitUrl= "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/reports/branch_allotment_report/" + $scope.currentCollegeCode + "/" + branchCode;
        window.location.href=visitUrl;
    };

    $scope.printAllotmentRecord = function() {
        var visitUrl= "http://"+ globalDetails.ruthLessDetail +"/project/back-end/index.php/reports/allotment_letter/" + $scope.allotedStudentRank;
        //http://localhost/project/back-end/index.php/reports/allotment_letter/2654
        console.log(visitUrl);
        window.location.href=visitUrl;
    };

});
/*
 * CONTROLLER dashboardHandler ENDS
 * This function will handle dashboard related requests
 * =====================================
 * */


ocs.filter('capitalize', function() {
        return function(input, all) {
            return (!!input) ? input.replace(/([^\W_]+[^\s-]*) */g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) : '';
        }
    });


ocs.filter('debug', function() {
    return function(input) {
        if (input === '') return 'empty string';
        return input ? input : ('' + input);
    };
});
