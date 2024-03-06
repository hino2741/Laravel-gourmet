@extends('layouts.admin')

@section('content')
<div class="panel-heading">
  <h1>お客様へのお知らせ一覧画面</h1>
</div>
@foreach ($infomationList as $infomation)
  <div class="panel panel-success">
    <div class="panel-heading">
      <h2>タイトル</h2>
      <p>{{ $infomation->title }}</p>
      <h2>本文</h2>
      <p>{{ $infomation->content }}</p>
      <table class="tebletable table-striped table-bordered">
        <tbody>
          <tr>
            <th>作成管理者名</th>
            <td>{{ $infomation->adminUsers->name }}</td>
          </tr>
          <tr>
            <th>公開日</th>
            <td>{{ $infomation->release_date->format('Y/m/d') }}</td>
          </tr>
          <tr>
            <th>作成日</th>
            <td>{{ $infomation->created_at->format('Y-m-d') }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endforeach
<div aria-label="Page navigation example" class="text-center">{{ $infomationList->appends(request()->query())->links() }}</div>
@endsection
