@extends('layouts.app')

@section('sidebar')
    @include('component.sidebar')
    
@endsection
    
@section('header')
    @include('component.header')
    
@endsection

@section('content')
    @include('component.' . $contentName)
@endsection


    













