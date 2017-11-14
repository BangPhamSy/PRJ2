@extends('layout_shop.master_shop')
@section('content')
	
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chiến lược
                            <small> khuyến mại</small>
                        </h1>
                        <form style="width: 300px;padding-bottom: 30px">
                        <div class="form-group">
                                <label>Nhập tỉ lệ khuyến mại:</label>
                                <input class="form-control" name="tile" placeholder="" />
                        </div>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </form>
                    </div>


                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th> Giá</th>
                                <th>Tỉ lệ khuyến mại</th>
                                <th>Hình ảnh</th>
                                <th>Xóa</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>1</td>
                                <td>Tin Tức</td>
                                <td>None</td>
                                <td>None</td>
                                <td>Hiện</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
 
@endsection