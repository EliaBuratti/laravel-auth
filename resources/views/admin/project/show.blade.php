@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="action mt-4">
            <a class="btn btn-success" href="{{ route('project.index') }}">Go back</a>
        </div>
        <div class="my-4">
            <div class="card col-6 p-4 mx-auto">
                <img width="250" src="{{ asset($project->cover_image) }}" class="card-img-top" alt="...">
                {{-- <img style="aspect-ratio: 1 / 1.5" src="{{  }}" alt="{{ $project->title }}"> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">
                        <strong>Descrizione:</strong>
                        {{ $project->description }}
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Skills: </strong> {{ $project->skills }}</li>
                    <li class="list-group-item"><strong>Project link</strong> {{ $project->project_link }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
