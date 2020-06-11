/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/Notification.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
window.Vue = Vue.use(require('vue-resource'));

Vue.component('notification', require('./components/Notification.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// import Vue from 'vue';
// Vue.use(require('vue-resource'));

// Vue.use(require('vue-resource'));
window.onload = function () {
    const app = new Vue({
        el: '#notification',
        data: {
            event: '',
            userId: '',
            notifications: [{
                body: '',
                relatedId: '',
                date: ''
            }]
        },
        created: function () {
            this.fetchData();
        },
        mounted(){
            this.$data.userId = document.querySelector("meta[name='user-id']").getAttribute('content');
            // console.log(this.$data.userId);
            Echo.private('user.'+ this.$data.userId)
                .listen('PostLiked',(e)=>{
                    console.log(e);
                    this.$data.notifications.unshift({'body':e.currentUser.name+' Liked your post '+e.post.id,relatedId:e.post.id,'date':new Date()});
                });
        },
        methods:{
            addItem(){
                console.log('xd');
                // this.data.notifications.notification.push(1);
            },fetchData: function () {
                // console.log(this.$http);
                this.$http.get('/notification').then(function(data){
                    // console.log(data.body);
                    this.$data.notifications =[];
                    for(var i=0;i<data.body.length;i++){
                        this.$data.notifications.push(
                            data.body[i].type.includes('PostLiked')?
                                {body: data.data[i].data['currentUser']['name']+' Liked your post '+data.data[i].data['post']['id'],
                                    relatedId:data.data[i].data['post']['id'],date:data.data[i].created_at}
                                :{body:'x',date:''});
                    }
                });
            },
        },
        send(){
            this.data.notifications.notification.push(this.event);
        }
    });
//     const example = new Vue({
//         el: '#example',
//         data: {
//             item: {message: 'xx'},
//             items: [
//                 {message: 'Foo'},
//                 {message: 'Bar'},
//             ]
//         },
//         created: function () {
//             this.fetchData()
//         },
//         methods: {
//             fetchData: function () {
//                 // console.log(this.$http);
//                 this.$http.get('/notification').then(function(data){
//                     console.log(data.body);
//                     for(var i=0;i<data.body.length;i++){
//                         this.$data.items.push({message: data.body[i].type.toString()});
//                     }
//                     // const items = JSON.parse(data.body);
//                     //
//                     // console.log(items);
//                     // this.$data.items.push(data.body)
//                 // this.posts = data;
//                 });
//             },
//             addItemx() {
//                 console.log({message: 'new message'});
//                 this.$data.items.push(this.$data.item)
//             }
//         }
//     });
};
// window.Echo.pusher.connection.bind('connected', function () {
//     window.axios.defaults.headers.common['X-Socket-Id'] = window.Echo.socketId();
// });