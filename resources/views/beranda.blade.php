@extends('layouts.master')
@section('custom_css')
@endsection

@section('title')
	BERANDA
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
    <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <!--  -->
            </div>
            <div class="panel-body">
                <div class="col-sm-4 col-xs-8 form-group">
                    <!--  -->
                </div>
                <div class="col-sm-12">
                <table class="table table-striped table-bordered" id="dataTables-example">
                    <thead>
                        <tr>
                            <th colspan="2">DATA DIRI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="200px">USERNAME</td>
                            <td>@if($user != null) {{ $user->USERNAME }} @endif</td>
                        </tr>
                        <tr>
                            <td width="200px">ROLE</td>
                            <td>@if($user != null) {{ $user->role['NAMA_ROLE'] }} @endif</td>
                        </tr>
                        <tr>
                            <td width="200px">KOTA</td>
                            <td>@if($user != null) {{ $user->kota['NAMA_KOTA'] }} @endif</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>    
    <!--End Advanced Tables -->
    </div>
</div>
@endsection

@section('custom_script')
@endsection