@extends('layouts.blog-post')
 
 
@section('content')
 
    @if(Session::has('comment_message'))
 
        <p class="alert alert-success">{{session('comment_message')}}</p>
    @endif
 
    <!-- Blog Post -->
 
    <!-- Title -->
    <h1>{{$post->title}}</h1>
 
    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->name}}</a>
    </p>
 
    <hr>
 
    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
    <hr>
 
    <!-- Preview Image -->
    <img class="img-responsive img-rounded" src="{{asset($post->photo->file)}}" alt="">
    <hr>
 
    <!-- Post Content -->
    <p>{{$post->body}}</p>
 
    <hr>
 
    <!-- Blog Comments -->
 
 
 
 
    <!-- Comments Form -->
    <div>
 
        <form action="{{action('PostCommentsController@store')}}" method="POST">
			{{csrf_field()}}
            <input type="hidden" name="post_id" value="{{$post->id}}">
 
            <div class="form-group">
 
                <label for="body">Comment</label>
                <textarea name="body" rows="5" class="form-control"></textarea>
 
            </div>
 
 
            <div class="form-group">
 
                <button class="btn btn-primary" name="btn_leave_comment">Comment</button>
 
            </div>
 
        </form>
 
    </div>
 
 
    <hr>
 
    <!-- Posted Comments -->
 
    @if(count($comments) > 0)
 
        @foreach($comments as $comment)
 
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img style="height: 64px;" class="media-object" src="{{asset($comment->photo) ? asset($comment->photo) : 'images/default.jpg'}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
					</h4>
                    {{$comment->body}}
 
                   @if(count($comment->replies) > 0)
 
                       @foreach($comment->replies as $reply)
 
 
                            <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="40px" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    <p>{{$reply->body}}</p>
                                </div>
 
								{{--<form action="{{action('CommentRepliesController@createReply')}}" method="POST">--}}
 
									{{--<input type="hidden" name="comment_id" value="{{$comment->id}}">--}}
 
									{{--<div class="form-group">--}}
 
										{{--<label for="body">Reply</label>--}}
								{{--<textarea name="body" rows="2" class="form-control"></textarea>--}}
 
								{{--</div>--}}
 
								{{--<button class="btn btn-primary" name="btn_create_reply">Reply</button>--}}
 
								{{--</form>--}}
 
 
                            <!-- End Nested Comment -->
 
                           </div>
 
                        @endforeach
 
                   @endif
 
                </div>
 
            <div class="comment-reply-container">
 
                <button class="toggle-reply btn btn-primary pull-right">Reply</button>
 
                <div class="comment-reply">
 
                    <br>
						<form action="{{action('CommentRepliesController@createReply')}}" method="POST">
							{{csrf_field()}}
 
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
 
 
                        <div class="form-group">
 
                            <label for="body">Reply</label>
                            <textarea name="body" rows="2" class="form-control"></textarea>
 
                        </div>
 
                        <button class="btn btn-primary" name="btn_create_reply">Reply</button>
 
                    </form>
 
                </div>
 
            </div>
 
            </div>
 
        @endforeach
 
    @endif
 
 
@endsection
 
@section('scripts')
 
    <script>
 
        $(".comment-reply-container .toggle-reply").click(function(){
           $(this).next().slideToggle("slow");
 
        });
 
    </script>
 
@stop