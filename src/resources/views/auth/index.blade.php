@extends('layouts.admin')

@section('content')
<h1>お客様へのお知らせ一覧画面</h1>
@foreach ($infomation as $infomation1)
  <h2>作成管理者名</h2>
  <p>{{ $infomation1->a->}}</p>
  <h2>公開日</h2>
  <div>{{ $infomation1->release_date->format('Y/m/d') }}</div>
  <h2>タイトル</h2>
  <p>{{ $infomation1->title }}</p>
  <h2>本文</h2>
  <p>{{ $infomation1->content }}</p>
@endforeach