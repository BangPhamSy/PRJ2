@extends('layout_admin.master_admin')
@section('content')
	<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách
                            <small>người dùng</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Thời gian tạo</th>
                                <th>Xóa</th>
           
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $user)
                            <tr class="odd gradeX" align="center">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->diachi}}</td>
                                <td>{{$user->sodienthoai}}</td>
                                <td>{{$user->created_at}}</td>
                                <td class="center">
                                	<i class="fa fa-trash-o  fa-fw"></i>
                                	<a href="{{route('delete_user',$user->id)}}"> Delete</a>
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
@endsection