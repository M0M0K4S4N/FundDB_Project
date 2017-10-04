@extends('layouts.app')

@section('content')
<div class="blog-header">
  <h1 class="blog-title">View Post</h1>
  <p class="lead blog-description">All posts should belong here.</p>
  @foreach ($posts as $post)
    @if ($post == NULL)
      <p>NOT FOUND</p>
      @break
    @endif
    <p>This is post id: {{ $post->id }}, {{ $post->title }}, {{ $post->content }}</p>
  @endforeach
</div>
@endsection
