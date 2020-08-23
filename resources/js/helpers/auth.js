export function login(credentials) {
    return new Promise((resolve, reject) => {
        axios.post('api/auth/login', credentials)
           .then((response) => {
               resolve(response.data);
           })
           .catch((error) => {
               reject("The email or password is not correct. Try again");
           })
    });
}

export function register(credentials) {
    return new Promise((resolve, reject) => {
        axios.post('api/register', credentials)
           .then((response) => {
               resolve(response);
           })
           .catch((error) => {
               reject(error);
           })
           .finally(() => {
                console.log('axios register')
           });
    });
}

export function getLocalUser() {
    const user = localStorage.getItem("user");

    if(!user){
        return null;
    }

    return JSON.parse(user);
}
