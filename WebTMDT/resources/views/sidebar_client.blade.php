<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@foreach($loaisanpham as $lsp)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a  href="index/loai-san-pham/{{$lsp->id}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$lsp->tenloaisanpham}}
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											 <li><a href="#"> </a></li> 
											
										</ul>
									</div>
								</div>
							</div>
						@endforeach
						

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Hàng mới về</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Sản phẩm bán chạy nhất</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<!-- <li><a href="#"> <span class="pull-right">(50)</span>Nike</a></li> -->
									@foreach($thuonghieu as $th)
										<li>
											<a href="index/thuong-hieu/{{$th->hangsx}}">
												{{$th->hangsx}}
											</a>
										</li>
									@endforeach
									
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Khoảng giá</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000000" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left"> 0</b> <b class="pull-right">10.000.000</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="eshopper/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>