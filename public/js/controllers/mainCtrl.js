angular.module('mainCtrl', [])

.controller('mainController', function($scope, $http, Note) {

    $scope.noteData = {};

    $scope.loading = true;


    // Get all notes
    Note.get()
        .success(function(data) {
            $scope.notes = data;
            $scope.loading = false;
        });

    // Save a note
    $scope.submitNote = function(isValid) {
        $scope.loading = true;
        $scope.submitted = true;

        if (isValid)
        {
          Note.save($scope.noteData)
              .success(function(data) {

                $scope.noteData = {};
                $scope.submitted = false;

                  Note.get()
                      .success(function(getData) {
                          $scope.notes = getData;
                          $scope.loading = false;
                      });
              })
              .error(function(data) {
                  console.log(data);
              });
        }
    };

    // Delete a note
    $scope.deleteNote = function(id) {
        $scope.loading = true;

        Note.destroy(id)
            .success(function(data) {

                Note.get()
                    .success(function(getData) {
                        $scope.notes = getData;
                        $scope.loading = false;
                    });
            });
    };

});
