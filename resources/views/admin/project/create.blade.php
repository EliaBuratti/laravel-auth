@extends('layouts.app')
@section('content')
    <main>
        <div class="container mt-4">

            @if ($errors->any())
                {{--                 @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Warning!</strong> {{ $error }}
                    </div>
                @endforeach --}}
            @endif

            <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data"
                class="needs-validation">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Comic Title:</label>
                    <input type="text" class="form-control @error('title') is-invalid  @enderror" name="title"
                        id="title" placeholder="Write project title" value="{{ old('title') }}">
                    @error('title')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control @error('description') is-invalid  @enderror"
                        name="description" id="description" placeholder="Description of your project"
                        value="{{ old('description') }}">
                    @error('description')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cover_image" class="form-label">Cover image:</label>
                    <input type="file" class="form-control @error('cover_image') is-invalid  @enderror"
                        name="cover_image" id="cover_image" placeholder="cover image">
                    @error('cover_image')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="skills" class="form-label">Skills:</label>
                    <input type="text" class="form-control @error('skills') is-invalid  @enderror" name="skills"
                        id="skills" placeholder="Your skills" value="{{ old('skills') }}">
                    @error('skills')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="project_link" class="form-label">Project link:</label>
                    <input type="text" class="form-control @error('project_link') is-invalid  @enderror"
                        name="project_link" id="project_link" placeholder="Link of your project page"
                        value="{{ old('project_link') }}">
                    @error('project_link')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="github_link" class="form-label">Github link:</label>
                    <input type="text" class="form-control @error('github_link') is-invalid  @enderror"
                        name="github_link" id="github_link" placeholder="Link of your GitHub project page"
                        value="{{ old('github_link') }}">
                    @error('github_link')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="action mt-4 w-100 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-success" href="{{ route('admin.project.index') }}">Go back</a>
                </div>
            </form>
        </div>
    </main>
@endsection
