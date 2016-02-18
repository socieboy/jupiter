@extends('jupiter::template.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-cubes"></i> Role Management</h1>
        </div>
    </div>

    <jupiter-table-roles inline-template>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    @can('create_roles')
                        @include('jupiter::roles.create')
                    @endcan
                    <input type="text" v-model="sortKey" placeholder="Search" class="form-control form-control-search">
                </h3>
            </div>
            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <th class="col-md-1 text-center hidden-xs">ID</th>
                    <th class="col-md-2 hidden-xs">Name</th>
                    <th>Label</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr v-if="! loading" v-for="role in roles | filterBy sortKey">
                        <td class="text-center hidden-xs">@{{ role.id }}</td>
                        <td class="hidden-xs">@{{ role.name }}</td>
                        <td>@{{ role.label }}</td>
                        <td>
                            @can('update_roles')
                                @include('jupiter::roles.edit')
                            @endcan
                            @can('delete_roles')
                                @include('jupiter::roles.destroy')
                            @endcan
                            @can('update_roles')
                                @include('jupiter::permission.index')
                            @endcan
                        </td>
                    </tr>
                    <tr v-if="loading">
                        <td colspan="6" class="text-center">
                            <i class="fa fa-cog fa-spin"></i> <br> <small>LOADING</small>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </jupiter-table-roles>

@stop
