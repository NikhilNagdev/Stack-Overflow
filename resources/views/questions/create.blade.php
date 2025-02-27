@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <dov class="card">
                    <div class="card-header">
                        <h3>Asa a Question</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('questions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" placeholder="Enter Title" value="{{ old('title') }}" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                @error('title')
                                    <div class="text-danger">{{ $messgae }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="body" name="body" value="{{ old('body') }}">
                                <trix-editor input="body"></trix-editor>
                                @error('body')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-success"> Post a Question</button>
                            </div>
                        </form>
                    </div>
                </dov>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
