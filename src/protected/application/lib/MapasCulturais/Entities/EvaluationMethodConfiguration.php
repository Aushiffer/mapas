<?php
namespace MapasCulturais\Entities;

use MapasCulturais\App;
use MapasCulturais\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationMethodConfiguration
 * 
 * @property \MapasCulturais\Entities\Opportunity $opportunity Opportunity
 * @property-read \MapasCulturais\Definitions\EvaluationMethod $definition The evaluation method definition
 *
 * @ORM\Table(name="evaluation_method_configuration")
 * @ORM\Entity
 * @ORM\entity(repositoryClass="MapasCulturais\Repository")
 */
class EvaluationMethodConfiguration extends \MapasCulturais\Entity{
    
    use Traits\EntityTypes,
        Traits\EntityMetadata,
        Traits\EntityAgentRelation,
        Traits\EntityPermissionCache;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="role_id_seq", allocationSize=1, initialValue=1)
     */
    protected $id;

    /**
     * The Evaluation Method Slug
     * 
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    protected $_type;

    /**
     * @var \MapasCulturais\Entities\Opportunity
     *
     * @ORM\OneToOne(targetEntity="MapasCulturais\Entities\Opportunity", inversedBy="evaluationMethodConfiguration", cascade="persist" )
     * @ORM\JoinColumn(name="opportunity_id", referencedColumnName="id", nullable=false)
     */
    protected $opportunity;

    /**
     * @var \MapasCulturais\Entities\EvaluationMethodConfigurationAgentRelation[] Agent Relations
     *
     * @ORM\OneToMany(targetEntity="MapasCulturais\Entities\EvaluationMethodConfigurationAgentRelation", mappedBy="owner", cascade="remove", orphanRemoval=true)
     * @ORM\JoinColumn(name="id", referencedColumnName="object_id")
    */
    protected $__agentRelations;


    /**
     * @ORM\OneToMany(targetEntity="MapasCulturais\Entities\EvaluationMethodConfigurationMeta", mappedBy="owner", cascade={"remove","persist"}, orphanRemoval=true)
     */
    protected $__metadata;
    
    /**
     * @ORM\OneToMany(targetEntity="MapasCulturais\Entities\EventPermissionCache", mappedBy="owner", cascade="remove", orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    protected $__permissionsCache;
    
    function setOpportunity(Opportunity $opportunity, $cascade = true){
        $this->opportunity = $opportunity;
        if($cascade){
            $opportunity->setEvaluationMethodConfiguration($this, false);
        }
    }
    
    public function jsonSerialize() {
        $result = parent::jsonSerialize();
        
        $result['opportunity'] = $this->opportunity->simduplify('id,name,singleUrl');
        
        return $result;
    }
    
    public function getDefinition(){
        $app = App::i();
        $definition = $app->getRegisteredEvaluationMethodBySlug($this->_type);
        return $definition;
    }
    
    function getOwner(){
        return $this->opportunity;
    }
    
    //============================================================= //
    // The following lines ara used by MapasCulturais hook system.
    // Please do not change them.
    // ============================================================ //

    /** @ORM\PrePersist */
    public function prePersist($args = null){ parent::prePersist($args); }
    /** @ORM\PostPersist */
    public function postPersist($args = null){ parent::postPersist($args); }

    /** @ORM\PreRemove */
    public function preRemove($args = null){ parent::preRemove($args); }
    /** @ORM\PostRemove */
    public function postRemove($args = null){ parent::postRemove($args); }

    /** @ORM\PreUpdate */
    public function preUpdate($args = null){ parent::preUpdate($args); }
    /** @ORM\PostUpdate */
    public function postUpdate($args = null){ parent::postUpdate($args); }
}
