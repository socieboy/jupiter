<form action="" id="uploadFileForm">
    {!! csrf_field() !!}
    <input type="file"
           name="file"
           :disabled="submitted"
           class="file-input"
           :class="{'read-only':submitted}"
           id="file-browser-input"
           multiple>
</form>