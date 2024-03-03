@extends('layouts.app')
<h1>test</h1>
@foreach ($infomation as $infomation1)
  <div>{{ $infomation1->title }}</div>
@endforeach