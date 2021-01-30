import axios from "axios";
import Cookies from 'js-cookie';

const axiosInstance =  axios.create({
    headers: {
        "Content-Type": "Application/json",
        "Accept": "Application/json"
    }
});

axiosInstance.interceptors.request.use(config => {
    config.headers['Content-Type'] = 'application/json';
    config.headers['Accept'] = 'application/json';
});

axiosInstance.interceptors.request.use(config => {
    const token = Cookies.get('larablogtoken');
    if(!token) return config;
    config.headers['Authorization'] = 'Bearer ' + token
});

export default axiosInstance;

