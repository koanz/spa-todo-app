import { getLocalUser } from './helpers/auth'

import formPanels from './modules/formPanels'
import itemsModule from './modules/itemsModule'
import noteModule from './modules/noteModule'
import todoModule from './modules/todoModule'

const user = getLocalUser();

export default {
    namespaced: true,
    state: {
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        authError: null,
        items: []
    },
    getters: {
        isLoading(state) {
            return state.loading;
        },
        isLoggedIn(state) {
            return state.isLoggedIn;
        },
        currentUser(state) {
            return state.currentUser;
        },
        authError(state) {
            return state.authError;
        },
        items(state) {
            return state.items;
        },
        itemsCount(state) {
            return state.items.length > 0 ? state.items.length : 0;
        }
    },
    mutations: {
        login(state) {
            state.loading = true;
            state.authError = null;
        },
        loginSuccess(state, payload) {
            state.authError = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});

            localStorage.setItem("user", JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload) {
            state.loading = false;
            state.authError = payload.error;
        },
        logout(state) {
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;
        },
        updateListOfItems(state, payload) {
            state.items = payload;
        },
        updateItemFromTheList(state, payload) {

        },
        addNewItemToTheList(state, payload) {
            state.items.unshift(payload);
        }
    },
    actions: {
        login(context) {
            context.commit("login");
        },
        register(context) {
            
        },
        getNotes(context) {
            axios.get('/api/notes', {
                headers: {
                    "Authorization": `Bearer ${context.state.currentUser.token}`
                }
            }).then((response) => {
                context.commit('updateListOfItems', response.data.items);
            })
        },
        getItems(context) {
            axios.get('/api/', {
                headers: {
                    "Authorization": `Bearer ${context.state.currentUser.token}`
                }
            }).then((response) => {
                context.commit('updateListOfItems', response.data.items);
            })
        }
    },
    modules: {
        // note,
        formPanels,
        itemsModule, //Rename to: HomeModule
        noteModule,
        todoModule
    }
}
