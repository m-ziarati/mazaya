@extends('layouts.cms')

@stop
<style type="text/css">
	
	.border{
		border:1px solid #3AADAC;
		padding-bottom: 20px;
		width:500px;
		margin:60px auto;
		}	 
			
	#title{
		border-bottom: 1px solid #3AADAC;
		padding: 10px;
		font-size: 20px;
		text-align: center;
		margin-top: 10px
	}
	.padding{
		padding: 10px 15px
	}
	.error{
		color: #D83333;
		padding-right: 10px
	}
	.has-error input{
		border-color: red
	}
	.message{
		padding: 20px;
		text-align: center;
		border:1px solid green;
		width: 300px;
		margin: 20px auto;
		font-weight: bold
	}
	a{
		text-decoration: none;
		border: 1px solid #eee;
		padding: 3px
	}
	
	
</style>
@section('content')


{{ Form::open(['route' => 'category.update']) }}
{{ Form::hidden('id', $category->id) }}

	<div class="border">
		<div id="title" >
			ویرایش دسته بندی 
		</div>
		<div>
			<table>
				<tr>
					<td class="padding">
						نام:
					</td>
					<td class="{{ $errors ->has('name') ? 'has-error' : '' }}">
						{{ Form::text('name', Input::old('name', $category->name)) }}
					</td>
					<td class="error">
						{{ $errors->first('name') }}
					</td>
				</tr>
				<tr>
					<td colspan="3" style="padding:10px 80px 10px 0">
						{{ Form::submit('ارسال') }}
						<a href="{{ route('category.list') }}">cancle</a>
					</td>
				</tr>
			</table>
		</div>
	</div>


{{ Form::close() }}
@stop