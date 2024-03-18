@extends('layouts.admin')

@section('content')
  <div class="container">
    <form method="POST" action="{{ route('admin.information.update', $information->id) }}">
      @method('PUT')
      @csrf
      <div class="form-group @error('title') has-error @enderror">
        <input class="form-control" placeholder="title" name="title" type="text" value="{{ $information->title }}">
        @error('title')
          <span class="help-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div class="form-group @error('content') has-error @enderror">
        <textarea class="form-control" placeholder="Please write down your question here..." name="content" cols="50" rows="10">{{ $information->content }}</textarea>
        @error('content')
          <span class="help-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      <div class="form-group @error('release_date') has-error @enderror">
        <input class="form-control" name="release_date" type="date" value="{{ $information->release_date }}">
        @error('release_date')
          <span class="help-block">
            {{ $message }}
          </span>
        @enderror
      </div>
      <button class="btn btn-success pull-right" type="sumbit">update</button>
    </form>
  </div>
@endsection
