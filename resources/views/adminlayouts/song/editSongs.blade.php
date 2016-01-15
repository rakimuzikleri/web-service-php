@extends('adminLayouts.main')

@section('title')
    Admin
@stop


@section('content')
    <div class="widget widget-inverse">

        <!-- Widget heading -->
        <div class="widget-head">
            <h4 class="heading">Bütün Müzikler</h4>
        </div>
        <!-- // Widget heading END -->
        <!-- // Table heading END -->
        <div class="widget-body">
            <div class="input-group col-md-12 col-sm-12 col-xs-12">
                <form action="" method="get" id="searchform"
                      onsubmit="return false;">
                    <input style="float:left;width: 75%;" class="form-control" id="autocomplete" name="term" type="text"
                           placeholder="Şarkı ve Şarkıcı Ara"/>
                    <button style="float:left;" class="btn btn-default" type="button" onclick="Submit()"><i
                                class="fa fa-search"></i></button>
                </form>
                <a href="" class="btn btn-inverse" type="button">Yeni ekle</a>
            </div>
        </div>

        <div id="ajax_search">
            <div class="widget-body">
                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-bordered table-striped table-white">

                        <!-- Table heading -->
                        <thead>
                        <tr>
                            <th class="center">No.</th>
                            <th>Şarkı <a onclick="ChangeList(1,1)" type="button"><span
                                            class="glyphicon glyphicon-arrow-up"></span></a> <a
                                        onclick="ChangeList(1,2)" type="button"><span
                                            class="glyphicon glyphicon-arrow-down"></span></a></th>
                            <th>Şarkıcı <a onclick="ChangeList(4,1)" type="button"><span
                                            class="glyphicon glyphicon-arrow-up"></span></a> <a
                                        onclick="ChangeList(4,2)" type="button"><span
                                            class="glyphicon glyphicon-arrow-down"></span></a></th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>

                        <!-- Table body -->
                        <tbody>
                        @foreach($songs as $index=>$song)
                            <tr>
                                <td class="center">{{++$index}}</td>
                                <td>
                                    <a href="{{route('secureplay',str_replace('uploads/',"",$song->song_url))}}">{{ $song->song_name }}</a>

                                </td>
                                <td>{{ $song->singer }}</td>
                                <td class="text-right">
                                    <div class="btn-group btn-group-xs" >
                                        <a class="btn btn-inverse" style="float:left;" id="song{{$song->id}}" onclick="play_pause({{$song->id}})"><span
                                                    class="glyphicon glyphicon-play"> </span></a>
                                        <audio controls id="{{$song->id}}" preload="none" style="display:none;">
                                            <source src="{{route('secureplay',str_replace('uploads/',"",$song->song_url))}}" type="audio/mp4">
                                            <source src="{{ route('secureplay',str_replace('uploads/',"",$song->song_url))}}" type="audio/ogg">
                                            <source src="{{ route('secureplay',str_replace('uploads/',"",$song->song_url))}}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>

                                        <a href="" data-toggle="modal" class="btn btn-inverse"
                                           onclick="EditSong('{{$song->id}}','{{$song->song_name}}','{{$song->singer }}','{{$song->image_url}}');"><i
                                                    class="fa fa-pencil"></i></a>
                                        <a href="{{ Route('delete-song',$song->id)}}" class="btn btn-danger"
                                           onclick="if(!confirm('Are you sure to delete this item?')){return false;};"
                                           title="Delete this Item"><i class="fa fa-times"></i></a>

                                    </div>
                                </td>
                            </tr>
                            <!-- // Table row END -->
                            @endforeach
                                    <!-- Table row -->


                        </tbody>
                        <!-- // Table body END -->
                        <?php echo $songs->render(); ?>
                    </table>
                    <!-- // Table END -->
                </div>
            </div>
        </div>

    </div>

    <!-- Modal edit-->
    <div class="modal fade" id="modal-edit">

        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{Route('edit-my-song')}}" method="post" enctype="multipart/form-data"  accept-charset="UTF-8">
                    <!-- Modal heading -->
                    <div class="modal-header center">
                        <h4 class="heading_song"  >Şarkı Güncelle</h4>
                        <input type="hidden" name="song_id_edit" id="song_id_edit">
                    </div>
                    <!-- // Modal heading END -->
                    <div class="modal-body">

                        <div class="form-group">
                            <img src="" id="image_song_input" class="img-responsive">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Şarkıcı Adı</label>
                            <input type="text" class="form-control" id="singer_name_input" name="singer_name_input" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Şarkı</label>
                            <input type="text" class="form-control" id="song_name_input" name="song_name_input" >
                        </div>
                        <div class="form-group">
                            {!!  Form::File('image_change') !!}
                        </div>
                        <div class="text-center innerAll">
                            <Button href="" class="btn btn-primary" type="submit"  aria-hidden="true">Güncelle</Button>
                        </div>
                    </div>
                    {!! csrf_field() !!}
                </form>
            </div>
            <!-- // Modal body END -->

        </div>
    </div>

    <script>
        function  EditSong(id,song_name,singer,url) {
            document.getElementById('song_id_edit').value =id;
            var base_url = '{{ asset(':/url') }}';
            var new_url = base_url.replace(':/url', url);
            $(".modal-header .heading_song").html(song_name);
            document.getElementById("singer_name_input").value = singer;
            document.getElementById("song_name_input").value = song_name;
            document.getElementById("image_song_input").src = new_url;

            $('#modal-edit').modal('toggle');
        }

        function  play_pause(id) {
            var audio = document.getElementById(id);
            if (audio.paused == false) {
                console.log('paused'+'a#'+id);
                $('#song'+id).html('<span class="glyphicon glyphicon-play"></span>');
                audio.pause();
            } else {
                $('#song'+id).html('<span class="glyphicon glyphicon-pause"></span>');
                audio.play();
            }
        }
    </script>
@stop