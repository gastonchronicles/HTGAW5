@extends('layouts.app')

@section('content')


    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading namespan">
                    <span><h2>Grading System:</h2></span>

                    {{--<span class="pull-right">{{ $post->created_at->diffForHumans() }}</span>--}}
                </div>
                <div class="panel panel-default temp">
                    <div class="panel-body subjecttable">

                        <h3>Subject: {{ $post->subject }}</h3>



                        <hr id="hrmini" />
                        <table>
                            <tr>
                                <td><p>Quiz</p></td>
                                <td><p>{{ ($post->quizPercent) }}%</p></td>
                            </tr>
                            <tr>
                                <td><p>Assignment</p></td>
                                <td><p>{{ ($post->assignmentPercent) }}%</p></td>
                            </tr>
                            <tr>
                                <td><p>Attendance</p></td>
                                <td><p>{{ ($post->attendancePercent) }}%</p></td>
                            </tr>
                            <tr>
                                <td><p>Long Exams</p></td>
                                <td><p>{{ ($post->longExamsPercent) }}%</p></td>
                            </tr>
                            <tr>
                                <td><p>Final Exam</p></td>
                                <td><p>{{ ($post->finalExamPercent) }}%</p></td>
                            </tr>
                        </table>

                        <h3>Total: {{(($post->quizPercent)+($post->assignmentPercent)+($post->attendancePercent)+($post->longExamsPercent)+($post->finalExamPercent))}} %</h3>
                        <hr id="hrmini" />
                        {{--<h3>Status: {{$post->status}}</h3>--}}
                    </div>
                </div>

                <div class="panel-footer" style="display: flex;">
                    <form action="{{route('ratings.edit', $post->id)}}" method="post">
                        {{ method_field('edit')}}
                        {{ csrf_field() }}
                        <button class="btn showbtn"><a href="{{route('ratings.edit', $post->id)}}">Edit</a></button>
                    </form>

                    </a>
                    <form action="/ratings/{{ $post->id }}" method="post">
                        {{ method_field('delete')}}
                        {{ csrf_field() }}
                        <button class="btn showbtn">Delete</button>
                    </form>

                </div>
                {{--@empty--}}
                    {{--No results found--}}
                {{--@endforelse--}}
                {{--<div class="col-md-6 col-md-offset-3">--}}
                    {{--{{ $ratings->links() }}--}}
                {{--</div>--}}
            </div>


@endsection