import axios from "axios";

export async function Get(url){
    const res = axios.get(url);

    return res.data;
};

export async function Post(url,userData){
    const res = await axios.post(url, userData)

    return res.data;
};

async function Put(url,param){

};

export async function Delete(url,keys){
    const res = await axios.delete(url, { params: keys });

    return res.data;

};
