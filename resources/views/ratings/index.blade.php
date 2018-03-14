@extends('layouts.app')


@section('content')
    <div class="row">

        @forelse($ratings as $post)
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading namespan">
                        <span><h3>By:</h3>{{$post->user->name}}</span>
                        <span><h2>Syllabus For:</h2></span>
                    </div>
                    <div class="panel-body panel-default postpanel">

                        <span>{{ substr($post->subject, 0 , 100) }}&emsp;&emsp;<a href="/ratings/{{ $post->id }}">View Syllabus Percentage</a>
						</span>
                    </div>
                </div>

            </div>
    </div>

    @empty
        No results found
    @endforelse
    <div class="col-md-6 col-md-offset-3">
        {{ $ratings->links() }}
    </div>
    </div>
@endsection