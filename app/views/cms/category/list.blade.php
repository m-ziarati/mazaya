@extends('layouts.cms')

@stop
<style type="text/css">
	.insert  {
		padding: 20px;
	}
	.insert a{
		font-size: 24px;
		text-decoration: none;
		border: 1px solid #3FAED2;
		padding: 10px;
		border-radius: 4px;
	}
	
	 table th,  table td{
		border: 1px groove #3AADAC;
		padding: 10px;
		text-align: justify;
	} 
	td a{
		
		
		padding: 5px;
		
	}
	td a i{
		padding: 5px;
		
	}
	td a i#red{
color: red
		}
	td a i#yellow{
color:#E6B45D
	}

.message{
		padding: 20px;
		text-align: center;
		border:1px solid green;
		width: 300px;
		margin: 20px auto;
		font-weight: bold
	}


</style>
@section('content')

@if(Session::get('inserted') == true)
	<div class="message">
		درج اطلاعات شما با موفقیت انجام شد
	</div>
@endif

@if(Session::get('updated') == true)
	<div class="message">
		دسته بندی با موفقیت ویرایش شد.
	</div>
@endif

@if(Session::get('deleted') == true)
	<div class="message">
		عملیات با موفقیت حذف شد.
	</div>
@endif
	<div class="insert">
		<a href="{{{ route('category.add') }}}">درج دسته بندی جدید</a>
	</div>
	<div>
	
		<table>
		<?php  $i=$categories ->getFrom(); ?>
			<tr>
				<th>#</th>
				<th>نام</th>
				<th>عملیات</th>
				
			</tr>
			@foreach($categories as $category )
			<tr>
				<td>{{{ $i++ }}}</td>
				<td>{{{ $category->name }}}</td>
				<td>
					<a href="{{ route('category.edit', $category->id) }}">
						<i class="fa fa-pencil" id="yellow"></i>ویرایش
					</a>
					<a href="{{{ route('category.delete', $category->id) }}}">
						<i class="fa fa-minus-circle" id="red"></i>حذف
					</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
{{ $categories->links() }}
@stop