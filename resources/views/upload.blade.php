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

        .dropform {
            min-height: 100px;
            border: 2px solid rgba(0, 0, 0, 0.3);
            background: white;
            padding: 0;
        }
        .dropzone-previews, .droppreview{
            display: none;
        }
    </style>
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="droppreview">
    </div>
    <form action="{{ url('file/save')}}" method="post">
        {{ csrf_field() }}
        <ul id="sortable">
            <li class="upload-box">
                <div class="dropform" id="dropbox">Arraste itens aqui ou clique para fazer o upload</div>
            </li>
        </ul>
        <button>Enviar</button>
    </form>
@endsection

@section('script')
    <script>
        var url = '{{ url('file/upload') }}'
        $(function () {
            $("#sortable").sortable();
            $("#sortable").disableSelection();

            // jQuery
            $("#dropbox").dropzone(
                { 
                    url: url,
                    complete: function(file){
                        addNewDropzone(file);
                        this.removeFile(file);
                    }
                , createImageThumbnails: false
                , previewsContainer: false
            });
        });
    </script>
    <script src="{{ asset('/js/zone.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/upload.js') }}"></script>
@endsection