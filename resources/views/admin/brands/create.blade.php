@extends('layouts.admin.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
@endsection
@section('content')
    <brand></brand>
@endsection
@section('scripts')
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script src="{{ asset('js/dropify_use.js') }}"></script>
@endsection
