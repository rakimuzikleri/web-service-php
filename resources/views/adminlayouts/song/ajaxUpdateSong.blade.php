<div class="login spacing-x2">
    <div class="col-sm-6 col-sm-offset-3 top-buffer" >
        <div class="panel panel-default">
            <div class="panel-body innerAll">
                <form role="form" action="{{ Route('update-song-post',$song_id) }}" method="post" enctype="multipart/form-data"  accept-charset="UTF-8" >
                    <div class="form-group">
                        <label for="singer">Singer</label>
                        <input type="text" class="form-control" name="singer" value="{{ $singer }}"placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="songName">Song Name</label>
                        <input type="text" class="form-control" name="songName" value="{{ $songName }}"placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Foroğraf seç</label>
                        {!!  Form::File('image') !!}
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Güncelle</button>
                    {!! csrf_field() !!}
                </form>
            </div>
        </div>
    </div>
</div>