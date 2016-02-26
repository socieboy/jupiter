@extends('jupiter::template.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-cloud"></i> File Browser</h1>
        </div>
    </div>

    <jupiter-file-browser inline-template>
        {{--Panel--}}
        <div class="panel panel-default file-browser">
            {{--Panel Heading--}}
            <div class="panel-heading">
                <h3 class="panel-title">
                    @can('upload_files')
                        @include('jupiter::file-browser.upload')
                    @endcan
                    <input type="text" v-model="sortKey" placeholder="Search" class="form-control form-control-search">
                </h3>
            </div>
            <div class="panel-body no-padding">
                @include('jupiter::file-browser.directories')
                @include('jupiter::file-browser.files')
            </div>
        </div>
    </jupiter-file-browser>


@stop
