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
    $scope.projectAuthor = globalDetails.projectAuthor;
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
        var branchApiUrl = "http://localhost/project/back-end/index.php/api/branch_info/" + $scope.branchCode;
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
            case 'bio':
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
            name: "Login",
            href: "#login",
            id: "login-navbar"
        },
        {
            state: "dashboard",
            name: "Dashboard",
            href: "#dashboard",
            id: "dashboard-navbar"
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

/*
* =====================================
* CONTROLLER signinHandler BEGINS
* This function will handle signin related requests
* */
ocs.controller('signinHandler', function ($scope, globalDetails, $http, $location, $state) {
    if($scope.isAuth == 1){
        $state.go('display');
    }else{
        $scope.status = $state.current.name;
        $scope.signin = function (username, password) {
            $scope.corsUrl = 'http://localhost/project/back-end/index.php/authenticate/user/'+username+'/'+password;

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
ocs.controller('dashboardHandler', function ($scope, globalDetails, $http, $location, $state) {
    $scope.formData = {};
    $scope.registerStudent = function () {
           //Registration Code here
    };

    $scope.listStudents = function (){
        var fetchUrl = "http://localhost/project/back-end/index.php/api/list_students/";
        var b = $resource(branchApiUrl);
        $scope.listOfStudents = b.get();
    };
});
/*
 * CONTROLLER dashboardHandler BEGINS
 * This function will handle dashboard related requests
 * =====================================
 * */



ocs.filter('debug', function() {
    return function(input) {
        if (input === '') return 'empty string';
        return input ? input : ('' + input);
    };
});