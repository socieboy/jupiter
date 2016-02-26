Vue.directive('ajax', {

    params:['data'],

    bind: function () {
        this.el.addEventListener('submit', this.onSubmit.bind(this));
    },

    update: function (value) {

    },

    onSubmit: function (e) {
        e.preventDefault();
        this.el.querySelector('button[type="submit"]').disabled = true;
        this.vm.$http[this.getRequestType()](this.el.action, this.params.data)
            .then(this.onComplete.bind(this))
            .catch(this.hasErrors.bind(this))
    },

    getRequestType: function(){
        var method = this.el.querySelector('input[name="_method"]');
        return (method ? method.value : this.el.method).toLowerCase();
    },

    onComplete: function(response){
    },

    hasErrors: function(response){
    }

});