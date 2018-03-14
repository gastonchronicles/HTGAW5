@extends('layouts.app')


@section('content')
	<div class="row">

		@forelse($posts as $post)
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading namespan">
						<span>{{ $post->user->name }}</span>
						<span class="pull-right">{{ $post->created_at->diffForHumans() }}</span>
					</div>
					<div class="panel-body panel-default postpanel">
                        <!--{{ substr($post->quiz, 0 , 100) }}
						{{ substr($post->assignment, 0 , 100) }}
                        {{ substr($post->attendance, 0 , 100) }}                        
                        {{ substr($post->longexams, 0 , 100) }}
                        {{ substr($post->finalexam, 0 , 100) }}...-->
                        <span>{{ substr($post->subject, 0 , 100) }}&emsp;&emsp;<a href="/posts/{{ $post->id }}">View Subject Grades</a>
						</span>
					</div>
				</div>
			      
			</div>
		</div>
			
		@empty
			No results found
		@endforelse
		<div class="col-md-6 col-md-offset-3">
			{{ $posts->links() }}
		</div>
	</div>
@endsection