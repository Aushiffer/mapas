<?php

use MapasCulturais\i;

$this->import('modal entities loading');
?>
 
 <modal title="<?php i::esc_attr_e('Adicionar função ao usuário') ?> " @open="createInstance()"> 
    <template #default>
        <entities #default="{entities}" type="system-role" select="id,status,name,slug,permissions" v-if="instance">
            <label><?= i::__('Função') ?></label>
            <select v-model="instance.name">
                <option v-for="role in entities" v-bind:value="role.slug">{{role.name}}</option>
            </select>
        </entities>
        <entities #default="{entities}" type="subsite" select="id,status,name" v-if="instance">
            <label><?= i::__('Subsite') ?></label>
            <select v-model="instance.subsiteId">
                <option v-for="subsite in entities" v-bind:value="subsite.id" v-if="entities">{{subsite.name}}</option>
            </select>
        </entities>
    </template>
    
    <template #actions="modal">
        <button class="button is-solid" @click="create(modal)"><?php i::_e("Confirmar") ?></button>
        <button class="button is-solid"><?php i::_e("Cancelar") ?></button>
    </template>

    <template #button="modal">
        <a @click="modal.open()">
            <?=i::__('Adicionar função')?>
            <mc-icon name="add"></mc-icon>
        </a>
    </template>   
</modal>
