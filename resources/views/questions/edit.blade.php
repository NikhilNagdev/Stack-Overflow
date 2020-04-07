@extends('layouts.app')

@section('content')

    <div class="container">
        <dov class="row">
            <div class="col-md-12">
                <dov class="card">
                    <div class="card-header">
                        <h3>Edit a Question</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('questions.update', $question->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" placeholder="Enter Title" value="{{ old('title', $question->title) }}" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                @error('title')
                                <div class="text-danger">{{ $messgae }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="hidden" id="body" value="{{ old('body', $question->body) }}">
                                <trix-editor input="body"></trix-editor>
                                @error('body')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-success"> Update a Question</button>
                            </div>
                        </form>
                    </div>
                </dov>
            </div>
        </dov>
    </div>
@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
