<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('css')
    <link rel="stylesheet" href="{{ url('css/zone.css') }}"/>
    <style>
        li {
            float: left;
            width: 100px;
            height: 100px;
            border: 1px solid black;
            margin: 10px;
        }

        ul {
            list-style-type: none;
        }

        form.dropzone {
            min-height: 100px;
            border: 2px solid rgba(0, 0, 0, 0.3);
            background: white;
            padding: 0;
        }
    </style>
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

    {{-- <form action="{{ url('file/upload') }}" method="post" class="dropzone" enctype="multipart/form-data">
        {{ csrf_field() }}
    </form> --}}

    <ul id="sortable">
        <li class="upload-box">
            <form action="{{ url('file/upload') }}" class="dropzone" id="my-awesome-dropzone">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>

@endsection

@section('script')
    <script>
        var url = '{{ url('file/upload') }}'
    </script>
    <script src="{{ asset('/js/zone.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/upload.js') }}"></script>
@endsection