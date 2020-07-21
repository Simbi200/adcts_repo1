
import Vue from 'vue'
import VueRouter from 'vue-router'
import moment from 'moment'
import Swal from 'sweetalert2'
import {Form, HasError, AlertError} from 'vform'
import VueProgressBar from 'vue-progressbar'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

/*------------
vue components
------------*/
import StaffPageAllEmployees from './views/staffhome/StaffPageAllEmployees'
import AdminPeople from './views/adminportal/people/AdminPeople'
import AdminManageAdmins from './views/adminportal/people/AdminManageAdmins'
import UserProfile from './views/UserProfile'
import EmployeeMyProfile from './views/EmployeeMyProfile'
import ThisWeekComments from './views/adminportal/messages/ThisWeekComments'
import Messages from './views/adminportal/messages/Messages'
import AdminDashboard from './views/adminportal/AdminDashboard'
import EmployeeDashboard from './views/employeeportal/EmployeeDashboard'
import EditAdminInfo from './views/adminportal/people/EditAdminInfo'
import EditPerson from './views/adminportal/people/EditPerson'
// import EditAvatar from './views/avatarEditor/src/components/EditAvatar'


require('./bootstrap');
window.Vue = require('vue');
Vue.use(require('vue-resource'));
Vue.use(VueRouter); //Install vue router
Vue.component(HasError.name, HasError); //hundle component errors
Vue.component(AlertError.name, AlertError); //hundle component errors
Vue.use(BootstrapVue)// Install BootstrapVue
Vue.use(IconsPlugin)// Optionally install the BootstrapVue icon components plugin
window.Swal = Swal; //use sweet alert anywhere in my app
window.Form = Form; //use v-form anywhere iun my app

Vue.component('employee-container', require('./views/employeeportal/EmployeeDashContainer.vue').default);
Vue.component('admin-container', require('./views/adminportal/AdminDashContainer.vue').default);
Vue.component('staff-container', require('./views/staffhome/StaffDashContainer.vue').default);
Vue.component('multiselect', require('vue-multiselect').default);

/*-----------------------------
register my components' routers
-----------------------------*/
const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/adminhome-msg1',
      name: 'adminhome-msg1',
      component: ThisWeekComments
    },

    {
      path: '/adminhome-msgs',
      name: 'adminhome-msgs',
      component: Messages
    },

    {
      path: '/employees',
      name: 'employees',
      component: StaffPageAllEmployees
    },

    {
      path: '/adminhome-edit-admin',
      name: 'adminhomeeditad',
      component: EditAdminInfo
    },

    {
      path: '/adminhome-edit-user',
      name: 'adminhomeeditep',
      component: EditPerson
    },

    {
      path: '/adminhome-dash',
      name: 'adminhomedash',
      component: AdminDashboard
    },

    {
      path: '/employeehome-dash',
      name: 'employeehomedash',
      component: EmployeeDashboard
    },

    {
      path: '/adminhome-alladmins',
      name: 'adminhomealladmins',
      component: AdminManageAdmins
    },

    {
      path: '/adminhome-people',
      name: 'adminhomepeople',
      component: AdminPeople
    },

    {
      path: '/employeeprofile',
      name: 'employeeprofile',
      component: UserProfile
    },

    {
      path: '/adminstaffprofile',
      name: 'adminstaffprofile',
      component: UserProfile
    },

    {
      path: '/staffprofile',
      name: 'staffprofile',
      component: EmployeeMyProfile
    },
  ],
});

Vue.filter('upText', function (text) { // capitalize first letter of a string
  if (!text) return ''
  text = text.toString()
  return text.charAt(0).toUpperCase() + text.slice(1)
});


Vue.filter('momentTime', function (datey) { // format my time like: Sunday April 19th, 2020
  return moment(datey).format('MMM Do, YYYY');
});

Vue.filter('momentDateTime', function (datey) { // format my time like: Sunday April 19th, 2020
  return moment(datey).format('MMM Do @ HH:MM');
});

Vue.filter('bDay', function (datey) { // format my time like: Sunday April 19th, 2020
  return moment(datey).format('DD MMMM');
});

Vue.filter('yearsSince', function (datey) { // format my time like: Sunday April 19th, 2020
  return moment().diff(moment(datey), 'years');
});

Vue.filter('monthsSince', function (datey) { // format my time like: Sunday April 19th, 2020
  return moment().diff(moment(datey), 'months');
});

Vue.use(VueProgressBar, { // shows progress bar
  color: 'rgb(30, 255, 30)',
  failedColor: 'red',
  height: '5px'
});

const toast = Swal.mixin({ // toasts an alert
  toast: true,
  position: 'center',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: false
});

const store ={ //vue components global storage
  data:{
    user:null
  }
}

window.store = store; // use the storage anywhere in my app

window.toast = toast; // use the alert anywhere in my app

window.CustomEvent = new Vue(); // use custom event anywhere in my app

const app = new Vue({
  el: '#app',
    router,
});
