@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $question->title }}
                    </div>


                    <div class="card-body">
                        {!! $question->body  !!}
                    </div>


                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                {{--<--Votes-->--}}
                                <div>

                                    @auth
                                        <form action="{{route('questions.vote',[$question->id, 1]) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="btn {{auth()->user()->hasQuestionUpVote($question) ? 'text-dark' : 'text-black-50'}}">
                                                <i class="fa fa-caret-up fa-3x"></i>
                                            </button>
                                        </form>

                                    @else
                                        <a href="{{route('login')}}" class="d-block text-black-50 text-center">
                                            <i class="fa fa-caret-up fa-3x"></i>
                                        </a>
                                    @endauth

                                    <h4 class="text-dark m-0 text-center"> {{ $question->votes_count }}</h4>
                                    @auth
                                        <form action="{{route('questions.vote',[$question->id, -1]) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="btn {{auth()->user()->hasQuestionDownVote($question) ? 'text-dark' : 'text-black-50'}}">
                                                <i class="fa fa-caret-down fa-3x"></i>
                                            </button>
                                        </form>

                                    @else
                                        <a href="{{route('login')}}" class="d-block text-black-50 text-center">
                                            <i class="fa fa-caret-down fa-3x"></i>
                                        </a>
                                    @endauth
                                </div>
                                {{--Mark as Fav--}}
                                <div class="ml-5 mt-2 {{ $question->is_favourite ? 'text-warning' : 'text-dark' }}">

                                    <div class="ml-5 mt-2 {{$question->is_favourite ? 'text-warning' : 'text-dark'}}">
                                        @can( 'markAsFavourite' ,$question)
                                            <form
                                                action="{{route($question->is_favourite ? 'questions.unfavourite': 'questions.favourite',$question->id) }}"
                                                method="POST">
                                                @if($question->is_favourite)
                                                    @method('DELETE')
                                                @endif
                                                @csrf
                                                <button type="submit"
                                                        class="btn {{$question->is_favourite ? 'text-warning' : 'text-dark'}}">
                                                    <i class="fa {{$question->is_favourite ? 'fa-star ' : 'fa-star-o'}} fa-2x "></i>
                                                </button>
                                                <h4 class="text-center m-0">{{$question->favourites_count}}</h4>
                                            </form>
                                        @else
                                            <i class="fa fa-star-o fa-2x text-warning d-block"></i>
                                            <h4 class="text-center text-warning m-0">{{$question->favourites_count}}</h4>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="text-muted flex-column">
                                    Asked : {{ $question->created_date }}
                                </div>
                                <div class="d-flex mb-2">
                                    <div>
                                        <img src="{{ $question->owner->avatar }}"
                                             alt="{{ $question->owner->name }}">
                                    </div>
                                    <div class="mt-2 ml-2">
                                        {{ $question->owner->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @include('answers._index')
    @include('answers._create')

    </div>
@endsection
@section('styles')
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
