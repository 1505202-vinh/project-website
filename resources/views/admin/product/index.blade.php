@extends('admin.app')
@section('content')
<?php
  // dd($categorys)
?>
<h1>Hiển thị danh sách sản phẩm</h1>
<table border="1" class="table" style="align:center;">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">Image</th>
        <th scope="col">Info</th>
        <th scope="col">Quantity</th>
        <th scope="col">Sold</th>
        <th scope="col">Category</th>
        <th scope="col">Status</th>
        <th scope="col">Admin</th>
        <th scope="col">Time create</th>
        <th scope="col" colspan="2"><a href="{{ route('admin.product.create') }}">Thêm</a></th>

      </tr>
    </thead>
    <tbody>

      @foreach($product as $key => $row)
      <tr>
        {{-- @dd($row->relation) --}}
        <td rowspan = "2">{{ (5*($product->currentPage()-1))+(++$key) }}</td>
        <td rowspan = "2">{{ $row->name }}</td>
        <td rowspan = "2">{{ number_format($row->price).' VNĐ' }}</td>
        <td rowspan = "2"><img width="100px" src="{{asset('storage/'.$row->image)}}" alt=""></td>
        <td rowspan = "2">{{ $row->info }}</td>
        <td>{{ $row->quantity }}</td>
        <td>{{ $row->sold }}</td>
        {{-- hiển thị tên category từ category_id --}}
        <td rowspan = "2">{{ $row->category->name }}</td>
        <td rowspan = "2">{{ $row->status?'Mới':'Cũ' }}</td>
        <td rowspan = "2">{{ $row->admin->name }}</td>
        <td rowspan = "2">{{ $row->created_at }}</td>
        <td rowspan = "2"><a href="{{ route('admin.product.edit',$row->id) }}">Sửa</a></td>
        <td rowspan = "2">
          <form action="{{ route('admin.product.destroy',$row->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" >Xóa
              <i class="fa fa-trash"></i>
            </button>
          </form>
        </td>
      </tr>
      <tr>
        <td colspan="2">{{($row->quantity)-($row->sold)}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$product->links()}}
@endsection
