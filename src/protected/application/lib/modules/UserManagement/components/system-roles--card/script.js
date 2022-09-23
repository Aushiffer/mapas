app.component('system-roles--card', {
    template: $TEMPLATES['system-roles--card'],
    emits: [],

    setup() { 
        // os textos estão localizados no arquivo texts.php deste componente 
        const text = Utils.getTexts('system-roles--card')
        return { text }
    },

    props: {
        entity: {
            type: Entity,
            required: true
        }
    },

    computed: {
        permissions() {
            const permissions = {};

            for (let permissionString of this.entity.permissions) {
                const permission = permissionString.split('.');
                const entity = permission[0];
                const action = permission[1];

                permissions[entity] = permissions[entity] || {entity, actions: []};

                for(let per of $MAPAS.EntityPermissionsList[entity]) {
                    if (per.permission == action) {
                        permissions[entity].actions.push({permissionString, ...per});
                        break;
                    }
                }
            }
            console.log(Object.values(permissions));
            return Object.values(permissions);
        }
    },
    
    methods: {
        
    },
});
