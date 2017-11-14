@extends('layout_shop.master_shop')
@section('content')
	
               <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <small>Sản phẩm khuyến mại</small>
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
                                <th>Chấp nhận</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($list_sp as $list)
                            
                            <tr class="odd gradeX" align="center">
                                <td>{{$i++}}</td>
                                <td>{{$list->tensanpham}}</td>
                                <td>{{$list->gia}}</td>
                                <td>{{$list->tilekhuyenmai}}%</td>
                                <td>
                                    <img src="upload/{{$list->hinhanh}}" style="height: 50px;">
                                </td>
                                
                                <td class="center">
                                           
                                   <!--  <label for="sp{{$list->id}}" class="accept-discount" data-link="qlshop/shop/{{$shop->id}}/sanpham/chapnhan/{{$list->id}}">
                                         <input type="checkbox" name="" id="sp{{$list->id}}">
                                    </label> -->
                                    <a href="qlshop/shop/{{$shop->id}}/sanpham/chapnhan/{{$list->id}}">Thêm</a>
                                    
                                </td>
                                
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>

@endsection
