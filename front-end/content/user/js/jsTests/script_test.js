/**
 * Created by hokage on 16/5/15.
 */

describe('headerDisplayController function', function(){
    var $scope;
    beforeEach(module('cotocs'));

    beforeEach(inject(function (_$controller_) {
        $controller = _$controller_;
    }));

    beforeEach(inject(function($rootScope) {
        $scope = $rootScope.$new();
        controller = $controller('headerDisplayController', {$scope: $scope});
    }));



    it('should set title for the webpage', function (){
        expect($scope.displayData.author).toBe('Purnesh Tripathi');
    });

});