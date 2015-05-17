/**
 * Created by hokage on 14/5/15.
 */

var ocs = angular.module('cotocs', []);

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
    return globalvar;
});
/*
 ======================================
 SERVICE globalDetails ENDS
 This function will be responsible for defining all global variables for the project
 */

/*
 ======================================
 CONTROLLER headerDisplayHandler BEGINS
 This function will be responsible for defining all the background variables for header
 */
ocs.controller('headerDisplayHandler', function($scope, globalDetails){
    $scope.displayData = {title: globalDetails.projectTitle,
                            author: globalDetails.projectAuthor};
});
/*
 CONTROLLER headerDisplayHandler ENDS
 This function will be responsible for defining all the background variables for header
 ======================================
 */

/*
* =====================================
* CONTROLLER universalHandler BEGINS
* This function will handle tasks on a broader level, not delving in petty businesses
* */
ocs.controller('universalHandler', function($scope, globalDetails){
    $scope.projectTitle = globalDetails.projectTitle;
    $scope.projectAuthor = globalDetails.projectAuthor;
    $scope.collegeName = globalDetails.collegeName;
});
/*
 * CONTROLLER universalHandler ENDS
 * This function will handle tasks on a broader level, not delving in petty businesses
 * =====================================
 * */

/*
 * =====================================
 * CONTROLLER navigationBarHandler BEGINS
 * This function will be responsible for defining all functions of the Navigation Bar
 * PARENT:: universalHandler
 */
ocs.controller('navigationBarHandler', function($scope, globalDetails) {
    $scope.projectTitle = globalDetails.projectTitle;

    $scope.navBarEntries = [
        {
                name: "Home",
                href: "#",
                id: "home-tab-navbar"
            },
            {
                name: "Documents Required",
                href: "#",
                id: "documents-required-navbar"
            },
            {
                name: "Display",
                href: "#",
                id: "display-navbar"
            },
            {
                name: "Login/Register",
                href: "#",
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
                href: "#",
                displayText: "Overview"
            },
            {
                href: "#",
                displayText: "Registered Students"
            },
            {
                href: "#",
                displayText: "Analytics"
            },
            {
                href: "#",
                displayText: "Export"
            },
            {
                href: "#",
                displayText: "Information Tech."
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
