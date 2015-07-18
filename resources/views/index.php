<!doctype html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <title>Note App</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>

    <!-- ANGULAR -->
    <script src="js/controllers/mainCtrl.js"></script>

    <script src="js/services/noteService.js"></script>

    <script src="js/app.js"></script>

</head>

<body class="container" ng-app="noteApp" ng-controller="mainController">

  <div class="col-md-6">

    <div class="page-header">

        <h4>Submit your note</h4>

    </div>

    <form ng-submit="submitNote(form.$valid)" name="form" novalidate>

        <div class="form-group">

            <input type="text" class="form-control input-sm" name="subject" ng-model="noteData.subject" placeholder="Subject" ng-class="{'border-danger': form.subject.$error.required && submitted}" required>

        </div>

        <div class="form-group">

            <input type="text" class="form-control input-lg" name="note" ng-model="noteData.note" placeholder="What is your note about" ng-class="{'border-danger': form.note.$error.required && submitted}" required>

        </div>

        <div class="form-group text-right">

            <button type="submit" class="btn btn-primary btn-sm" ng-class="{'btn-green': form.$valid}">Submit</button>

        </div>

    </form>

    <p class="text-center" ng-show="loading">

      <span class="fa fa-check-o fa-5x fa-spin"></span>

    </p>

    <div class="note" ng-hide="loading" ng-repeat="note in notes">

        <h3>{{ note.subject }}</h3>

        <p>{{ note.note }}</p>

        <p>

          <a href="#" ng-click="deleteNote(note.id)" class="text-muted">

            <i class="fa fa-trash-o" style="color:red;"></i>

          </a>

        </p>

    </div>

</div>

</body>

</html>
