@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="form-wrap col-xs-6 col-lg-5 mx-auto mt-4 mb-5">
            <div class="form-group text-center">
            　　<h2 class="logo-img mx-auto mb-2 mt-2">ログイン</h2>
            </div>

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group mt-1 mb-1">
                    {!! Form::email('email', old('email'), ['class' => 'form-control','placeholder' => 'メールアドレス']) !!}
                </div>
                <div class="form-group mt-1 mb-1">
               　   {!! Form::password('password', ['class' => 'form-control','placeholder' => 'パスワード']) !!}
           　   </div>
                <div class="actions text-center">
               　   {!! Form::submit('ログインする',['class' => 'btn btn-danger w-auto']) !!}
           　   </div>
      　    {!! Form::close() !!}

            <p class="devise-link text-center mb-2">アカウントをお持ちでないですか？{!! link_to_route('signup', '新規登録する') !!}</p>
        </div>
    </div>
</div>>

@endsection
