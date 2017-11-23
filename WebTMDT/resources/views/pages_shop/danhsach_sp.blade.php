@extends('layout_shop.master_shop')

@section('content')
	 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <small>Sản phẩm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <p style="color: white;">{{$i=1}}</p>
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Tỉ lệ khuyến mại</th>
                                <th>Hình ảnh</th>
                                <th>Thương hiệu</th>
                                <th>Mô tả</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($list_sp as $list)
                            
                            <tr class="odd gradeX" align="center">
                                <td>{{$i++}}</td>
                                <td>{{$list->tensanpham}}</td>
                                @if($list->kmdonggia>0)
                                    <td>{{number_format($list->kmdonggia)}}đ</td>
                                @else
                                    <td>{{number_format($list->gia)}}đ</td>
                                @endif
                                @if($list->kmtile==0)
                                    <td>{{$list->tilekhuyenmai}}%</td>
                                @else
                                    <td>{{$list->kmtile}}%</td>
                                @endif

                                <td>
                                    <img src="upload/{{$list->hinhanh}}" style="height: 50px;">
                                </td>
                                <td>{{$list->hangsx}}</td>
                                <td>{{$list->mota}}</td>
                                
                                <td class="center"><i class="fa fa-pencil fa-fw"></i>
                                    <a href="qlshop/shop/{{$shop->id}}/sanpham/sua/{{$list->id}}">Edit</a>
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
@endsection