/*
* maru 追加 
* setting.bladeにあるスライダーのVueコンポーネント
*/

window.Vue = require('vue');
//window.Vue = require('vue-template-compiler');

import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/default.css'

//import Grid from 'vue-js-grid'

console.log('vueSlider');

let app = new Vue({
    el: '#app',
    components: {
        'vueSlider': VueSlider,
    },
    data: {
        divWidth: 100,
        value1: 2,
        targetAge: [18, 30]
    },
    computed: {
        getWidth: function () {
            return this.value1;
        },
        getTargetAge: function () {
            return this.targetAge[0];
        },
        test: function(i) {
            return this.targetAge[i];
        }
    }
});