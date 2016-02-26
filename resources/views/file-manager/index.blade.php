@extends('jupiter::template.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-cloud"></i> File Manager</h1>
        </div>
    </div>

    <jupiter-file-manager inline-template>
        {{--Panel--}}
        <div class="panel panel-default">
            {{--Panel Heading--}}
            <div class="panel-heading">
                <h3 class="panel-title">
                    @can('upload_files')
                        @include('jupiter::file-manager.upload')
                    @endcan
                    <input type="text" v-model="sortKey" placeholder="Search" class="form-control form-control-search">
                </h3>
            </div>
            <div class="panel-body">
                Files
            </div>
        </div>
    </jupiter-file-manager>


@stop
