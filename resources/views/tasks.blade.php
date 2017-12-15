<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>
        {{ Html::style('/css/app.css') }}
    </head>
    <body>
        @extends('layouts.app')
        @section('content')
            <div id="body-page">
                <div class="container">
                    <!-- start row -->
                    <div class="row">
                        <!-- col-md-8 -->
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @lang('navbar.new_task')
                                </div>
                                <div class="panel-body">
                                    <!-- Display Validation Errors -->
                                    @include('common.errors')
                                    <!-- form -->
                                    {{ Form::open(['url' => '/task', 'method' => 'POST']) }}
                                        <div class="row">
                                            <div class="col-md-10">
                                                {{ Form::label('task', trans('navbar.task')) }}
                                                {{ Form::text('name', null, ['class' => 'form-control', 'value' => old('name'), 'autofocus']) }}
                                            </div>
                                            <div class="col-md-2">
                                                {{ Form::button('<i class="glyphicon glyphicon-plus"></i> '.trans('navbar.new_task'), ['type' => 'submit', 'class' => 'btn btn-default', 'id' => 'btn_add_task']) }}
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                    <!-- end form -->
                                </div>
                                <div class="panel-footer"></div>
                            </div>
                        </div>
                        <!-- end col-md-8 -->
                        <div class="col-md-4">
                            @if (count($tasks))
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        @lang('navbar.current_task')
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped task-table">
                                            <thead>
                                                <th>@lang('navbar.task')</th>
                                                <th>&nbsp;</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($tasks as $task)
                                                    <tr>
                                                        <td class="table-text">
                                                            <div>{{ $task->name }}</div>
                                                        </td>
                                                        <td>
                                                            {{ Form::open(['url' => '/task/'.$task->id, 'method' => 'DELETE']) }}
                                                                {{ Form::button('<i class="glyphicon glyphicon-trash"></i>'.' Delete', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                                                            {{ Form::close() }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        @endsection
        <!-- Jquery -->
        {{ Html::script('/js/app.js') }}
    </body>
</html>
