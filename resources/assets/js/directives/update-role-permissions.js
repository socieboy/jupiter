Vue.directive('update-role-permissions', {

    mixins: [submitAjaxForm],

    onComplete: function(response){
        alert('')
    },

    hasErrors: function(response){
    }

});