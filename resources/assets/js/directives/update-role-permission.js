Vue.directive('update-role-permission', {

    mixins: [submitAjaxForm],

    onComplete: function(response){
        alert('')
    },

    hasErrors: function(response){
    }

});