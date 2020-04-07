@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $question->title }}
                    </div>
                </div>

                <div class="card-body">
                    {!! $question->body !!}
                </div>
            </div>
        </div>
    </div>
    @endsection
