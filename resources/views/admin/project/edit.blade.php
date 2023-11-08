@extends('layouts.app')

@section('content')
    <main>
        <div class="container mt-4">

            <form action="{{ route('project.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Project Title:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Write project title"
                        value="{{ $project->title }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control" name="description" id="description"
                        placeholder="Description of comic" value="{{ $project->description }}">
                </div>

                <div class="mb-3">
                    <label for="cover_image" class="form-label d-block">Cover image:</label>
                    {{-- per link --}}
                    <img width="150" src="{{ $project->cover_image }}" alt="{{ $project->title }}">


                    {{-- <img width="150" src="{{ asset('storage/' . $comic->cover_image) }}"
                        alt="{{ $comic->title }}"> per immagini caricate da locale --}}

                    {{-- le lascio entrambe per vederle --}}
                    <input type="file" class="form-control mt-2" name="cover_image" id="cover_image"
                        placeholder="cover image">
                </div>

                <div class="mb-3">
                    <label for="skills" class="form-label">Skills:</label>
                    <input type="text" class="form-control" name="skills" id="skills" placeholder="Your skills "
                        value="{{ $project->skills }}">
                </div>

                <div class="mb-3">
                    <label for="project_link" class="form-label">Project link:</label>
                    <input type="text" class="form-control" name="project_link" id="project_link"
                        placeholder="project_link of comic book" value="{{ $project->project_link }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </main>
@endsection
