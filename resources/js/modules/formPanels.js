export default {
    namespaced: true,
    state: {
        signIn: 1,
        isShowFormNote: false,
        formNote: {
            title: '',
            body: ''
        },
        error: null
    },
    mutations: {
        changePanel(state) {
            if(state.signIn !== 0) {
                state.signIn = 0
            }else{
                state.signIn = 1
            }
        }
    },
    actions: {
        loginAction(context) {
            context.commit('changePanel');
            context.push('login');
        },
        registerAction(context) {
            context.commit('changePanel');
            context.push('register');
        }
    },
    getters: {
        isSignIn(state) {
            return state.signIn;
        },
    }
}
