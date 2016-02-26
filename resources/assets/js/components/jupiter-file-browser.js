Vue.component('jupiter-file-browser', {

    ready: function () {
        var panelBody = $('.file-browser .panel-body');
        panelBody.height($(document).height() - 190)
        $('.file-browser .directories').height(panelBody.height())
    },

})