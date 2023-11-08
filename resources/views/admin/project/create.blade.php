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

            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Comic Title:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Write project title"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control" name="description" id="description"
                        placeholder="Description of your project" value="{{ old('description') }}">
                    @error('description')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cover_image" class="form-label">Cover image:</label>
                    <input type="file" class="form-control" name="cover_image" id="cover_image"
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
                    <input type="text" class="form-control" name="skills" id="skills" placeholder="Your skills"
                        value="{{ old('skills') }}">
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
                        placeholder="Link of your project page" value="{{ old('project_link') }}">
                    @error('project_link')
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Attenzione!</strong> {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>
@endsection