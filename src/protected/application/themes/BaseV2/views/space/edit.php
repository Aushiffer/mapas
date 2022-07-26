<?php 
use MapasCulturais\i;
$this->layout = 'entity'; 
$this->import('
        entity-header entity-cover entity-profile 
        entity-field entity-terms entity-social-media 
        entity-links entity-gallery entity-gallery-video
        entity-admins entity-related-agents entity-owner
        mapas-container mapas-card');
?>

<div class="main-app">

    <entity-header :entity="entity" :editable="true"></entity-header>

    <mapas-container>

        <mapas-card class="feature">
            <template #title>
                <h3 class="card__title--title"><?php i::_e("Informações de Apresentação")?></h3>
                <p class="card__title--description"><?php i::_e("Os dados inseridos abaixo serão exibidos para todos os usuários")?></p>
            </template>
            <template #content>
                
                <div class="left">
                    <div class="row">
                        <div class="col-12">
                            <entity-cover :entity="entity"></entity-cover>
                        </div>
                    </div>    
                    
                    <div class="row v-center">
                        <div class="col-3 col-sm-12">
                            <entity-profile :entity="entity"></entity-profile>
                        </div>

                        <div class="col-9 col-sm-12">
                            <!-- <entity-field :entity="entity" label="Nome do Evento" prop="name"></entity-field> -->
                            <!-- <entity-field :entity="entity" label="Subtítulo do evento" prop="subTitle"></entity-field> -->
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <!-- <entity-field :entity="entity" prop="shortDescription"></entity-field> -->
                            <!-- <entity-field :entity="entity" label="Link para página ou site do evento" prop="site"></entity-field> -->
                        </div>
                    </div>                    
                </div>

                <div class="divider"></div>

                <div class="right">
                    <!-- <entity-terms :entity="entity" taxonomy="area" :editable="true" title="Áreas de interesse"></entity-terms> -->
                    <entity-social-media :entity="entity" :editable="true"></entity-social-media>
                </div>
                

            </template>
        </mapas-card>

        <main>         
            <mapas-card>
                <template #title>
                    <h3 class="card__title--title"><?php i::_e("Data, hora e local do evento"); ?></h3>
                    <p class="card__title--description"><?php i::_e("Adicione data, hora e local da ocorrência do seu evento. Você pode várias ocorrências com informações diferentes."); ?></p>
                </template>
                <template #content>   
                
                </template>   
            </mapas-card>

            <mapas-card>
                <template #title>
                    <h2><?php i::_e("Informações sobre o evento"); ?></h2>
                    <div class="row">
                        <div class="col-6">
                            <!-- <entity-field :entity="entity" label="Total de público"></entity-field> -->
                        </div>
                        <div class="col-6">
                            <entity-field :entity="entity" label="Telefone para informações sobre o evento" prop="telefonePublico"></entity-field>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-12">
                        <!-- <entity-field :entity="entity" label="Informações sobre a inscrição" prop="registrationInfo"></entity-field> -->

                        </div>
                    </div>
                </template>
                <template #content>   
                
                </template>   
            </mapas-card>

            <mapas-card>
                <template #title>
                    <h2><?php i::_e("Acessibilidade"); ?></h2>
                </template>
                <template #content>   
                
                </template>   
            </mapas-card>

            <mapas-card>
                <template #title>
                    <h2><?php i::_e("Mais informações públicas"); ?></h2>
                    <p><?php i::_e("Os dados inseridos abaixo assim como as informações de apresentação também são exibidos publicamente"); ?></p>
                </template>
                <template #content>
                    <div class="row">
                        <div class="col-12">
                            <entity-links title="Adicionar links" :entity="entity" :editable="true"></entity-links>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <entity-gallery-video title="<?php i::_e('Adicionar vídeos') ?>" :entity="entity" :editable="true"></entity-gallery-video>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <entity-gallery title="<?php i::_e('Adicionar fotos na galeria') ?>" :entity="entity" :editable="true"></entity-gallery>
                        </div>
                    </div>
                </template>  
            </mapas-card>
        </main>

        <aside>
            <mapas-card>
                <template #content>
                    <div class="row">
                        <div class="col-12">
                            <entity-admins :entity="entity" :editable="true"></entity-admins>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <entity-terms :entity="entity" taxonomy="tag" title="Tags" :editable="true"></entity-terms>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <entity-related-agents :entity="entity" :editable="true"></entity-related-agents>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <entity-owner :entity="entity" title="Publicado por" :editable="true"></entity-owner>
                        </div>
                    </div>
                </template>
            </mapas-card>
        </aside>

    </mapas-container>

</div>