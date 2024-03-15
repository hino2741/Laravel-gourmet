@extends('layouts.admin')

@section('content')
  <div class="container">
    {{ Form::open(['route' => 'admin.information.store', 'method' => 'POST']) }}
      <div class="form-group">
        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) }}
      </div>
      <div class="form-group">
        {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Please write down your question here...', 'cols' => '50', 'rows' => '10']) }}
      </div>
      <div class="form-group">
        {{ Form::date('release_date', date('Y/m/d'), ['class' => 'form-control']) }}
      </div>
      {{ Form::submit('create', ['class' => 'btn btn-success pull-right', 'type' => 'submit']) }}
    {{ Form::close() }}
  </div>
@endsection
