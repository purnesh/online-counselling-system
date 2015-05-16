/**
 * Created by hokage on 14/5/15.
 */

var ocs = angular.module('cotocs', []);

/*
 ======================================
 headerDisplayHandler Controller BEGINS
 This function will be responsible for defining all the background variables for header
 */
ocs.controller('headerDisplayHandler', function($scope){
    $scope.displayData = {title: "Online Counselling System",
                            author: "Purnesh Tripathi"};
});
/*
 headerDisplayHandler Controller ENDS
 This function will be responsible for defining all the background variables for header
 ======================================
 */

/*
 ======================================
 navigationBarHandler Controller BEGINS
 This function will be responsible for defining all functions of the Navigation Bar
 */
ocs.controller('navigationBarHandler', function($scope) {
    $scope.projectTitle = "Online Counselling System";

    $scope.entries = [{name: "Home",
                        href: "index.html",
                        id: "home-tab-navbar"},
                    {name: "Rules",
                        href: "rules.html",
                        id: "rules-tab-navbar"}];
});
/*
 navigationBarHandler Controller ENDS
 This function will be responsible for defining all functions of the Navigation Bar
 ======================================
 */