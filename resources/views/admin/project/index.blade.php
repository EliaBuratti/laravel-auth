@extends('layouts.admin')

@section('content')
    <main>
        <div class="container mt-4">


            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Success!</strong> {{ session('message') }}
                </div>
            @endif

            <div class="comic-list mt-5">
                <h3>List projects</h3>
                <button class="btn btn-primary">
                    <a class="nav-link" href="{{ route('project.create') }}">Add project</a>
                </button>

                <button class="btn btn-warning">
                    <a class="nav-link" {{-- href="{{ route('trash.index') }}" --}}>Trash bin</a>
                </button>
                <table class="table my-4 border">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>
                                    {{-- per link --}}

                                    <img width="150" src="{{ asset('storage/' . $project->cover_image) }}"
                                        alt="{{ $project->title }}">


                                    {{-- <img width="150" src="{{ $project->thumb }}" alt="{{ $project->title }}"> --}}
                                    {{-- per immagini caricate da locale le lascio entrambe per vederle --}}
                                </td>
                                <td>{{ $project->title }}</td>
                                <td>
                                    <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('project.edit', $project->id) }}" class="btn btn-secondary">Edit</a>


                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $project->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">
                                                        {{ $project->id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Warning! Are you sure to move on trash bin this comic?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No!</button>
                                                    <form action="{{ route('project.destroy', $project->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning">Yes!</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Nothing to see.</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>


        </div>
    </main>
@endsection
