<a class="btn btn-default pull-right margin-r-5"
   data-toggle="modal"
   data-backdrop="static"
   data-keyboard="false"
   data-target=".jupiter-upload-file-modal">
    <i class="fa fa-upload"></i>
    Upload File
</a>

<jupiter-create-user inline-template>
    <form action="{{ url('/api/file-manager') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal fade jupiter-upload-file-modal" tabindex="-1" role="dialog" aria-labelledby="uploadFileModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="uploadFileModalLabel">
                            <i class="fa fa-upload"></i> Upload File
                        </h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-default btn-hover-success pull-right">
                            Upload
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</jupiter-create-user>