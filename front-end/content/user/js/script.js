/**
 * Created by hokage on 14/5/15.
 */

var ocs = angular.module('cotocs', ['ui.router']);

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
        .state('display.bio',
        {
            url: '/display.bio',
            templateUrl: 'views/display.html',
            controller: 'branchDisplay',
            data: {
                branchCode: 'bio'
            }
        });

    $stateProvider
        .state('register',
        {
            url: '/register',
            templateUrl: 'views/register.html'
//            controller: controllerName
        });
}]);
/*
 * CONFIGURATION of states and location using AngularJS BEGINS
 * ====================================
 * */

/*
 ======================================
 SERVICE globalDetails BEGINS
 This function will be responsible for defining all global variables for the project
 */
ocs.factory('globalDetails', function () {
    var globalvar = {};
    globalvar.projectTitle = "Online Counselling System";
    globalvar.projectAuthor = "Purnesh Tripathi";
    globalvar.collegeName = "College of Technology, GBPUAT, Pantnagar";
    globalvar.isAuth = 0;
    return globalvar;
});
/*
 ======================================
 SERVICE globalDetails ENDS
 This function will be responsible for defining all global variables for the project
 */

ocs.factory('branchDetails', function($http, globalDetails) {

    return function(branchCode){
        var branchApiUrl = "http://localhost/project/back-end/index.php/api/branch_info/" + branchCode;

    };
});


/*
* =====================================
* CONTROLLER universalHandler BEGINS
* This function will handle tasks on a broader level, not delving in petty businesses
* */
ocs.controller('universalHandler', function($scope, $http, globalDetails){
    $scope.projectTitle = globalDetails.projectTitle;
    $scope.projectAuthor = globalDetails.projectAuthor;
});
/*
 * CONTROLLER universalHandler ENDS
 * This function will handle tasks on a broader level, not delving in petty businesses
 * =====================================
 * */

ocs.controller('branchController', function($scope, $state, $http, globalDetails, branchDetails){

    if($state.current.data !== undefined){
        switch($state.current.data.branchCode) {
            case 'ae':
                $scope.branchCode = $state.current.data.branchCode;
                var branchApiUrl = "http://localhost/project/back-end/index.php/api/branch_info/" + $scope.branchCode;
                $scope.branchName = "Agricultural Engineering";
                var a = $http.get(branchApiUrl).success(function (data, headers, status, config) {
                    //console.log(data);
                    return data;
                    //$state.go('dashboard');
                });
                console.log(a);
                console.log(globalDetails.isAuth);
                break;

            case 'me':
                $scope.branchCode = $state.current.data.branchCode;
                branchDetails($scope.branchCode);
                $scope.branchName = "Mechanical Engineering";
                break;
            case 'ce':
                $scope.branchCode = $state.current.data.branchCode;
                branchDetails($scope.branchCode);
                $scope.branchName = "Civil Engineering";
                break;
            case 'cse':
                $scope.branchCode = $state.current.data.branchCode;
                branchDetails($scope.branchCode);
                $scope.branchName = "Computer Engineering";
                break;
            case 'ee':
                $scope.branchCode = $state.current.data.branchCode;
                branchDetails($scope.branchCode);
                $scope.branchName = "Electrical Engineering";
                break;
            case 'ece':
                $scope.branchCode = $state.current.data.branchCode;
                branchDetails($scope.branchCode);
                $scope.branchName = "Electronics and Communication Engineering";
                break;
            case 'iped':
                $scope.branchCode = $state.current.data.branchCode;
                branchDetails($scope.branchCode);
                $scope.branchName = "Industrial & Production Engineering";
                break;
            case 'it':
                $scope.branchCode = $state.current.data.branchCode;
                branchDetails($scope.branchCode);
                $scope.branchName = "Information Technology";
                break;
            case 'bio':
                $scope.branchCode = $state.current.data.branchCode;
                branchDetails($scope.branchCode);
                $scope.branchName = "B. Tech Biotechnology";
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
            state: "register",
            name: "Register",
            href: "#register",
            id: "login-register-navbar"
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
            },
            {
                href: "display.bio",
                displayText: "B. Tech, Biotechnology"
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


ocs.controller('signinHandler', function ($scope, globalDetails, $http, $location, $state) {
    if(globalDetails.isAuth == 1){
        $state.go('display');
    }else{
        $scope.status = $state.current.name;
        $scope.signin = function (username, password) {
            $scope.corsUrl = 'http://localhost/project/back-end/index.php/authenticate/user/'+username+'/'+password;
            $http.get($scope.corsUrl).success(function (data, headers, status, config) {
                $scope.status = data;
                globalDetails.isAuth = 1;
                //$state.go('dashboard');
            });
        }
    }

});