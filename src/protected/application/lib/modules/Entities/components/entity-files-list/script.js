app.component('entity-files-list', {
    template: $TEMPLATES['entity-files-list'],
    emits: [],

    setup() { 
        // os textos estão localizados no arquivo texts.php deste componente 
        const text = Utils.getTexts('entity-files-list')
        return { text }
    },

    created() {

    },

    computed: {
        files() {
            return this.entity.files?.[this.group] || null
        }
    },

    props: {
        entity: {
            type: Entity,
            required: true
        },
        group: {
            type: String,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        editable: {
            type: Boolean,
            default: false
        },
        classes: {
            type: [String, Array, Object],
            required: false
        },

    },
    
    data() {
        return {
            newFile: {}
        }
    },

    methods: {
        setFile() {
            this.newFile = this.$refs.file.files[0];
        },

        upload(popover) {
            let data = {
                group: this.group, 
                description: this.newFile.description
            };

            this.entity.upload(this.newFile, data).then((response) => {
                this.$emit('uploaded', this);
                popover.close()
            });

            return true;
        },

        rename(file, popopver) {
            file.description = file.newDescription;
            file.save().then(() => popopver.close());
        } 
    },
});
