@extends("layout.main")

@section("content")
    <div class="col-sm-8">
        <blockquote>
            <p><img src="{{$user->avatar}}" alt="" class="img-rounded"
                    style="border-radius:500px; height: 40px"> {{$user->name}}</p>
            <footer>关注：{{$user->stars_count}}｜粉丝：{{$user->fans_count}}｜文章：{{$user->posts_count}}</footer>
            @include('user.badges.like', ['target_user' => $user])
        </blockquote>
    </div>
    <div class="col-sm-8 blog-main">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <?php \Carbon\Carbon::setLocale('zh');?>
                    @foreach($posts as $post)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class=""><a style="margin-right: 12px;"
                                           href="/user/{{$post->user_id}}">{{$post->user->name}}</a>{{$post->created_at->diffForHumans()}}
                            </p>
                            <p class=""><a href="/posts/{{$post->id}}">{{$post->title}}</a></p>
                            <p>
                            <p>{!!Str::limit($post->content, 100, '...')!!}</p>
                        </div>
                    @endforeach

                </div>

                <div class="tab-pane" id="tab_2">
                    @foreach($susers as $suser)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class="">{{$suser->name}}</p>
                            <p class="">关注：{{$suser->stars()->count()}} | 粉丝：{{$suser->fans()->count()}}
                                ｜文章：{{$suser->posts()->count()}}</p>
                            @include('user.badges.like',['target_user'=>$suser,'m_type'=>'1'])
                        </div>
                    @endforeach
                </div>

                <div class="tab-pane" id="tab_3">
                    @foreach($fusers as $fuser)
                        <div class="blog-post" style="margin-top: 30px">
                            <p class="">{{$fuser->name}}</p>
                            <p class="">关注：{{$fuser->stars()->count()}} | 粉丝：{{$fuser->fans()->count()}}
                                ｜文章：{{$fuser->posts()->count()}}</p>
                            @include('user.badges.like',['target_user'=>$fuser,'m_type'=>'2'])
                        </div>
                    @endforeach
                </div>


            </div>
            <!-- /.tab-content -->
        </div>


    </div><!-- /.blog-main -->
@endsection
