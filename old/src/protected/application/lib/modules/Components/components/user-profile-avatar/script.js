
app.component('user-profile-avatar', {
    template: $TEMPLATES['user-profile-avatar'],

    props: {
        size: {
            type: String,
            default: 'avatarSmall'
        },

        original: {
            type: Boolean,
            default: false
        }
    },

    setup() { 
        // os textos estão localizados no arquivo texts.php deste componente 
        const text = Utils.getTexts('user-profile-avatar')
        return { text }
    },

    computed: {
        avatarUrl() {
            const globalState = useGlobalState();
            const avatar = globalState.userProfile.files?.avatar;
            return this.original ? 
                avatar?.url:
                avatar?.transformations?.[this.size]?.url;
        },

        loggedIn() {
            const globalState = useGlobalState();
            return !!globalState.userId;
        }
    }
});
