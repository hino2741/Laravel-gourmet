@extends('layouts.admin')

@section('content')
<div class="panel-heading">
  <h1>お客様へのお知らせ一覧画面</h1>
</div>
@foreach ($infomation as $blog)
  <div class="panel panel-success">
    <div class="panel-heading">
      <h2>タイトル</h2>
      <p>{{ $blog->title }}</p>
      <h2>本文</h2>
      <p>{{ $blog->content }}</p>
      <table class="tebletable table-striped table-bordered">
        <tbody>
          <tr>
            <th>作成管理者名</th>
            <td>{{ $blog->adminUsers->name }}</td>
          </tr>
          <tr>
            <th>公開日</th>
            <td>{{ $blog->release_date->format('Y/m/d') }}</td>
          </tr>
          <tr>
            <th>作成日</th>
            <td>{{ $blog->created_at->format('Y-m-d') }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endforeach