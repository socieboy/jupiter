Vue.component('jupiter-errors', {

    props: ['errors'],

    template: '<div transition class="alert alert-danger alert-dismissible" v-if="errors">' +
                    '<button type="button" class="close" data-dismiss="alert" @click="closeErrors()" aria-hidden="true">×</button>' +
                    '<ul class="list-errors">' +
                        '<li v-for="error in errors">{{ error }}</li>' +
                    '</ul>' +
                '</div>',

    watch: {
        'errors': function() {
        }
    },

    methods: {
        closeErrors: function() {
            this.errors = null;
        }
    }
})