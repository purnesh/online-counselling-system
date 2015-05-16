/**
 * Created by hokage on 14/5/15.
 */

var ocs = angular.module('cotocs', []);

/*
 ======================================
 SERVICE globalDetails BEGINS
 This function will be responsible for defining all global variables for the project
 */
ocs.service('globalDetails', function () {
    this.projectTitle = "Online Counselling System";
    this.projectAuthor = "Purnesh Tripathi";
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
 ======================================
 CONTROLLER navigationBarHandler BEGINS
 This function will be responsible for defining all functions of the Navigation Bar
 */
ocs.controller('navigationBarHandler', function($scope, globalDetails) {
    $scope.projectTitle = globalDetails.projectTitle;

    $scope.navBarEntries = [{
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
                                name: "Rules",
                                href: "#",
                                id: "rules-tab-navbar"
                            },
                            {
                                name: "Login/Register",
                                href: "#",
                                id: "login-register-navbar"
                            }];
    $scope.selectedEntry = 0;
    $scope.selectEntry = function(row){
        $scope.selectedEntry = row;
    }
});
/*
 CONTROLLER navigationBarHandler ENDS
 This function will be responsible for defining all functions of the Navigation Bar
 ======================================
 */
