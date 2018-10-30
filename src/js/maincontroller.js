app.controller("MainController", function ($scope, $http) {
    $http.get("php/retrieveItems.php").then(function (data) {
        console.log(data);
        if (data.data == "ERROR") {
            window.location.replace("login.html");
        }
        for (item of data.data) {
            $scope.toDo.push(item["checklistItem"]);
        }
    });

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