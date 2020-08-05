import VueRouter from 'vue-router';
import Product from "./components/Product";
import route from "./route";
import Category from "./components/Category";
import Statistics from "./components/Statistics";

export default new VueRouter({
    routes:
    [
        { path:route('shop'), component : Category },
        { path:route('apiProduct'), component : Product },
        { path:route('apiCategory'), component : Category },
        { path:route('statistics'), component : Statistics }
    ],

    mode: 'history'
})
