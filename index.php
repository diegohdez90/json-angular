<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<body>

<div ng-app="myApp" ng-controller="customersCtrl" class="container"> 

    <div class="jumbotron">
        <table class="table">
          <thead>
            <th>Folio</th>
            <th>Referencia</th>
            <th>Materiales</th>
            <th>Micas</th>
            <th>Armazones</th>
            <th>Tratamiento</th>
            <th>Tipo</th>
          </thead>
          <tbody>
              <tr ng-repeat="x in biseles">
                <td>{{ x.Folio }}</td>
                <td>{{ x.Referencia }}</td>
                <td>{{ x.Materiales }}</td>
                <td>{{ x.Micas }}</td>
                <td>{{ x.Armazones }}</td>
                <td>{{ x.Tratamiento }}</td>
                <td>{{ x.Tipos }}</td>
              </tr>
          </tbody>
        </table>
    </div>
</div>

<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("pedidos.php")
    .then(function (response) {$scope.biseles = response.data.results;});
});
</script>

</body>
</html>
