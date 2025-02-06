import axios from 'axios';
import _ from 'lodash';

window._ = _

window.axios = axios

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import Echo from "laravel-echo"
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    wsHost: window.location.hostname,
    wsPort: 6001,
    wssPort: 6001,
    forceTLS: false,
    enabledTransports: ['ws', 'wss'],
});


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
