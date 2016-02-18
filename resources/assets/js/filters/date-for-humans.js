var moment = require('moment');

Vue.filter('dateForHumans', function (date) {
    return moment(date).fromNow();
})