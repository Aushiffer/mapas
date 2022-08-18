app.component('search-filter', {
    template: $TEMPLATES['search-filter'],

    setup() { 
        // os textos estão localizados no arquivo texts.php deste componente 
        const text = Utils.getTexts('search-filter')
        return { text }
    },

    props: {
        position: {
            type: String,
            default: 'list'
        },
        api: {
            type: API,
            required: true
        },
        query: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            show: true,
        }
    },

    computed: {
    },
    
    methods: {
        toggleFilter() {
            if (this.position == 'map') {
                this.show = !this.show;
            }
        }
    },
});
