@extends('layouts.main')
@section('container')
    <div class="bg-white p-4 rounded border shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3>Project</h3>
            </div>
            <div>
                <a href="{{ route('project.create') }}" class="btn btn-primary">Create Project</a>
            </div>
        </div>

        <form action="{{ route('project.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="search" class="form-control" placeholder="Search Project Name"
                    value="{{ request('search') }}">
                <div class="input-group-append">
                    <input type="date" name="start_date" class="form-control" placeholder="Filter by Start Date"
                        value="{{ request('start_date') }}">
                </div>
                <div class="input-group-append">
                    <input type="date" name="end_date" class="form-control" placeholder="Filter by End Date"
                        value="{{ request('end_date') }}">
                </div>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($projects as $project)
                <div class="col">
                    <a href="{{ route('project.show', $project) }}" class="card-link text-decoration-none">
                        <div class="card h-100 border-1 shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->name }}</h5>
                                <p class="card-text">{{ Str::limit($project->description, 100, '...') }}</p>
                                <p class="card-text"><strong>Created At:</strong>
                                    {{ $project->created_at->diffForHumans() }}</p>
                                <p class="card-text"><strong>Deadline:</strong>
                                    {{ date('F j, Y H:i', strtotime($project->deadline)) }}</p>
                                <div class="d-flex align-items-center">
                                    @if ($project->deadline < strtotime('now'))
                                        <x-status-badge status="overdue" />
                                    @else
                                        <x-status-badge :status="$project->status ?? '-'" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
