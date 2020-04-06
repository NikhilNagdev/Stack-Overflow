@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Qyestions</div>
                    @foreach($questions as $question)
                        <div class="card-body">
                            <div class="media">
                                <div class="d-flex flex-column mr-4">
                                    <div class="text-center mb-3">
                                        <strong class="d-block">{{ $question->votes_count }}</strong>
                                        Votes
                                    </div>
                                    <div class="text-center mb-3 answers {{ $question->answerStyles }}">
                                        <strong class="d-block">{{ $question->answers_count }}</strong>
                                        Answers
                                    </div>
                                </div>
                                <div class="text-center">
                                    <strong class="d-block">{{ $question->views_count }}</strong>
                                    Views
                                </div>

                                <div class="media-body">
                                        <h4><a href="{{ $question->url }}"></a>{{ $question->title }}</h4>
                                        <p>
                                            Asked By: <a href="{{ $question->owner->name }}"></a>
                                            <span class="text-muted">{{ $question->created_date }}</span>
                                            {{ Str::Limit($question->body, 250) }}
                                        </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                    <div class="card-footer">
                        {{ $questions->links() }}
                    </div>
            </div>
        </div>
    </div>

@endsection
