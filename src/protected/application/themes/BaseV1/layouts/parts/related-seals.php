<?php
if($this->controller->action === 'create')
    return;

$this->addPermitedSealsToJs();
$this->addRelatedSealsToJs($entity);
?>
<div class="agentes-relacionados" ng-controller="RelatedSealsController">
    <div class="widget">
    	<h3>Selos Aplicados </h3>
        <div class="agentes clearfix">
            <div class="avatar ng-scope" ng-repeat="relation in relations" ng-class="{pending: relation.status < 0}" ng-click="deleteRelation(relation)">
               	<a href="{{relation.seal.singleUrl}}" class="ng-scope">
					<img ng-src="{{relation.seal.avatar.avatarMedium.url}}">
				</a>
                <div class="descricao-do-agente">
                    <h1><a href="{{relation.seal.singleUrl}}" class="ng-binding">{{relation.seal.name}}</a></h1>
                </div>
            </div>
        </div>
    </div>
    <div ng-if="seals.length > 0" class="widget">
    	<h3>Selos Disponíveis</h3>
        <div class="agentes clearfix">
            <div ng-if="!sealRelated(seal)" class="avatar" ng-repeat="seal in seals" ng-class="{pending: seal.status < 0}"  ng-click="createRelation(seal)">
                <a href="{{seal.singleUrl}}" class="ng-scope">
                    <img ng-src="{{seal['@files:avatar.avatarMedium'].url}}">
                </a>
				<div class="descricao-do-agente">
					<h1><a href="{{seal.singleUrl}}" class="ng-binding">{{seal.name}}</a></h1>
				</div>
            </div>
        </div>
    </div>
</div>