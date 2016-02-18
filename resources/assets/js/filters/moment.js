Vue.filter('moment', function (value) {
    return value.split('').reverse().join('')
})