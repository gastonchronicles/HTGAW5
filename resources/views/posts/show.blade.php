@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading namespan">
					<span>{{ $post->user->name }}'s <b>{{$post->subject}}</b> grade</span>
					<span class="pull-right">{{ $post->created_at->diffForHumans() }}</span>
				</div>
				<div class="panel panel-default temp">
					<div class="panel-body subjecttable">
	                    <h3>Subject: {{ $post->subject }}</h3>
	                    <hr id="hrmini" />
	                    <table>
	                    	<tr>
								<td><p>Quiz</p></td>
								<td><p>{{ ($post->quiz*100)/$post->quiztotal }}%</p></td>
							</tr>
							<tr>
	                    		<td><p>Assignment</p></td>
	                    		<td><p>{{ ($post->assignment*100)/$post->assignmenttotal }}%</p></td>
	                    	</tr>
	                    	<tr>
	                    		<td><p>Attendance</p></td>
	                    		<td><p>{{ ($post->attendance*100)/$post->attendancetotal }}%</p></td>
	                    	</tr>
	                    	<tr>
	                    		<td><p>Long Exams</p></td>
	                    		<td><p>{{ ($post->longexams*100)/$post->longexamstotal }}%</p></td>
	                    	</tr>
	                    	<tr>
	                    		<td><p>Final Exam</p></td>
	                    		<td><p>{{ ($post->finalexam*100)/$post->finalexamtotal }}%</p></td>
	                    	</tr>	                   
	                    </table>

	                    <h3>Total: {{$post->total}} %</h3>
	                    <hr id="hrmini" />
                        <h3>Status: {{$post->status}}</h3>
	                </div>
				</div>
				<div class="panel-footer" style="display: flex;">
					<form action="{{route('posts.edit', $post->id)}}" method="post">
						{{ method_field('edit')}}
						{{ csrf_field() }}
						<button class="btn showbtn"><a href="{{route('posts.edit', $post->id)}}">Edit</a></button>
					</form>
					</a>
					<form action="/posts/{{ $post->id }}" method="post">
						{{ method_field('delete')}}
						{{ csrf_field() }}
						<button class="btn showbtn">Delete</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection