@extends('layouts.admin')

@section('content')
  <div class="container">
    <form method="POST" action="{{ route('admin.information.store') }}">
      @csrf
      <div class="form-group @error('title') has-error @enderror">
        <input class="form-control" placeholder="title" name="title" type="text">
        @error('title')
          <span class="help-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div class="form-group @error('content') has-error @enderror">
        <textarea class="form-control" placeholder="Please write down your question here..." name="content" cols="50" rows="10"></textarea>
        @error('content')
          <span class="help-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div class="form-group @error('release_date') has-error @enderror">
        <input class="form-control" name="release_date" type="date" value="{{ date('Y/m/d') }}">
        @error('release_date')
          <span class="help-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      <button class="btn btn-success pull-right" type="sumbit">create</button>
    </form>
  </div>
@endsection
