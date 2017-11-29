@extends('layout_shop.master_shop')
@section('content')
	           <p style="color: white;">{{$i=1}}</p>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <small>đơn hàng đã đặt mua</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên Khách hàng</th>
                                <th>Thời gian đặt</th>
                                <th>Tổng tiền</th>
                                <th>Chi tiết đơn</th>
                                <th>Tình trạng đơn</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($donhang as $dh)
                            <tr class="odd gradeX" align="center">
                                <td>{{$i++}}</td>
                                <td>{{$dh->Donhang->hoten}}</td>
                                <td>{{$dh->created_at}}</td>
                                <td>{{number_format($dh->tongtien)}} VNĐ</td>
                                <td>
                                    <a href="qlshop/shop/{{$shop->id}}/donhang/chitiet/{{$dh->id}}">
                                        Xem chi tiết
                                    </a>
                                </td>
                                <td class="center">
                                    @if($dh->trangthai==1)
                                        <b style="color: red;">Đã giao hàng</b>
                                    @else
                                     <a href="">Chưa giao hàng</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
 
@endsection