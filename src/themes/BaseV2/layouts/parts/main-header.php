<?php
/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */

use MapasCulturais\i;

$this->import('
    mc-header-menu
    mc-header-menu-user
    mc-icon
    mc-messages 
    theme-logo 
');
?>
<?php $this->applyTemplateHook('main-header', 'before') ?>
<header class="main-header" id="main-header">
    <?php $this->applyTemplateHook('main-header', 'begin') ?>

    <div class="main-header__content">

        <?php $this->applyTemplateHook('mc-header-menu', 'before') ?>
        <mc-header-menu>

            <!-- Logo -->
            <template #logo>
                <theme-logo href="<?= $app->createUrl('site', 'index') ?>"></theme-logo>
            </template>
            <!-- Menu principal -->
            <template #default>
                <?php $this->applyTemplateHook('mc-header-menu', 'begin') ?>
                <li>
                    <a href="<?= $app->createUrl('site', 'index') ?>" class="mc-header-menu--item home">
                        <span class="icon"> <mc-icon name="home"></mc-icon> </span>
                        <p class="label"> <?php i::_e('Home') ?> </p>
                    </a>
                </li>
                <li v-if="global.enabledEntities.opportunities">
                    <a href="<?= $app->createUrl('search', 'opportunities') ?>" class="mc-header-menu--item opportunity">
                        <span class="icon opportunity__hover--bg"> <mc-icon name="opportunity"></mc-icon> </span>
                        <p class="label"> <?php i::_e('Oportunidades') ?> </p>
                    </a>
                </li>
                <li v-if="global.enabledEntities.agents">
                    <a href="<?= $app->createUrl('search', 'agents') ?>" class="mc-header-menu--item agent">
                        <span class="icon"> <mc-icon name="agent-2"> </span>
                        <p class="label"> <?php i::_e('Agentes') ?> </p>
                    </a>
                </li>
                <li v-if="global.enabledEntities.events">
                    <a href="<?= $app->createUrl('search', 'events') ?>" class="mc-header-menu--item event">
                        <span class="icon"> <mc-icon name="event"> </span>
                        <p class="label"> <?php i::_e('Eventos') ?> </p>
                    </a>
                </li>
                <li v-if="global.enabledEntities.spaces">
                    <a href="<?= $app->createUrl('search', 'spaces') ?>" class="mc-header-menu--item space">
                        <span class="icon"> <mc-icon name="space"> </span>
                        <p class="label"> <?php i::_e('Espaços') ?> </p>
                    </a>
                </li>
                <li v-if="global.enabledEntities.projects">
                    <a href="<?= $app->createUrl('search', 'projects') ?>" class="mc-header-menu--item project">
                        <span class="icon"> <mc-icon name="project"> </span>
                        <p class="label"> <?php i::_e('Projetos') ?> </p>
                    </a>
                </li>
                <?php $this->applyTemplateHook('mc-header-menu', 'end') ?>
            </template>

        </mc-header-menu>
        <?php $this->applyTemplateHook('mc-header-menu', 'after') ?>

        <div class="main-header__buttons">
            <?php $this->applyTemplateHook('mc-header-menu-user', 'before') ?>
            <?php if ($app->user->is('guest')): ?>
                <!-- Botão login -->
                <a href="<?= $app->createUrl('auth') ?>?redirectTo=<?=$_SERVER['REQUEST_URI']?>" class="logIn">
                    <?php i::_e('Entrar') ?>
                </a>
            <?php else: ?>
                <!-- Menu do usuário -->
                <mc-header-menu-user></mc-header-menu-user>
            <?php endif; ?>
            <?php $this->applyTemplateHook('mc-header-menu-user', 'after') ?>
        </div>

    </div>

    <?php $this->applyTemplateHook('main-header', 'end') ?>
</header>
<?php $this->applyTemplateHook('main-header', 'after') ?>

<mc-messages></mc-messages>