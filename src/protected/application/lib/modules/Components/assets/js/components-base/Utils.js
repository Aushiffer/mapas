globalThis.__ = (key, componentName) => {
    const dict = Utils.getTexts(componentName);
    return dict(key);
}

globalThis.Utils = {
    getTexts(componentName) {
        const texts = $MAPAS.gettext?.[`component:${componentName}`] || {};
        return (key) => {
            return texts[key];
        };
    },

    getObjectProperties (obj) {
        var keys = [];
        for (var key in obj) {
            keys.push(key);
        }
        return keys;
    },

    sortOjectProperties (obj) {
        var newObj = {};

        this.getObjectProperties(obj).sort().forEach(function (e) {
            newObj[e] = obj[e];
        });

        return newObj;
    },

    isObjectEquals (obj1, obj2) {
        return JSON.stringify(this.sortOjectProperties(obj1)) === JSON.stringify(this.sortOjectProperties(obj2));
    },

    inArray (array, obj) {
        for (var i in array) {
            if (this.isObjectEquals(array[i], obj)) {
                return true;
            }
        }
        return false;
    },

    arraySearch (array, obj) {
        for (var i in array) {
            if (this.isObjectEquals(array[i], obj)) {
                return i;
            }
        }
        return false;
    },

    createUrl(controllerId, action_name, args) {
        const shortcuts = $MAPAS.routes.shortcuts;
        const actions = $MAPAS.routes.actions;
        const controllers = $MAPAS.routes.controllers;
        const api = action_name.indexOf('api/') === 0;
        if(api) {
            action_name = action_name.substr(4);
        }
        
        let route = '';
        
        action_name = action_name || $MAPAS.routes.default_action_name;
        
        if (args) {
            args = this.sortOjectProperties(args);
        }

        if (args && this.inArray(shortcuts, [controllerId, action_name, args])) {
            route = this.arraySearch(shortcuts, [controllerId, action_name, args]) + '/';
            args = null;
        } else if (this.inArray(shortcuts, [controllerId, action_name])) {
            route = this.arraySearch(shortcuts, [controllerId, action_name]) + '/';
        } else {
            if (this.inArray(controllers, controllerId)) {
                route = this.arraySearch(controllers, controllerId) + '/';
            } else {
                route = controllerId + '/';
            }

            if (action_name !== $MAPAS.routes.default_action_name) {
                if (this.inArray(actions, action_name)) {
                    route += this.arraySearch(actions, action_name) + '/';
                } else {
                    route += action_name + '/';
                }
            }
        }

        if (args) {
            for (var key in args) {
                var val = args[key];
                if (key == parseInt(key)) { // is integer
                    route += val + '/';
                } else {
                    route += key + ':' + val + '/';
                }
            }
        }

        if(api) {
            return new URL($MAPAS.baseURL + `api/${controllerId}/${action_name}`);
        } else {
            return new URL($MAPAS.baseURL + route);
        }
        
    }
}