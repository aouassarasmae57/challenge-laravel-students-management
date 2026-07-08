@extends('layout')

@section('content')
welcome page
<a href={{ route('students.create') }}>Add student</a>
<a href="{{ route('students.index') }}" >All students</a>
@endsection