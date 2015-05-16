/**
 * Created by hokage on 16/5/15.
 */
describe('Home Page Tests', function () {

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

    describe('navigationBarHandler Controller', function(){
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
           expect($scope.entries).toEqual(jasmine.arrayContaining([{name: "Home",href: "index.html", id: "home-tab-navbar"}]));
        });

    });

});

//Use xit or xdescribe to temporarily disable tests from running