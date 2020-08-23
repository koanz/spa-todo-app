export function init(store, router) {
    router.beforeEach((to, from, next) => {
        const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
        const currentUser = store.state.currentUser;

        if(requiresAuth && !currentUser) {
            next('/login');
        }else if(to.path == '/login' && currentUser) {
            next('/');
        }else {
            next();
        }
    });

    axios.interceptors.response.use(null, (error) => {
        console.log(error);
        if (error.response.status == 401) {
            store.commit('logout');
            router.push('/login');
        }
        
        return Promise.error;
    });

    if (store.getters.currentUser) {
        setAuthorization(store.getters.currentUser.token);
    }
}

export function setAuthorization(token) {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`
}