@extends('layouts.cms')

@stop

<style type="text/css">

	
	.border{
		
	border:1px solid #3AADAC;
	padding-bottom: 20px;
	width:800px;
	margin:40px auto;
		
		

		
	}
	#title{
		border-bottom: 1px solid #3AADAC;
		padding: 10px;
		font-size: 20px;
		text-align: center;
		margin-top: 10px
	}
	.padding td{
		padding: 10px 15px
	}
	.error{
		color: #D83333;
		padding-right: 10px
	}
	.has-error input{
		border-color: red
	}
a{
		text-decoration: none;
		border: 1px solid #eee;
		padding: 5px;
		display: inline-block;
		

	}
	.height{
		height: 100px;
		width: 200px
	}
	
</style>
@section('content')

{{ Form::open(['route' => 'article.insert']) }}
	
	<div class="border">
		<div id="title">
			درج خبر جدید
		</div>
		<div class="padding">
			<table >
				<tr>
					<td >
						تاریخ:
					</td>
					<td class="{{ $errors ->has('date') ? 'has-error' : '' }}">
						{{ Form::text('date', Input::old('date')) }}
					</td>
					<td class="error">
						{{ $errors->first('date') }}
					</td>
				</tr>
				<tr>
					<td  >
						عنوان:
					</td>
					<td class="{{ $errors ->has('title') ? 'has-error' : '' }}">
						{{ Form::textarea('title', Input::old('title'),['class'=>'height'] ) }}
					</td>
					<td class="error">
						{{ $errors->first('title') }}
					</td>
				</tr>
				<tr>
					<td >
						وضعیت انتشار:
					</td>
					<td class="{{ $errors ->has('publish') ? 'has-error' : '' }}">
						{{ Form::text('publish', Input::old('publish')) }}
					</td>
					<td class="error">
						{{ $errors->first('publish') }}
					</td>
				</tr>

				<tr>
					<td >
						دسته بندی:
					</td>
					<td class="{{ $errors ->has('categoryId') ? 'has-error' : '' }}">
						{{ Form::select('categoryId[]', Category::lists('name','id' ) ,Input::old('categoryId') , ['multiple'=> 'multiple'] ) }}
					</td>
					<td class="error">
						{{ $errors->first('categoryId') }}
					</td>
				</tr>

				<tr>
					<td colspan="3" style="padding:10px 150px 10px 0">
						{{ Form::submit('ارسال') }}
						<a href="{{ route('article.list') }}">cancle</a>
					</td>
					
				</tr>
			</table>
		</div>
	</div>


{{ Form::close() }}
@stop