/**
 * Created by edgar on 03/06/16.
 */
var app = angular.module('todoApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('cmsController', function($scope, $http) {

    $scope.variables = [];
    $scope.loading = false;

    $scope.init = function() {
        $scope.loading = true;
        $http.get('/variables1').
        success(function(data, status, headers, config) {
            $scope.variables = data;
            console.log(2);
            $scope.loading = false;

        });
    }

    $scope.addTodo = function() {
        $scope.loading = true;

        $http.post('/home', {
            title: $scope.todo.title,
            done: $scope.todo.done
        }).success(function(data, status, headers, config) {
            $scope.todos.push(data);
            $scope.todo = '';
            $scope.loading = false;

        });
    };

    $scope.updateTodo = function(todo) {
        $scope.loading = true;

        $http.put('/home' + todo.id, {
            title: todo.title,
            done: todo.done
        }).success(function(data, status, headers, config) {
            todo = data;
            $scope.loading = false;

        });;
    };

    $scope.deleteTodo = function(index) {
        $scope.loading = true;

        var todo = $scope.todos[index];

        $http.delete('/home' + todo.id)
            .success(function() {
                $scope.todos.splice(index, 1);
                $scope.loading = false;

            });;
    };


    $scope.init();

});