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
	.table table th{
		text-align: center !important
	}
	
	.table table th, .table table td{
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
		درج خبر جدید با موفقیت انجام شد
	</div>
@endif
@if(Session::get('updated') == true)
	<div class="message">
		خبر با موفقیت ویرایش شد.
	</div>
@endif
@if(Session::get('deleted') == true)
	<div class="message">
		خبر با موفقیت حذف شد.
	</div>
@endif
	<div class="insert">
		<a href="{{{  route('article.add')  }}}" > درج خبر جدید</a>
	</div>
	<div class="table">
	
		<table>
		<?php  $i=$articles->getFrom() ?>
			<tr>
				<th>#</th>
				<th style="width:10px">تاریخ</th>
				<th style="width:300px">عنوان</th>
				<th>وضعیت انتشار</th>
				<th>عملیات</th>
			</tr>
			@foreach($articles as $article )
			<tr>
				<td>{{{ $i++ }}}</td>
				<td>{{ jDate::forge(strtotime($article->date))->format('Y-m-d  H:i:s') }}</td>
				<td>{{{ $article->title }}}</td>
				
				<td>{{{ $article->publish== 0 ? 'منتشرنشده' : 'منتشرشده' }}}</td>
				<td id="text">
					<a href="{{ route('article.edit', $article->id) }}">
						<i class="fa fa-pencil" id="yellow"></i>ویرایش
					</a>
					
					<a href="{{{  route('article.delete', $article->id)  }}}" onclick="confirmed()">
						<i class="fa fa-minus-circle" id="red" ></i>حذف
					</a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
	{{ $articles->links() }}

	<script type="text/javascript" src="{{{ asset('js/jquery-1.11.1.js') }}}"></script>
	<script type="text/javascript">
	
		
		function confirmed()
		{
	    	var check = confirm("آیا حذف این پیام را تایید می کنید؟");
	    	if (check == 1)
	    	{
	        	document.getElementById('text').innerHTML = '';
	        	alert("پیام حذف شد");
	    	}
	    	else
	    	{
	      		document.getElementById('text').innerHTML = 'در صورت تایید، این پیام حذف خواهد شد';
	        	alert("حذف پیام لغو شد");
	    	}
		}

	</script>


@stop