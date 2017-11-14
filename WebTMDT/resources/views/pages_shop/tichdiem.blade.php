@extends('layout_shop.master_shop')
@section('content')
	
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <small>thành viên tích diểm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th> Điểm tích lũy</th>
                                <th>Tiền quy đổi</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>1</td>
                                <td>A</td>
                                <td>100</td>
                                <td>10000đ</td>
                               
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
 
@endsection