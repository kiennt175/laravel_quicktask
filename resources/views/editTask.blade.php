@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('home.edit_task') }}</div>
                    <div class="card-body">
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">
                                    {{ trans('home.task') }}
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="task_name" id="task-name" class="form-control" value="{{ $task->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ trans('home.update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
