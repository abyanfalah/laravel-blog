@extends('layouts.dashboard')

@section('content')
    welcome to dashboard {{ auth()->user()->name }}
@endsection
