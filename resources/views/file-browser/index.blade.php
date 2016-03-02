<jupiter-file-browser inline-template>
    <div class="modal fade jupiter-file-browser-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createUserLabelModal">
                        <i class="fa fa-cloud"></i> File Browser
                    </h4>
                </div>
                <div class="modal-body">
                    @include('jupiter::file-browser.upload')
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</jupiter-file-browser>