angular.module('noteService', [])

.factory('Note', function($http) {

    return {
        // get all the notes
        get : function() {
            return $http.get('/api/notes');
        },

        // save a comment (pass in note data)
        save : function(noteData) {
            return $http({
                method: 'POST',
                url: '/api/notes',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(noteData)
            });
        },

        // destroy a note
        destroy : function(id) {
            return $http.delete('/api/notes/' + id);
        }
    }

});
