@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger text-center w-25 container">
            @foreach ($errors->all() as $error)
                <h3>{{ $error }}</h3>
            @endforeach
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger text-center w-25 container">

            <h3>{{ session('error') }}</h3>

        </div>
    @endif


    <form action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" method="POST" class="m-5 w-50 create">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                aria-describedby="emailHelp" value="{{ old('title') }}">
            {{-- con @error message funziona --}}
            @error('title')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    <h3>{{ $message }}</h3>
                </div>
            @enderror


        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Immagine</label>
            <input name="img" type="file" class="form-control" id="img" value="{{ old('img') }}" onchange="showImage(event)">
            @error('thumb')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    <h3>{{ $message }}</h3>
                </div>
            @enderror
            <img id="thumb" src="placeholder.jpg" alt="preview" style="max-width: 100%; height: 200px; margin-top: 10px;">
        </div>

        <div class="mb-3">
            <select name="type_id" class="form-select" aria-label="Default select example" name="type_id">
                <option value="">Scegli il Type</option>

                @foreach ($types as $type)
                    <option value="{{ $type->id }}">
                        {{ $type->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" type="text" class="form-control @error('description') is-invalid @enderror"
                id="description">{{ old('description') }}</textarea>
            @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    <h3>{{ $message }}</h3>
                </div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary p-4 ">Invia</button>
    </form>

    <script>
        function showImage(event) {
            const thumb = document.getElementById('thumb');
            console.log(thumb);
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
