import "./bootstrap"
import {createApp} from "vue/dist/vue.esm-bundler";
import CurrencyList from "./Currency/List.vue";

const app = createApp({
    components: {
        'currency-list': CurrencyList,
    },
});
app.mount("#app");
