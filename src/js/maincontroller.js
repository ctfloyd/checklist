app.controller("MainController", function ($scope) {
    $scope.inputValue = "";
    $scope.toDo = [];

    $scope.updateList = function () {
        $scope.toDo.push($scope.inputValue);
        $scope.inputValue = "";
    };

    $scope.hover = function (hoverObject) {
        angular.element(hoverObject.target).addClass('bg-secondary');
    };

    $scope.noHover = function (hoverObject) {
        angular.element(hoverObject.target).removeClass('bg-secondary');
    };
});