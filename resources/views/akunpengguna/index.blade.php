@extends('layouts.master')
@section('custom_css')
@endsection

@section('title')
	PENGELOLAAN AKUN PEGAWAI
@endsection

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <!--  -->
        </div>
        <div class="col-lg-6">
            
        </div>

        <div class="panel-body">
                <div class="col-sm-4 col-xs-8 form-group">
                    <!-- <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a> -->
                    <a href="{{ route('pegawai.tampil') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Refresh</a>
                    
                </div>
                {!! Form::open(['method'=>'GET','url'=>'/pegawai/cari'])  !!}
                <div class="col-sm-4 col-xs-8 form-group pull-right input-group">
                    <input type="text" name="katakunci" class="form-control" placeholder="Pencarian...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
                {!! Form::close() !!}

                <div class="table-responsive">
                @if($user->count())
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAMA PEGAWAI</th>
                            <th>ROLE</th>
                            <th>KOTA</th>
                            <th>KONTROL</th>
                        </tr>
                        </thead>
                        @foreach($user as $data)
                        <tbody>
                        <tr>
                            <td class="center" width="50px">{{ $data->ID_USER }}</td>
                            <td>{{ $data->USERNAME }}</td>
                            <td>{{ $data->role['NAMA_ROLE'] }}</td>
                            <td>{{ $data->kota['NAMA_KOTA'] }}</td>
                            <td width="250px">
                                <form method="POST" action="{{ route('pegawai.hapus', $data->ID_USER) }}" accept-charset="UTF-8">
                                  <input name="_method" type="hidden" value="DELETE">
                                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <a href="{{ route('pegawai.ubah', $data->ID_USER) }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Ubah</a>
                                    <a href="{{ route('pegawai.resetpassword', $data->ID_USER) }}" class="btn btn-primary btn-xs"  onclick="return confirm('Apakah Anda Ingin Menghapus Reset Password?');" ><i class="fa fa-key"></i> Reset Password</a>
                                    <input type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Akun Pengguna?');" value="Hapus">
                                </form>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                {!! $user->links() !!}
                @else
                <div class="alert">
                    <i class="fa fa-exclamation-triangle"></i> Data Tidak Tersedia...
                </div>
                @endif
            </div>
        <div class="panel-footer">
        <table>
            <form action="{{route('pegawai.simpan')}}" method="post" role="form">
            {{csrf_field()}}
                <td><input type="text"class="form-control" name="username" placeholder="Masukkan Username Baru" 
                    value="<?php if($dataUser!=null) echo $dataUser->USERNAME; else ""; ?>" required>
                    <input type="hidden" name="idUser" value="<?php if($dataUser!=null) echo $dataUser->ID_USER; else ""; ?>"></td>
                <td>
                    <select class="form-control" name="role">
                        @foreach ($role as $data)
                            <option value="{{ $data->ID_ROLE }}" <?php if($dataUser!=null&&$dataUser->ID_ROLE == $data->ID_ROLE) echo "Selected";?>>{{ $data->NAMA_ROLE }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="form-control" name="kota">
                        @foreach ($kota as $data)
                            <option value="{{ $data->ID_KOTA }}" <?php if($dataUser!=null&&$dataUser->ID_KOTA == $data->ID_KOTA) echo "Selected";?>>{{ $data->NAMA_KOTA }}</option>
                        @endforeach
                    </select>
                </td>
                <td>&emsp;<button type="submit" class="btn btn-primary">Simpan</button></td>
                <td>&emsp;<a href="{{ route('pegawai.tampil') }}" class="btn btn-danger">Batal</a></td>
            </form>
        </table>            
        </div>
    </div>
</div>
@endsection

@section('custom_script')
@endsection