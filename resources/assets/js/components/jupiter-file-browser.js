Vue.component('jupiter-file-browser', {

    data: function(){
        return {
            submitted: false,
        }
    },
    ready: function () {
        document.getElementById("file-browser-input").onchange = function() {
            this.submitted = true;
            this.submitForm();
        }.bind(this);
    },

    methods: {
        submitForm: function(){
            this.$http.post('/api/file-browser', this.formData()).then(function(response){
                console.log(response.data)
            })
        },
        formData: function() {
            var serializedData = $(this.$els.uploadFileForm).serializeArray();
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

})