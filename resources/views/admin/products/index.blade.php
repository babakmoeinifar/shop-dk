@extends('layouts.admin.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@endsection

@section('content')
    <product csrf_token="{{ csrf_token() }}"></product>
@endsection

@section('scripts')
    <script src="{{ asset('js/dropify.min.js') }}"></script>
{{--    <script src="{{ asset('js/dropify_use.js') }}"></script>--}}
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        DecoupledEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                const toolbarContainer = document.querySelector('#toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });
        Dropzone.options.oneupload= {
            paramName: 'image',
            maxFileSize: 1,
            success(image, response) {
                $('#image').val(response);
            }
        }
    </script>
@endsection
