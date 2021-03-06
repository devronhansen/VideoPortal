@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <h1>Alle Videos</h1>
    </div>
        <div class="col-md-3 pull-right">
            <select class="form-control" name="category_id" id="select-category">
                <option value="" disabled selected hidden>Sortieren nach Katagorie...</option>
                <option value="0">Alle</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    <div class="input-group col-md-2 pull-right">
        <input type="text" class="form-control" id="search" name="search"
               placeholder="Suchen...">
    </div>
        <div class="col-md-12">
            <hr>
        </div>
    <div class="row">
        <div id="all-thumbnails">
            @foreach($posts as $post)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="/thumbnails/{{$post->id}}.jpg" alt="...">
                        <div class="caption">
                            <h3>{{(strlen($post->title)>=18) ? substr($post->title, 0, 18)."..." : $post->title}}</h3>
                            <p>{{ strlen(strip_tags($post->body))>=130 ? substr(strip_tags($post->body), 0, 130)."..." : strip_tags($post->body)}}</p>
                            <p><a href="/video/{{$post->slug}}" class="btn btn-primary place-bottom-left" role="button">Mehr</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">
        {{ $posts->links() }}
    </div>
@endsection

@section('scripts')
    <script src="/javascript/order-videos.js"></script>
    <script type="text/javascript">
        $('#search').on('keyup', function () {
           $value = $(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data: {'search': $value},
                success:function (data) {
                    if(data.no!==""){
                        $('#all-thumbnails').html(data);
                    }
                    else{
                        alert('not found');
                    }
                }
            });
        });
    </script>
@endsection