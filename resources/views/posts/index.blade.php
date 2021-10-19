@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <h1 class="display-4 text-center">Laravel Post <i class="fas fa-mail-bulk"></i></h1>
</div>

<div class="col-md-8 col-md-2 mx-auto">
  @include('commons.error_messages')
</div>

@foreach ($posts as $post)
<div class="col-md-8 col-md-2 mx-auto">
    <div class="card-wrap">
        <div class="card mt-3">
            <div class="card-header align-items-center d-flex">
                <a class="no-text-decoration" href="{{ route('users.show', $post->user_id) }}">
                    <i class="fas fa-user-circle fa-2x mr-1"></i>
                </a>
                <a class="black-color" title="" href="">
                    <strong>
                      {{ $post->user->name }}
                    </strong>
                </a>
            </div>
            <div class="card-body">
                @if (Auth::id() == $post->user_id)
                <div class="post_edit">
                    <form class="edit_button" method="post" action="#">
                        @csrf
                        <button class="btn btn-primary btn-sm"><i class="far fa-edit"></i>編集</button>
                    </form>
                    <form class="edit_button" method="post" action="{{ route('posts.destroy', $post->id )}}" accept-charset="UTF-8">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm" rel="nofollow" ><i class="far fa-trash-alt"></i>削除</button>
                    </form>
                </div>
                @endif
                <h3 class="h5 title">
                    タイトル
                </h3>
                <div class="mb-5">
                    テキスト
                </div>
                <section>
                <!-- コメント --
                <div id="comment-post-1">
                        コメントをここに挿入 -->
                        <div class="m-4">
                            <form class="w-100" action="" method="post">
                                {{ csrf_field() }}
                                    <input name="utf8" type="hidden" value=""/>
                                    <input value="" type="hidden" name="user_id" />
                                    <input value="" type="hidden" name="post_id" />
                                    <input name="" value="" class="form-control comment-input border border-light mx-auto" placeholder="コメントを入力する">
                                    </input>
                                    <div class="text-right">
                                        <input type="submit" value="&#xf075;コメント送信" class="far fa-comment btn btn-default btn-sm">
                                        </input>
                                    </div>
                            </form>
                        </div>
                <!-- </div> -->
                </section>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection

