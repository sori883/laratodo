import Vue from 'vue'
window._ = require('lodash');

/**
 * BootstrapVue
 */
import {BootstrapVue, BootstrapVueIcons} from 'bootstrap-vue'
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

/**
 * VeeValidate
 */
import {
    ValidationObserver,
    ValidationProvider,
    extend,
    localize
} from 'vee-validate';

import ja from './lang/validate.json';
import * as rules from 'vee-validate/dist/rules';

// ルールと言語をインストール
Object.keys(rules).forEach((rule) => {
    extend(rule, rules[rule]);
});

localize('ja', ja)

// 全てのコンポーネントで使用出来るようにする
Vue.component('ValidationObserver', ValidationObserver)
Vue.component('ValidationProvider', ValidationProvider)

/**
 * DataPicker
 */
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker'
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css'
Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker)

/**
 * Moment
 */
Vue.use(require('vue-moment'));

/**
 * Font Awesome
 */
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas, far, fab)
Vue.component('awesome-icon', FontAwesomeIcon)

/**
 * axios
 */
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// CSRFトークンをCookieから取得して、ヘッダーに付与する
import { getCookieValue } from './util'
window.axios.interceptors.request.use((config) => {
    config.headers['X-XSRF-TOKEN'] = getCookieValue('XSRF-TOKEN')

    return config
})
