require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Toasted from 'vue-toasted'

import {
	ValidationProvider,
	ValidationObserver,
} from 'vee-validate';

Vue.use(VueRouter)
Vue.use(Toasted, {
	iconPack: 'fontawesome'
});

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

const Account = require('./components/Account.vue').default

const routes = [{
		path: '/account',
		component: Account,
	},
]

const router = new VueRouter({
	routes,
	mode: 'history'
})

const app = new Vue({
	el: '#app',
	router,
	methods: {
		notification(message, type) {
			var options = {
				theme: "bubble",
				position: "top-right",
				duration: 5000
			}
			if (type === 'error') {
				this.$toasted.error(message, options);
			} else {
				this.$toasted.success(message, options);
			}
		}
	}
})
