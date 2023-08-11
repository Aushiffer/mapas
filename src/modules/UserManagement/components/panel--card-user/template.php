<?php
/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

use MapasCulturais\i;

$this->import('
    mc-confirm-button
    mc-link
    panel--entity-card 
    user-management--add-role-modal
');
?>
<panel--entity-card :entity="entity">
    <template #title>
        <slot name="card-title" :entity="entity" v-if="entity.profile">{{username}}</slot>
    </template>
    <template #header-actions>
        <slot name="card-actions"></slot>
    </template>

    <template #subtitle>
        <code>ID: {{entity.id}}</code>
    </template>

    <template #default>
        <div class="mc-tag-list">
            <h4><?=i::__('Funções do usuário:')?></h4>
            <ul class="mc-tag-list__tagList">
                <li v-for="role in roles" class="primary__border--solid primary__color mc-tag-list__tag mc-tag-list__tag--editable">
                    <strong v-if="role.subsite">{{`<?= i::esc_attr__('${role.name} em ${role.subsite.name}') ?>`}}</strong>
                    <strong v-else>{{role.name}}</strong>
                    <mc-confirm-button 
                        :message="`<?= i::esc_attr__('Deseja remover a função "${role.name}" do usuário "${username}"?') ?>`"
                        @confirm="deleteRole(role)">
                        <template #button="modal">
                            <mc-icon @click="modal.open()" name='delete'></mc-icon>
                        </template>
                        
                    </mc-confirm-button>
                </li>
                <user-management--add-role-modal :user="entity"></user-management--add-role-modal>
            </ul>
        </div>
    </template>

    <template #entity-actions-right>
        <mc-link route="panel/user-detail" :params="[entity.id]" class="button button--primary-outline button--icon" icon="arrow-right" right-icon>
            <?= i::__('Acessar') ?>
        </mc-link>
    </template>
</panel--entity-card>