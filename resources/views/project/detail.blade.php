@extends('layouts.main')
@section('container')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $project->name }}</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h3 class="card-title mb-0">{{ $project->name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-4">
                        <h4 class="mb-3">Detail Information</h4>
                        <div class="card mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Description</h5>
                                <p class="card-text">{{ $project->description }}</p>
                            </div>
                        </div>
                        <div class="card mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Deadline</h5>
                                <p class="card-text">{{ date('F j, Y H:i', strtotime($project->deadline)) }}</p>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Status</h5>
                                <x-status-badge :status="$project->status ?? '-'" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Task List</h4>
                            </div>
                            <div>
                                <a href="{{ route('task.create', $project) }}" class="btn btn-primary">Add Task</a>
                            </div>
                        </div>
                        <div class="row row-cols-1 g-4">
                            @foreach ($project->tasks as $task)
                                <div class="col">
                                    <div class="card h-100 shadow">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $task->name }}</h5>
                                            <x-status-badge :status="$task->status ?? '-'" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
