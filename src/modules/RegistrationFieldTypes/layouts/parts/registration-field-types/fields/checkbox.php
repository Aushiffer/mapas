<label><input ng-required="requiredField(field)" ng-model="entity[fieldName]" ng-click="saveField(field, entity[fieldName])" type="checkbox" ng-true-value="'true'"/> {{::field.title}}</label>