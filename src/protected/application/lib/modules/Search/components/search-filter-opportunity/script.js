app.component('search-filter-opportunity', {
    template: $TEMPLATES['search-filter-opportunity'],

    setup() { 
        // os textos estão localizados no arquivo texts.php deste componente 
        const text = Utils.getTexts('search-filter-opportunity')
        return { text }
    },

    props: {
        position: {
            type: String,
            default: 'list'
        },
        pseudoQuery: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            terms: $TAXONOMIES.area.terms,
        }
    },

    computed: {
    },
    
    methods: {
        actualDate() {
            var data = new Date();
            var dia = String(data.getDate()).padStart(2, '0');
            var mes = String(data.getMonth() + 1).padStart(2, '0');
            var ano = data.getFullYear();

            return (ano + '-' + mes + '-' + dia);
        },

        futureDate() {
            var date = this.actualDate();
            var futureDate = new Date(date.replace(/\-/gi, ', '));
            futureDate.setMonth(futureDate.getMonth() + (1));

            var dia = String(futureDate.getDate()).padStart(2, '0');
            var mes = String(futureDate.getMonth() + 1).padStart(2, '0');
            var ano = futureDate.getFullYear();

            return (ano + '-' + mes + '-' + dia);
        },
        
        openForRegistrations(event) {
            if(event.target.checked) {
                this.pseudoQuery['registrationFrom'] = '<= ' + this.futureDate();
                this.pseudoQuery['registrationTo'] = '>= ' + this.actualDate();
            } else {
                delete this.pseudoQuery.registrationFrom;
                delete this.pseudoQuery.registrationTo;
            }
        }
    },
});
