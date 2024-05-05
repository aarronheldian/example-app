@extends('layouts.main')
@section('container')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white py-3">
            <h3 class="card-title mb-0">Create New Project</h3>
        </div>
        <div class="card-body d-flex justify-content-center">
            <form action="{{ route('project.store') }}" method="POST" class="w-75">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Project Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="desc" name="description"
                        rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline:</label>
                    <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline"
                        name="deadline" value="{{ old('deadline') }}" required>
                    @error('deadline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create Project</button>
            </form>
        </div>
    </div>
@endsection
