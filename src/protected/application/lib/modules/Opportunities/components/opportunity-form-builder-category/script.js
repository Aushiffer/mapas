app.component('opportunity-form-builder-category' , {
    template: $TEMPLATES['opportunity-form-builder-category'],
    props: {
        entity: {
            type: Entity,
            required: true
        }
    },
    setup() {
        // os textos estão localizados no arquivo texts.php deste componente
        const text = Utils.getTexts('opportunity-form-builder-category');
        return { text }
    },
    created () {
      this.phase = $DESCRIPTIONS.opportunity;
    },
    data () {
      return {
          phase: null
      }
    },
    computed: {
    }
});