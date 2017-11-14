@extends('layout_shop.master_shop')
@section('content')
	
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
                                <th>Thanh toán</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>1</td>
                                <td>Linh</td>
                                <td>1/1/2018</td>
                                <td>100000đ</td>
                                <td><a href="qlshop/shop/{{$shop->id}}/donhang/chitiet">Link</a></td>
                                <td class="center"> <a href="">Chấp nhận</a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
 
@endsection