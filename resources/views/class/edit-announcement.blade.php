@extends('component.app')
@section('css')

@endsection
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit announcement</h3>
    </div>
    <!-- /.box-header -->
    @foreach($edit_announce->groupBy('id_announce') as $announce)
    <div class="box-body">
        <form method="post" action="{{ route('updateAnnouncement') }}">
            @csrf
            <textarea id="ckeditor" class="ckeditor @error('ckeditor') is-invalid @enderror" name="ckeditor" required
                autofocus>{{$announce[0]['announce_content']}}</textarea>
            <br>
            <!-- File Input -->
            <div>
                @foreach($announce as $item)
                @if($item->filename != null)
                <p><b>File tidak dapat diubah!</b></p>
                @endif
                <p id="files-area">
                    <span id="files-list">
                        <table border=1>
                            <tr>
                                <td><span id="files-names">{{$item->filename}}</span></td>
                            </tr>
                        </table>
                    </span>
                </p>
                @endforeach
            </div><br>
            <input type="hidden" name="id_announce" value="{{$announce[0]['id_announce']}}">
            <!-- File Input -->
            <div class="box-footer pull-left">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Posting</button>
            </div>
        </form>
    </div><!-- /.box-body -->
    @endforeach
</div>

@endsection
@section('js')

@endsection
