@extends('layout_shop.master_shop')
@section('content')
	 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm
                            <small>Sản phẩm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Tên sản phẩm:</label>
                                <input class="form-control" name="tensp" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Giá:</label>
                                <input class="form-control" name="txtPrice" placeholder="Đơn vị VNĐ" />
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select>
                                    <option name="thoitrang">Thời trang</option>
                                    <option name="thethao">Thể thao</option>
                                    <option name="amthuc"> Ẩm thực</option>
                                    <option name="vpp">Văn phòng phẩm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Xuất sứ</label>
                                <textarea class="form-control"  name="txtContent"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                           
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        <form>
                    </div>
                </div>
@endsection