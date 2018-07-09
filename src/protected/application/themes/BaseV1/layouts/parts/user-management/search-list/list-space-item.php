<article class="objeto clearfix" ng-repeat="space in spaces" id="space-result-{{space.id}}">
  <div class="objeto-header">
    <h1>{{space.name | capitalize}}</h1>
    <div class="objeto-header-actions">
      <a class="btn btn-default icon icon-space" href="{{space.singleUrl}}"><?php \MapasCulturais\i::_e("Ver Espaço") ?></a>
      <a class="btn btn-default icon icon-user" href="<?php echo $app->createUrl('panel', 'userManagement')?>?userId={{space.owner.userId}}">Info</a>
    </div>
  </div>

  <div class="objeto-content clearfix">
    {{space.shortDescription}}
  </div>

</article>