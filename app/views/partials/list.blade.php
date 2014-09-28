<div class="row">
    @for ($i = 0; $i < count($posts); $i++)
    @if ($i % 3 === 0)
    <div class="post col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="post-container">
            <div class="hidden-xs">
                @if ($cover = $posts[$i]->image->size('1024','400'))
                <div class="cover">
                    <a href="{{URL::asset($posts[$i]->slug)}}">
                        <img width="100%" src="{{URL::asset('/uploads/'.$posts[$i]->id.'/'.$cover)}}">
                    </a>
                </div>
                @endif
            </div>
            <div class="hidden-sm hidden-md hidden-lg">
                @if ($cover = $posts[$i]->image->size('768','768'))
                <div class="cover">
                    <a href="{{URL::asset($posts[$i]->slug)}}">
                        <img width="100%" src="{{URL::asset('/uploads/'.$posts[$i]->id.'/'.$cover)}}">
                    </a>
                </div>
                @endif
            </div>
            {{-- @if ($category = $posts[$i]->categories->first())
            <h3 class="category"><span class="category-background">{{$category->name}}</span></h3>
            @endif --}}
            @if ($title = $posts[$i]->title)
            <a href="{{URL::asset($posts[$i]->slug)}}">
                <h2 class="title">{{$title}}</h2>
            </a>
            @endif
        </div>
    </div>
    @else
    <div class="post col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="post-container">
            @if ($cover = $posts[$i]->image->size('768','768'))
            <div class="cover">
                <a href="{{URL::asset($posts[$i]->slug)}}">
                    <img width="100%" src="{{URL::asset('/uploads/'.$posts[$i]->id.'/'.$cover)}}">
                </a>
            </div>
            @endif
            {{--@if ($category = $posts[$i]->categories->first())
            <h3 class="category"><span class="category-background">{{$category->name}}</span></h3>
            @endif--}}
            @if ($title = $posts[$i]->title)
            <a href="{{URL::asset($posts[$i]->slug)}}">
                <h2 class="title">{{$title}}</h2>
            </a>
            @endif
        </div>
    </div>
    @endif
    @endfor
</div>