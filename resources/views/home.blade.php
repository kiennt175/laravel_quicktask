@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('tasks.index') }}">
                            <h6>{{ trans('home.to_task_list') }}</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
