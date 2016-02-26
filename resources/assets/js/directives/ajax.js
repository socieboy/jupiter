Vue.directive('ajax', {

    params: ['onSuccess', 'onError'],

    /**
     * Bind Event listener.
     */
    bind: function () {
        this.el.addEventListener('submit', this.onSubmit.bind(this));
    },

    /**
     * Submit the form
     * @param Event e
     */
    onSubmit: function (e) {
        e.preventDefault();
        if(this.hasToBeConfirmed()) {
            this.el.querySelector('button[type="submit"]').disabled = true;
            this.vm.$http[this.getRequestType()](this.el.action, this.getFormData())
                .then(this.onComplete.bind(this))
                .catch(this.hasErrors.bind(this))
        }
    },

    /**
     * Get the request type of the form.
     * @returns {string}
     */
    getRequestType: function(){
        var method = this.el.querySelector('input[name="_method"]');
        return (method ? method.value : this.el.method).toLowerCase();
    },

    /**
     * Get all data inputs..
     * @returns {{}}
     */
    getFormData: function() {
        var serializedData = $(this.el).serializeArray();
        var objectData = {};
        $.each(serializedData, function() {
            if (objectData[this.name] !== undefined) {
                if (!objectData[this.name].push) {
                    objectData[this.name] = [objectData[this.name]];
                }
                objectData[this.name].push(this.value || '');
            } else {
                objectData[this.name] = this.value || '';
            }
        });
        return objectData;
    },

    /**
     * The request has been completed.
     * @param response
     */
    onComplete: function(response){
        this.el.querySelector('button[type="submit"]').disabled = false;
        if(! this.params.onSuccess) return;
        this.vm[this.params.onSuccess](response);
    },

    /**
     * The request has errors.
     * @param response
     */
    hasErrors: function(response){
        this.el.querySelector('button[type="submit"]').disabled = false;
        if(! this.params.onError) return;
        this.vm[this.params.onError](response);
    },

    /**
     * The process require a confirmation.
     */
    hasToBeConfirmed: function() {
        if (this.arg == 'confirm') {
            var response = confirm("Confirm this action.")
            if (!response) {
                return false
            }
        }
        return true
    }
});