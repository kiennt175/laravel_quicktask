@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ trans('home.new_task') }}</div>
                <div class="card-body">
                    <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">
                                {{ trans('home.task') }}
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ trans('home.add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">{{ trans('home.current_tasks') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ trans('home.task') }}</th>
                                <th scope="col">{{ trans('home.option') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success">
                                            <a href="{{ route('tasks.edit', $task->id) }}">
                                                {{ trans('home.edit') }}
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" 
                                        data-toggle="modal" data-target="#exampleModalCenter">
                                            {{ trans('home.delete') }}
                                        </button>
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                            {{ trans('home.confirm') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ trans('home.confirm_deleting') }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('home.close') }}</button>
                                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ trans('home.yes') }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
