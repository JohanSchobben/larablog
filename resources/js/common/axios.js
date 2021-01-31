import axios from "axios";
import Cookies from 'js-cookie';

const axiosInstance =  axios.create({
    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
    }
});

axiosInstance.interceptors.request.use(config => {
    const token = Cookies.get('larablogtoken');
    if(!token) return config;
    config.headers['Authorization'] = 'Bearer ' + token;
    return config;
});

export default axiosInstance;

