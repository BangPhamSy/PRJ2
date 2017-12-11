@extends('layout_shop.master_shop')
@section('content')
    
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách 
                            <small></small>
                        </h1>
                        <p style="color: white;">{{$i=1}}</p>
                    </div>
                    
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                
                                <th>Nội dung</th>
                                <th>Thời gian bình luận</th>
                                <th>Trả lời</th>
                                <th>Thời gian trả lời</th>

                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($binhluan as $bl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$i++}}</td>
                                <td>{{$bl->Users->name}}</td>
                                <td>{{$bl->Sanpham->tensanpham}}</td>
                                <td>
                                    <img style="height:50px; " src="upload/{{$bl->Sanpham->hinhanh}}">
                                </td>
                                <td>{{$bl->noidung}}</td>
                                <td>{{$bl->created_at}}</td>
                                <td>Chưa trả lời</td>
                                <td>time</td>
                                
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>

                <!-- /.row -->
 
@endsection 