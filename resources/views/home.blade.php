@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					<h3>Create Post</h3>

    <div class="row">
         {!! Form::open(['method'=>'POST', 'action'=> 'AdminPostsController@store', 'files'=>true]) !!}

           <div class="form-group">
                 {!! Form::label('title', 'Title:') !!}
                 {!! Form::text('title', null, ['class'=>'form-control'])!!}
           </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null,['class'=>'form-control'])!!}
             </div>


            <div class="form-group">
                {!! Form::label('body', 'Description:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
            </div>

             <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
             </div>

           {!! Form::close() !!}

    </div>
			@if($posts)
					@foreach($posts as $post)
						<div class="post">
							{{$post->comments[0]->body
							}}
	<tr>
		<div>
			<img height="100" src="{{$post->photo ? asset($post->photo->file) : 'http://placeholder.it/400x400'}}" alt="Blah">
					</div>
		<td>{{$post->user->name}}</td>
		<td><a href="{{route('posts.edit', ['id' => $post->id])}}">{{$post->title}}</a></td>
		<td>{{$post->body}}</td>
		<td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
		
		<td></td>
		<td>{{$post->created_at->diffForHumans()}}</td>
	</tr>
					</div>
@endforeach
					@endif
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection