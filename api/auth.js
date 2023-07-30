import axios from "/api/axios.js";

const register = registrationData => {
    return axios.post('/register', registrationData);
}

export default {
    register
}
