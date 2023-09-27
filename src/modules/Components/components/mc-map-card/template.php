<?php
/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

use MapasCulturais\i;

$this->import('
    mc-link
    mc-title
');
?>
<div class="mc-map-card">
    <div class="mc-map-card__header">
        <div class="mc-map-card__header--image">
            <img v-if="entity.files?.avatar" :src="entity.files?.avatar?.transformations?.avatarMedium.url" />
            <mc-icon v-else :entity="entity"></mc-icon>
        </div>
        <mc-title tag="h5" class="bold">
            <?php i::_e("{{entity.name}}") ?>
        </mc-title>
    </div>

    <div class="mc-map-card__content">
        <div v-if="entity.type" class="mc-map-card__content--info">
            <p class="info">
                <?php i::_e('Tipo:') ?> <strong>{{entity.type.name}}</strong>
            </p>
        </div>

        <div class="mc-map-card__content--info">
            <p class="info">
                <?php i::_e('ONDE: ') ?>
                <strong v-if="entity.endereco">{{entity.endereco}}</strong>
                <strong v-else><?= i::_e("Sem Endereço"); ?></strong>
            </p>
        </div>
        <div v-if="areas" class="mc-map-card__content--info">
            <p v-if="entity.__objectType != 'agent'" class="info">
            <?= i::_e('ACESSIBILIDADE:') ?>
                <strong v-if="entity.acessibilidade">
                   <strong><?= i::_e('Oferece') ?></strong>
                </strong>
                <strong v-else> <?= i::_e('Não') ?>
                </strong>

            </p>
        </div>
        <div v-if="areas" class="mc-map-card__content--info">
            <p class="info">
                <?= i::_e('Áreas de atuação:') ?> ({{entity.terms.area.length}}): <strong>{{areas}}</strong>
            </p>
        </div>
    </div>

    <div :class="['mc-map-card__footer',  entity.__objectType+'__color']">
        <mc-link :entity="entity" icon="access" class="mc-map-card__footer--link" label="<?php i::_e('Acessar') ?>"></mc-link>

    </div>

</div>