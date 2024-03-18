@extends('layouts.admin')

@section('content')
<div class="panel-heading">
  <h1>お客様へのお知らせ一覧画面</h1>
</div>
@foreach ($informationList as $information)
  <div class="panel panel-success">
    <div class="panel-heading">
      <h2>タイトル</h2>
      <p>{{ $information->title }}</p>
      <h2>本文</h2>
      <p>{{ $information->content }}</p>
      <table class="tebletable table-striped table-bordered">
        <tbody>
          <tr>
            <th>作成管理者名</th>
            <td>{{ $information->adminUser->name }}</td>
          </tr>
          <tr>
            <th>公開日</th>
            <td>{{ $information->release_date->format('Y/m/d') }}</td>
          </tr>
          <tr>
            <th>作成日</th>
            <td>{{ $information->created_at->format('Y/m/d') }}</td>
          </tr>
        </tbody>
      </table>
      <a href="{{ route('admin.information.edit', $information->id) }}">編集</a>
    </div>
  </div>
@endforeach
<div aria-label="Page navigation example" class="text-center">{{ $informationList->appends(request()->query())->links() }}</div>
@endsection
