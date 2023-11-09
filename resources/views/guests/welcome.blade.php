@extends('layouts.app')
@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-5 fw-bold">Hi!
                @if (Auth::user())
                    {{ Auth::user()->name }}
                @endif
                this is my portfolio
            </h1>
            <p class="fs-4">
                You can see below all my projects. Enjoy to see it!
            </p>
            {{--             <button class="btn btn-primary btn-lg" type="button">Example button</button> --}}
        </div>
    </div>

    <div class="container mt-4">
        <div class="row g-4">
            @forelse ($projects as $project)
                <div class="col-4">
                    <div class="card p-3 h-100">
                        <img class=" rounded-2" src="{{ asset('storage/' . $project->cover_image) }}"
                            alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Skills: {{ $project->skills }}</li>
                            <li class="list-group-item">
                                <a href="{{ $project->project_link }}" target="_blank">View Project</a>
                            </li>
                        </ul>
                    </div>
                </div>

            @empty
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nothingh to see</li>
                    </ul>
                </div>
            @endforelse
        </div>
    </div>
@endsection
