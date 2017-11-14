@extends('layout_shop.master_shop')
@section('content')
	
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi tiết
                            <small>đơn hàng số 1</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Size</th>
                                <th>Màu sắc</th>
                                <th>Tổng tiền</th>
                                <th>Chỉnh sửa</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>1</td>
                                <td>giay the thao</td>
                                <td>.....</td>
                                <td>100000đ</td>
                                <td>2</td>
                                <td>XL</td>
                                <td>Trắng</td>
                                <td>200000đ</td>
                                <td class="center"> <a href="#">Chỉnh sửa</a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
 
@endsection