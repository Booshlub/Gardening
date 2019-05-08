@extends('layouts.admin')


@section('content')
<h1>Posts Index</h1>


@if($posts)
<table>
	<thead>
         <tr>
             <th>Id</th>
             <th>Photo</th>
             <th>Owner</th>
             <th>Category</th>
             <th>Title</th>
             <th>body</th>
             <th>Post link</th>
             <th>Comments</th>
             <th>Created at</th>
             <th>Update</th>
          </tr>
        </thead>
        <tbody>
	@foreach($posts as $post)
	<tr>
		<td>{{$post->id}}</td>
		<td>
			<img height="100" src="{{$post->photo ? asset($post->photo->file) : 'http://placeholder.it/400x400'}}" alt="Blah">
		</td>
		<td>{{$post->user->name}}</td>
		<td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
		<td><a href="{{route('posts.edit', ['id' => $post->id])}}">{{$post->title}}</a></td>
		<td>{{$post->body}}</td>
		<td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
		<td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
		<td></td>
		<td>{{$post->created_at->diffForHumans()}}</td>
	</tr>
</table>
@endforeach
@endif
@stop