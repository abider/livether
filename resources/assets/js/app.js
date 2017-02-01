
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// import App from './components/App.vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';

Vue.use(ElementUI);

Vue.component('example', require('./components/Example.vue'));
Vue.component('room-follow-button', require('./components/RoomFollowButton.vue'));
Vue.component('rooms-items', require('./components/RoomsItems.vue'));
Vue.component('following-rooms-items', require('./components/FollowingRoomsItems.vue'));
Vue.component('all-rooms', require('./components/AllRooms.vue'));
Vue.component('user-following-rooms', require('./components/UserFollowingRooms.vue'));
Vue.component('index-page', require('./components/IndexPage.vue'));
Vue.component('user-page', require('./components/UserPage.vue'));
Vue.component('index-page-room-item', require('./components/IndexPageRoomItem.vue'));
Vue.component('login-button', require('./components/LoginButton.vue'));
Vue.component('login-form', require('./components/LoginForm.vue'));
Vue.component('register-form', require('./components/RegisterForm.vue'));
Vue.component('forgot-password-form', require('./components/ForgotPasswordForm.vue'));
Vue.component('upload-avatar-button', require('./components/UploadAvatarButton.vue'));

const app = new Vue({
    el: '#app',
    // render: h => h(App)
});
