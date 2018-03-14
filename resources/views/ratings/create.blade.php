@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body calcpanel">
                        <form action="/ratings" method="post">
                            {{ csrf_field() }}

                            <!--	<textarea name="content" class="form-control"></textarea>
                                <textarea name="content" class="form-control"></textarea>-->

                            <h2>Subject:</h2><input type="text" name="subject" class="form-control"/>

                            <hr />


                            <div class="col-sm-4" class="calcform">
                            <h3>Quiz Percentage:</h3><input type="text" name="quizPercent" class="form-control"/>

                            <h3>Assignment Percentage:</h3><input type="text" name="assignmentPercent" class="form-control"/>

                            <h3>Attendance Percentage:</h3><input type="text" name="attendancePercent" class="form-control"/>

                            <h3>Long Exams Percentage:</h3><input type="text" name="longExamsPercent" class="form-control"/>

                            <h3>Final Exam Percentage:</h3><input type="text" name="finalExamPercent" class="form-control"/>


                            </div>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />

                                {{--<input type="hidden" name="total" value="0"/>--}}
                            {{--<input type="hidden" name="status" value=" "/>--}}

                            <input type="submit" id="submit" class="btn pull-right" value="Submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection