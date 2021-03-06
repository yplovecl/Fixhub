@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-body table-responsive" id="user_list">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ trans('users.name') }}</th>
                        <th>{{ trans('users.nickname') }}</th>
                        <th>{{ trans('users.role') }}</th>
                        <th>{{ trans('users.email') }}</th>
                        <th>{{ trans('app.created') }}</th>
                        <th>{{ trans('users.has_2fa') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    @include('admin.users.dialog')
@stop

@section('right-buttons')
    <div class="pull-right">
        <button type="button" class="btn btn-success" title="{{ trans('users.create') }}" data-toggle="modal" data-target="#user"><span class="ion ion-plus"></span> {{ trans('users.create') }}</button>
    </div>
@stop

@push('javascript')
    <script type="text/javascript">
        var users = {!! $users !!};

        new app.UsersTab();
        app.Users.add(users);
    </script>
@endpush

@push('templates')
    <script type="text/template" id="user-template">
        <td><%- id %></td>
        <td><%- name %></td>
        <td><%- nickname %></td>
        <td><%- role_name %></td>
        <td><%- email %></td>
        <td><%- created %></td>
        <td>
            <% if (has_two_factor_authentication) { %>
                {{ trans('app.yes') }}
            <% } else { %>
                {{ trans('app.no') }}
            <% } %>
        </td>
        <td>
            <div class="btn-group pull-right">
                <button class="btn btn-default btn-edit" title="{{ trans('app.edit') }}" data-toggle="modal" data-target="#user" data-user-id="<%- id %>"><i class="ion ion-compose"></i></button>
                <button class="btn btn-danger btn-delete" title="{{ trans('app.delete') }}" data-toggle="modal" data-target="#model-trash" data-user-id="<%- id %>"><i class="ion ion-trash-a"></i></button>
            </div>
        </td>
    </script>
@endpush
