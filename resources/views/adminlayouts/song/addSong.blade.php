@extends('adminLayouts.main')

@section('title')
    Admin
@stop


@section('content')
    <h1 class="content-heading bg-white border-bottom center">Şarkı Yükle</h1>

    <div class="innerAll spacing-x2">

        <!-- Widget -->
        <div class="widget widget-inverse">

            <!-- Widget heading -->
            <div class="widget-head">
                <h4 class="heading glyphicons file_import"><i></i>Şarkıyı sürükleyiniz.Format(Şarkıcı adı - Şarkı adı).mp3</h4>
            </div>
            <!-- // Widget heading END -->

            <div class="widget-body">
                <!-- Dropzone -->
                <div id="dropzone">
                    <form action="{{ Route('add-song-post') }}" enctype="multipart/form-data"  accept-charset="UTF-8" class="dropzone" id="myDropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple/>
                        </div>
                        {!! csrf_field() !!}
                    </form>
                </div>

            </div>
        </div>
        <!-- // Widget END -->

    </div>

@stop