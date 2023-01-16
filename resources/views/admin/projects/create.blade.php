@extends('layouts.app')

@section('content')

<div class="d-flex">
    @include('admin.partials.navbar')

    <div class="col">
        <h1 class="ms-5">Create new projects</h1>

        <form action="{{route('admin.projects.store')}}" method="POST" class="mb-3 p-5" enctype="multipart/form-data">
            @csrf
            @include('admin.partials.error')

            <label for="title" class="form-label">Title</label>
            <small class="form-text text-muted ms-2">Required - Max 255 characters</small>
            <input value="{{old('title')}}" type="text" name="title" id="title" class="form-control mb-3 @error('title') is-invalid @enderror" aria-describedby="helpId">
            @error('title')<div class="alert alert-danger">{{ $message }}</div>@enderror


            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select class="form-select form-select-lg @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                    <option value="" selected>Select one</option>

                    @foreach ($types as $type)
                    <option value="{{$type->id}}" {{ old('type_id') ? 'selected' : '' }}>{{$type->name}}</option>
                    @endforeach

                </select>
            </div>
            @error('type_id')<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror

            <label for="cover_image" class="form-label">Image</label>
            <small class="form-text text-muted ms-2">Upload cover image - max 512 Kb</small>
            <input type="file" name="cover_image" id="cover_image" class="form-control mb-3 @error('cover_image') is-invalid @enderror" aria-describedby="helpId">
            @error('cover_image')<div class="alert alert-danger">{{ $message }}</div>@enderror


            <label for="team" class="form-label">Team</label>
            <small class="form-text text-muted ms-2">Max 255 characters</small>
            <input value="{{old('team')}}" type="text" name="team" id="team" class="form-control mb-3 @error('team') is-invalid @enderror" aria-describedby="helpId">
            @error('team')<div class="alert alert-danger">{{ $message }}</div>@enderror


            <label for="duration" class="form-label">Duration</label>
            <small class="form-text text-muted ms-2">Max 255 characters</small>
            <input value="{{old('duration')}}" type="text" name="duration" id="duration" class="form-control mb-3 @error('duration') is-invalid @enderror" aria-describedby="helpId">
            @error('duration')<div class="alert alert-danger">{{ $message }}</div>@enderror


            <label for="description" class="form-label">Description</label>
            <input value="{{old('description')}}" type="text" name="description" id="description" class="form-control mb-3" aria-describedby="helpId">

            <input class="btn btn-primary mt-2" type="submit">

        </form>
    </div>
</div>
@endsection