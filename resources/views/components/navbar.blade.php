<div>
    <nav id="sidebar" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="{{ route('home') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::is('/') ? 'active' : '' }}"
                    aria-current="true">
                    <i class="bi bi-speedometer2 me-3"></i><span>Home</span>
                </a>
                <a href="{{ route('project.index') }}"
                    class="list-group-item list-group-item-action py-2 ripple {{ Request::is('project*') ? 'active' : '' }}">
                    <i class="bi bi-card-checklist me-3"></i><span>Project</span>
                </a>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar"
                aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-trello me-2"></i>
                Project Dashboard
            </a>
        </div>
    </nav>
</div>
