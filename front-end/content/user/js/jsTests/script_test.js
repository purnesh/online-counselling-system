/**
 * Created by hokage on 16/5/15.
 */
describe('Home Page Tests', function () {

//    Service testing is not yet complete. NEED TO LEARN HOW TO TEST SERVICES
    describe('globalDetails Service', function () {
        xit('should set Global Author Name', function () {
            var $injector = angular.injector(['cotocs']);
            var service = $injector.get('globalDetails');
            expect(service.projectAuthor).toBe('Purnesh Tripathi');
        });
    });


    describe('headerDisplayHandler Controller', function(){
        var $scope;
        beforeEach(module('cotocs'));

        beforeEach(inject(function (_$controller_) {
            $controller = _$controller_;
        }));

        beforeEach(inject(function($rootScope) {
            $scope = $rootScope.$new();
            controller = $controller('headerDisplayHandler', {$scope: $scope});
        }));

        it('should Exist', function () {
            expect(controller).not.toBeNull();
        });

        it('should set Author Name for the webpage', function (){
            expect($scope.displayData.author).toBe('Purnesh Tripathi');
        });

        it('should set Title for the webpage', function (){
            expect($scope.displayData.title).not.toBeNull();
        });
    });

    describe('universalHandler Controller', function(){
        var $scope;
        beforeEach(module('cotocs'));
        beforeEach(inject(function (_$controller_) {
            $controller = _$controller_;
        }));

        beforeEach(inject(function($rootScope) {
            $scope = $rootScope.$new();
            controller = $controller('universalHandler', {$scope: $scope});
        }));

        it('should Exist', function () {
            expect(controller).not.toBeNull();
        });

        it('should import author name from the service', function () {
            expect($scope.projectAuthor).toBe('Purnesh Tripathi');
        });

        it('should import college name from the service', function () {
            expect($scope.collegeName).toBe('College of Technology, GBPUAT, Pantnagar');
        });

        it('should import project name from the service', function () {
            expect($scope.projectTitle).toBe('Online Counselling System');
        });
    });

    describe('navigationBarHandler Controller CHILD OF universalHandler', function(){
        var $scope;
        beforeEach(module('cotocs'));

        beforeEach(inject(function (_$controller_) {
            $controller = _$controller_;
        }));

        beforeEach(inject(function($rootScope) {
            $scope = $rootScope.$new();
            controller = $controller('navigationBarHandler', {$scope: $scope});
        }));

        it('should Exist', function () {
            expect(controller).not.toBeNull();
        });

        it('should contain the link to home page', function () {
           expect($scope.navBarEntries).toEqual(jasmine.arrayContaining([{
               name: "Home",
               href: "#",
               id: "home-tab-navbar"
           }]));
        });

        it('should contain the link to display page', function () {
            expect($scope.navBarEntries).toEqual(jasmine.arrayContaining([{
                name: "Display",
                href: "#",
                id: "display-navbar"
            }]));
        });

        it('should contain the link to documents required page', function () {
            expect($scope.navBarEntries).toEqual(jasmine.arrayContaining([{
                name: "Documents Required",
                href: "#",
                id: "documents-required-navbar"
            }]));
        });

        it('should contain the link to login or register', function () {
            expect($scope.navBarEntries).toEqual(jasmine.arrayContaining([{
                name: "Login/Register",
                href: "#",
                id: "login-register-navbar"
            }]));
        });

    });

});

describe('Dashboard Page Tests', function () {

    describe('dashboardSidebarHandler Controller', function(){
        var $scope;
        beforeEach(module('cotocs'));

        beforeEach(inject(function (_$controller_) {
            $controller = _$controller_;
        }));

        beforeEach(inject(function($rootScope) {
            $scope = $rootScope.$new();
            controller = $controller('dashboardSidebarHandler', {$scope: $scope});
        }));

        it('should Exist', function () {
            expect(controller).not.toBeNull();
        });

        it('should have overview element in the sidebar', function (){
            expect($scope.sidebarEntries.contents).toEqual(jasmine.arrayContaining([
                {
                    href: "#",
                    displayText: "Overview"
                }
            ]));
        });

        it('should have a link to display list of registered students', function () {
            expect($scope.sidebarEntries.contents).toEqual(jasmine.arrayContaining([
                {
                    href: "#",
                    displayText: "Registered Students"
                }
            ]));
        });
    });
});

//Use xit or xdescribe to temporarily disable tests from running