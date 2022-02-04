<?php
use MapasCulturais\i;
$this->import('modal');
?>
<modal :close-button="false">
    <slot v-if="hasSlot('message')" name="message" :cancel="cancel" :confirm="confirm"></slot>
    <div v-if="!hasSlot('message')">{{message}}</div>

    <template #button="modal">
        <slot name="button" :open="modal.open">
            <button class="button" :class="buttonClass" @click="modal.open()"><slot></slot></button>
        </slot>
    </template>

    <template #actions="modal">
        <button @click="confirm(modal)">{{yes || "<?php i::_e("Sim") ?>"}}</button>
        <button @click="cancel(modal)">{{no || "<?php i::_e("Não") ?>"}}</button>
    </template>
</modal>
