require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Toasted from 'vue-toasted'
import "./filter";

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

const AccountsList = require('./components/BankAccounts.vue').default
const AccountView = require('./components/Account.vue').default

const routes = [{
		path: '/accounts-list',
		component: AccountsList,
	},
	{
		path: '/account/:id',
		component: AccountView,
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
		},
		difference_percentage (num1, num2) {
			if (num1 > 0 && num2 > 0) {
			  	return ((num1 / num2) * 100 - 100).toFixed()
			}
			return null
		  },
		format_number (val) {
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')
		}
	}
})
