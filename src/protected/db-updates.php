<?php
namespace MapasCulturais;

$app = App::i();
$em = $app->em;
$conn = $em->getConnection();
return array(
    'alter table space add column public' => function() use ($conn){
        $conn->executeQuery('ALTER TABLE space ADD COLUMN public BOOLEAN NOT NULL DEFAULT false;');
    },
    
    'alter table agent add column parent_id' => function() use ($conn){
        $conn->executeQuery('ALTER TABLE agent ADD COLUMN parent_id INTEGER;');
        $conn->executeQuery('ALTER TABLE ONLY agent ADD CONSTRAINT agent_agent_fk FOREIGN KEY (parent_id) REFERENCES agent(id);');
    },
            
    'alter occurrence fk' => function() use($conn) {
        $conn->executeQuery("
            ALTER TABLE public.event_occurrence_cancellation
                DROP CONSTRAINT event_occurrence_fk,
                ADD CONSTRAINT event_occurrence_fk
                   FOREIGN KEY (event_occurrence_id)
                   REFERENCES event_occurrence(id)
                   ON DELETE CASCADE");
        
        $conn->executeQuery("
            ALTER TABLE public.event_occurrence_recurrence
                DROP CONSTRAINT event_occurrence_fk,
                ADD CONSTRAINT event_occurrence_fk
                   FOREIGN KEY (event_occurrence_id)
                   REFERENCES event_occurrence(id)
                   ON DELETE CASCADE");
    },
    
    'alter tables to change CHAR to VARCHAR' => function() use ($conn){
        $conn->executeQuery('ALTER TABLE ONLY agent_meta ALTER COLUMN key TYPE character varying(32);');
        $conn->executeQuery('ALTER TABLE ONLY event_meta ALTER COLUMN key TYPE character varying(32);');
        $conn->executeQuery('ALTER TABLE ONLY space_meta ALTER COLUMN key TYPE character varying(32);');
        $conn->executeQuery('ALTER TABLE ONLY project_meta ALTER COLUMN key TYPE character varying(32);');
        $conn->executeQuery('ALTER TABLE ONLY metadata ALTER COLUMN key TYPE character varying(32);');
        $conn->executeQuery('ALTER TABLE ONLY file ALTER COLUMN grp TYPE character varying(32);');
    }
);
