module.exports = {

    bind: function () {
        this.el.addEventListener('submit', this.onSubmit.bind(this));
    },

    update: function (value) {
    },

    onSubmit: function (e) {
        e.preventDefault();
        this.el.querySelector('button[type="submit"]').disabled = true;
        this.vm.$http[this.getRequestType()](this.el.action, this.getFormData())
            .then(this.onComplete.bind(this))
            .catch(this.hasErrors.bind(this))
    },

    getRequestType: function(){
        var method = this.el.querySelector('input[name="_method"]');
        return (method ? method.value : this.el.method).toLowerCase();
    },

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

}