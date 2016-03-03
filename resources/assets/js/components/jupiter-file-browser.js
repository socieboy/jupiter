Vue.component('jupiter-file-browser', {

    data: function(){
        return {
            submitted: false,
        }
    },
    ready: function () {
        document.getElementById("file-browser-input").onchange = function(event) {
            this.submitted = true;
            this.submitForm(event);
        }.bind(this);
    },

    methods: {
        submitForm: function(event){
            var files = event.target.files;
            this.$http.post('/api/file-browser', this.formData(files)).then(function(response){
                console.log(response.data)
                this.submitted = false;
            })
        },
        formData: function(files) {
            var data = new FormData();
            $.each(files, function(key, value){
                data.append('files[' + key + ']', value);
            });
            return data;
        },
    }

})