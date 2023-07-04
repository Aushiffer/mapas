<?php
/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

use MapasCulturais\i;

$this->import('
    v1-embed-tool
    mc-icon
');
?>
<div class="registration-evaluation-actions__buttons" v-if="evaluationRegistrationList">
    <div class="grid-12">
        <div class="col-12" v-if="showActions(registration, 'save')">
            <button class="button button--primary" @click="save()"> <?= i::__('Salvar e continuar depois') ?> </button>
        </div>
        <div class="col-12" v-if="showActions(registration, 'finishEvaluation')"><button class="button button--primary" @click="finishEvaluation()"> <?= i::__('Finalizar avaliação') ?></button></div> 
        <div class="col-12" v-if="showActions(registration, 'finishEvaluation')">
            <button class="button button--primary button--icon" @click="finishEvaluation()"> 
                <?= i::__('Finalizar e avançar') ?> 
                <mc-icon name="arrow-right-ios"></mc-icon>
            </button>
        </div>      
        <div class="col-12" v-if="showActions(registration, 'send')">
            <button class="button button--primary button--icon" @click="send(registration)"> 
                <?= i::__('Enviar avaliação') ?> 
                <mc-icon name="upload"></mc-icon>
            </button>
        </div>
        <div class="col-12" v-if="showActions(registration, 'reopen')">
            <button class="button button--primary" @click="reopen(registration)"> <?= i::__('Reabrir avaliação') ?> </button>
        </div>
        <div class="col-6">
            <button v-if="firstRegistration?.registrationid != registration.id" class="button button--primary-outline button--icon" @click="previous()"> 
                <mc-icon name="arrow-left-ios"></mc-icon>
                <?= i::__('Anterior') ?> 
            </button>
        </div>
        <div class="col-6">
            <button v-if="lastRegistration?.registrationid != registration.id" class="button button--primary-outline button--icon" @click="next()"> 
                <?= i::__('Próximo') ?> 
                <mc-icon name="arrow-right-ios"></mc-icon>
            </button>
        </div>
    </div>
</div>