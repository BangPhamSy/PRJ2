@extends('layout_shop.master_shop')
@section('content')
	
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <small>số lượng sản phẩm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Loại sản phẩm</th>
                                <th>Số lượng nhập</th>
                                <th>Số lượng xuất</th>
                                <th>Ngày tháng nhập</th>

                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>1</td>
                                <td>Giay the thao</td>
                                <td>....</td>
                                <td>thời trang</td>
                                <td>130</td>
                                <td>20</td>
                                <td>1/1/2017</td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
 
@endsection