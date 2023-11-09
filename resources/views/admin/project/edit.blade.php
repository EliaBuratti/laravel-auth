@extends('layouts.app')

@section('content')
    <main>
        <div class="container mt-4">

            <form action="{{ route('admin.project.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Project Title:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Write project title"
                        value="{{ $project->title }}">
                    @error('title')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" id="description">{{ $project->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cover_image" class="form-label d-block">Cover image:</label>

                    <img width="150" src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}">

                    <input type="file" class="form-control mt-2" name="cover_image" id="cover_image"
                        placeholder="cover image">
                    @error('cover_image')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="skills" class="form-label">Skills:</label>
                    <input type="text" class="form-control" name="skills" id="skills" placeholder="Your skills "
                        value="{{ $project->skills }}">
                    @error('skills')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="project_link" class="form-label">Project link:</label>
                    <input type="text" class="form-control" name="project_link" id="project_link"
                        placeholder="project_link of comic book" value="{{ $project->project_link }}">
                    @error('project_link')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </main>
@endsection
