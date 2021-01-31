import axios from "axios";

export default axios.create({
    headers: {
        "Content-Type": "Application/json",
        "Accept": "Application/json"
    }
});
