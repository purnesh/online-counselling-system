/**
 * Created by hokage on 14/5/15.
 */

var ocs = angular.module('cotocs', []);

ocs.controller('headerDisplayHandler', function($scope){
    $scope.displayData = {title: "Online Counselling System",
                            author: "Purnesh Tripathi"};
});

ocs.controller('navigationBarHandler', function($scope) {
    $scope.projectTitle = "Online Counselling System";

    $scope.entries = [{name: "Home",
                        href: "index.html",
                        id: "home-tab-navbar"},
                    {name: "Rules",
                        href: "rules.html",
                        id: "rules-tab-navbar"}];
});


