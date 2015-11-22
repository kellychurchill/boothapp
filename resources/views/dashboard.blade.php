@extends('layouts.master')

@section('content')
<h1>Hello, Troop {{ Auth::user()->id }} </h1>

@endsection