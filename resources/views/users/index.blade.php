@extends('jupiter::template.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-users"></i> User Management</h1>
        </div>
    </div>

    <jupiter-table-users inline-template>
        {{--Panel--}}
        <div class="panel panel-default">
            {{--Panel Heading--}}
            <div class="panel-heading">
                <h3 class="panel-title">
                    @can('create_users')
                        @include('jupiter::users.create')
                    @endcan
                    <input type="text" v-model="sortKey" placeholder="Search" class="form-control form-control-search">
                </h3>
            </div>
            {{--Table Users--}}
            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <th class="col-md-1 text-center hidden-xs">ID</th>
                    <th class="col-md-1 text-center hidden-xs"></th>
                    <th class="col-md-3">Name</th>
                    <th class="col-md-4 hidden-xs">Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr v-if="!loading" v-for="user in users | filterBy sortKey">
                        <td class="text-center hidden-xs">@{{ user.id }}</td>
                        <td>
                            <img class="avatar avatar-on-table" :src="user.avatar" alt="@{{ user.name }}">
                        </td>
                        <td>@{{ user.name }}</td>
                        <td class="hidden-xs">@{{ user.email }}</td>
                        <td>
                            @can('update_users')
                                @include('jupiter::users.edit')
                            @endcan
                            @can('delete_users')
                                @include('jupiter::users.destroy')
                            @endcan
                            @can('update_roles')
                                @include('jupiter::users.roles')
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
    </jupiter-table-users>

@stop
