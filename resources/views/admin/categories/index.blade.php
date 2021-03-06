@extends('layouts.admin')

@section('content')

<h1>Categories</h1>

<div class="col-sm6">
	<div class="sm-6">
		{!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
		<div class="form-group">
			{!!Form::label('name', 'Name: ')!!}
			{!!Form::text('name', null, ['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!! Form::submit('Create Category', ['class'=>'btn btn-primary'])!!}
		</div>
		{!! Form::close() !!}
	</div>
</div>

<div class="col-sm6">

	@if($categories)
	<table>
		<thead>
			<th>id</th>
			<th>Name</th>
			<th>Created</th>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
				<td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date Here'}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	
</div>

@stop