

      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background: #d0ffc0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Trang quản lí Shop <b>{{$shop->tenshop}}</b>
                    -Chủ sở hữu:{{$shop->name}}
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>{{$shop->tenshop}}</a>
                       
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Thống kê<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Sản phẩm bán chạy nhất</a>
                                </li>
                                <li>
                                    <a href="#">Tổng doanh thu Shop</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-apple" aria-hidden="true"></i> Quản lí sản phẩm<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="">Danh sách sản phẩm</a>
                                     <ul class="nav nav-third-level">
                                        @foreach($loaisp as $lsp)
                                            <li>
                                                <a href="qlshop/shop/{{$shop->id}}/sanpham/danhsach/{{$lsp->id}}">
                                                    {{$lsp->tenloaisanpham}}
                                                </a>
                                            </li>
                                        @endforeach
                                       
                                     </ul>
                                </li>
                                <li>
                                    <a href="qlshop/shop/{{$shop->id}}/sanpham/them">Thêm sản phẩm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cc" aria-hidden="true"></i>
                                    Quản lí khuyến mại<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="qlshop/shop/{{$shop->id}}/khuyenmai/danhsach">Danh sách sản phẩm khuyến mại</a>
                                </li>
                                <li>
                                    <a href="">Chiến lược giảm giá</a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="qlshop/shop/{{$shop->id}}/khuyenmai/chienluoc/tile">Theo tỉ lệ</a>
                                            <ul class="nav nav-four-level">
                                                 @foreach($loaisp as $lsp)
                                                    <li>
                                                        <a href="qlshop/shop/{{$shop->id}}/khuyenmai/chienluoc/tile/danhsach/{{$lsp->id}}">
                                                            {{$lsp->tenloaisanpham}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="qlshop/shop/{{$shop->id}}/khuyenmai/chienluoc/donggia">Đồng giá</a>
                                            <ul class="nav nav-four-level">
                                                 @foreach($loaisp as $lsp)
                                                    <li>
                                                        <a href="qlshop/shop/{{$shop->id}}/khuyenmai/chienluoc/donggia/danhsach/{{$lsp->id}}">
                                                            {{$lsp->tenloaisanpham}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                       
                                     </ul>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                                Quản lí đơn hàng<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="qlshop/shop/{{$shop->id}}/donhang/danhsach">Đơn hàng </a>
                                </li>
                                <li>
                                    <a href="qlshop/shop/{{$shop->id}}/donhang/don-da-thanh-toan">Đơn hàng đã giao</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pie-chart" aria-hidden="true"></i>Quản lí kho<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="">Sản phẩm kho</a>
                                     <ul class="nav nav-third-level">
                                        @foreach($loaisp as $lsp)
                                            <li>
                                                <a href="qlshop/shop/{{$shop->id}}/khohang/danhsach/{{$lsp->id}}">
                                                    {{$lsp->tenloaisanpham}}
                                                </a>
                                            </li>
                                        @endforeach
                                       
                                     </ul>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                Quản lí bình luận<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">List User</a>
                                </li>
                                <li>
                                    <a href="#">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


        