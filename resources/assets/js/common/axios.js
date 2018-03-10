import axios from 'axios';

let token = document.head.querySelector('meta[name="csrf-token"]');

export const http = axios.create({
    headers: {
        'X-Requested-With' : 'XMLHttpRequest',
        'X-CSRF-TOKEN' : token ? token.content : null
    }
});