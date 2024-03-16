@extends('layouts.admin')

@section('content')
  <div class="container">
    {{ Form::open(['route' => 'admin.information.store', 'method' => 'POST']) }}
      <div class="form-group @error('title') has-error @enderror">
        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) }}
        @error('title')
          <span class="help-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div class="form-grou @error('content') has-error @enderror">
        {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Please write down your question here...', 'cols' => '50', 'rows' => '10']) }}
        @error('content')
          <span class="help-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div class="form-group @error('release_date') has-error @enderror">
        {{ Form::date('release_date', date('Y/m/d'), ['class' => 'form-control']) }}
        @error('release_date')
          <span class="help-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      {{ Form::submit('create', ['class' => 'btn btn-success pull-right', 'type' => 'submit']) }}
    {{ Form::close() }}
  </div>
@endsection
