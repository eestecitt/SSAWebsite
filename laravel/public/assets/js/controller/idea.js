angular.module('ecaApp')
.controller('ideaController', ['$scope', '$rootScope', '$state', 'User', 'API',
    function($scope, $rootScope, $state, User, API) {
        $scope.submitted = false;
        $scope.name = '';
        $scope.description = '';
        $scope.showIdea = true;

        User.userPromise().then(function(response) {
            $scope.user = response.data;
            API.Group.get({ groupId: $scope.user.group.id }, function(response){
                $scope.idea = response.idea;
                if ($scope.idea) {
                    $scope.showIdea = false;
                }
            });
        });

        $scope.editIdea = function() {
            $scope.showIdea = true;
        }

        $scope.submitIdea = function() {
            $scope.submitted = true;

            if ($scope.ideaForm.$valid){
                if ($scope.idea){
                    var newIdea = new API.Idea({ ideaId: $scope.idea.id },{ name: $scope.name, description: $scope.description, repository: $scope.repository });
                    newIdea.$update()
                        .then(function ok(response) {
                            API.Group.get({ groupId: $scope.user.group.id }, function(response){
                                $scope.idea = response.idea;
                                $scope.showIdea = false;
                            });
                        }, function err(response) {
                            //do error stuff here
                        });
                } else {
                    var newIdea = new API.Idea({ name: $scope.name, description: $scope.description });
                    newIdea.$save()
                        .then(function ok(response) {
                            API.Group.get({ groupId: $scope.user.group.id }, function(response){
                                $scope.idea = response.idea;
                                $scope.showIdea = false;
                            });
                        }, function err(response) {
                            //do error stuff here
                        });
                }
            }
        }
    }
])
