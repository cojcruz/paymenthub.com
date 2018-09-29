
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//	require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('sidebar', require('./components/Sidebar'));
Vue.component('sidebar-header', require('./components/SidebarHeader'));
Vue.component('sidebar-nav', require('./components/SidebarNav'));
Vue.component('sidebar-footer', require('./components/SidebarFooter'));
Vue.component('searchform', require('./components/SearchForm'));
Vue.component('report-summary', require('./components/Summary'));
Vue.component('recent-payments', require('./components/RecentPayments'));
Vue.component('form-list', require('./components/FormList'));
Vue.component('data-action', require('./components/DataActions'));
Vue.component('inputcomp', require('./components/InputComp'));

var numeral = require("numeral");

Vue.filter("formatNumber", function (value) {
	return numeral( value ).format("0,0"); // displaying other groupings/separators is possible, look at the docs
});

new Vue({
    el: '#app', 
	
	data:  
		{
					menuItems 		: 		
												[
													{
														'label'		: 'Dashboard', 
														'link'			: '/dashboard',
														'icon'			: 'fa-home'},
													{
														'label'		: 'Messages',
														'link'			: '/dashboard/messages',
														'icon'			: 'fa-comment-dots'},
													{
														'label'		: 'Forms',
														'link'			: '/dashboard/forms',
														'icon'			: 'fa-pen'},
													{
														'label'		: 'Customers',
														'link'			: '/dashboard/customers',
														'icon'			: 'fa-user-astronaut'},
													{
														'label'		: 'Payments',
														'link'			: '/dashboard/payments',
														'icon'			: 'fa-file-invoice-dollar'},
												],
												
					footerItems		: 	
												[
													{ 
														'label'		: 'Users',
														'link'			: '/dashboard/users'},
													{
														'label'		: 'Integrations',
														'link'			: '/dashboard/integrations'},
													{
														'label'		: 'Support',
														'link'			: '/dashboard/support'},
												], 
												
					navToggle 		: 	true,
					
					searchToggle 	: 	false,
					
					summaryToday 	: 
												[
													{
														'label'		: 'Today\'s Payments',
														'currency'	: '$',
														'amount'	: 215645.34,
													}
												],
					summaryMonth	: 
												[
													{
														'label'		: 'Month\'s Payments',
														'currency'	: '$',
														'amount'	: 215645.50,
													}
												],
					summaryYear	: 
												[
													{
														'label'		: 'Year\'s Payments',
														'currency'	: '$',
														'amount'	: 215645.75,
													}
												],
												
					recentPayments	: 	[],
					
					forms				: 	[],
					
					user					: 	[],		
					
					formName			: 	'Form Title',
					
					showEditButton	: 	false,
					
					titleEdit				: 	false,
					
					formInputs			: 	[],
					
				},
	
	methods: {		
		toggleNav() {		

			this.navToggle = !this.navToggle; 
			
		},
		
		toggleSearch() {
			
			this.searchToggle = !this.searchToggle;
			
		},
		
		createForm() {
			console.log('create form');
		},
		
		saveForm() {
			console.log('save form');
		},
		
		cancelForm() {
			console.log('cancel form');
		},
		
		showEditbtn() {
			
			this.showEditButton = !this.showEditButton;
			
		},
		
		editFormTitle() {
			
			this.titleEdit = true;
			
		},
		
		closeTitleEdit() {
			
			this.titleEdit = false;
			this.showEditbutton = false;
			
		},
		
		insertDOM(options) {

			this.formInputs.push({
				'type' : options.type, 
				'name' : options.name, 
				'placeholder' : options.placeholder, 
				'options' : options.options != null ? options.options : [], 
				'class' : options.class, 
				'id' : options.id,
				'required' : false,
				'order' : '',
			});
			
		},
		
		deletethis( index ) {
			
			this.formInputs.splice( index , 1 );
			
		}
	},
	
	computed: {
		
	},

	mounted() {
		
		if ( window.location.pathname === '/dashboard' ) {
			axios.get('/api/payments/activity').then( response => this.recentPayments = response.data ); // Retrieve 
		}
		 
		//axios.get('/dashboard/forms/list').then( response => this.recentPayments = response.data );
	}
});