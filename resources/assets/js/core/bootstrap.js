// Load Vue
if (window.Vue === undefined) {
    window.Vue = require('vue');
}

// Load Underscore.js, used for map / reduce on arrays.
if (window._ === undefined) {
    window._ = require('underscore');
}

require('vue-resource');

Vue.config.debug = true;

// Load jQuery and Bootstrap jQuery, used for front-end interaction.
if (window.$ === undefined || window.jQuery === undefined) {
    window.$ = window.jQuery = require('jquery');
}

// Bootstrap JS
require('bootstrap-sass')

// Register Vue Custom Directives
require('./directives')

// Register Vue components
require('./components')

// Register Vue filters
require('./filters')

// Initialize Jupiter CMS App
new Vue({
    el: '#jupiter-cms-app',
});