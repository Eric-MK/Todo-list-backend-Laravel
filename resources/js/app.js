import './bootstrap';

import Vue from 'vue'

import App from './vue/app'

const app = new Vue({

    el:'#app',
    components: { App }
});

//This code creates a new Vue instance and attaches it to an HTML element with the id of app. The components property is used to register the App component, which can then be used within the Vue instance.

/* The el property specifies the element that Vue should be bound to. In this case, the Vue instance will be bound to the element with the id of app. This means that Vue will control the HTML and behavior of everything within that element.
 */
