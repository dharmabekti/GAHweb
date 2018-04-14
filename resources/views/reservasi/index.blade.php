@extends('layouts.master')
@section('custom_css')
@endsection

@section('title')
	RESERVASI KAMAR
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
                    <!-- <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a> -->
                    <a href="{{ route('reservasi.tampil') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Refresh</a>
                    
                </div>
                {!! Form::open(['method'=>'GET','url'=>'/reservasi/cari'])  !!}
                <div class="col-sm-4 col-xs-8 form-group pull-right input-group">
                    <input type="text" name="katakunci" class="form-control" placeholder="Pencarian...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
                {!! Form::close() !!}

                <div class="table-responsive">
                @if($reservasi->count())
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>ID BOOKING</th>
                            <th>NAMA KAMAR</th>
                            <th>PEMESAN</th>
                            <th>KOTA</th>
                            <th>TGL RESERVASI</th>
                            <th>BATAL</th>
                            <th>KONTROL</th>
                        </tr>
                        </thead>
                        @foreach($reservasi as $data)
                        <tbody>
                        <tr>
                            <td class="center">{{ $data->reservasi['ID_BOOKING'] }}</td>
                            <td>{{ $data->reservasi->kamar->detilkamar['NAMA_KAMAR'] }} ({{ $data->reservasi['ID_KAMAR'] }})</td>
                            <td>{{ $data->reservasi->datadiri['NAMA'] }} ({{ $data->reservasi->datadiri['NO_IDENTITAS'] }})</td>
                            <td class="center">{{ $data->reservasi->kota['NAMA_KOTA'] }}</td>
                            <td>{{ $data->reservasi['TGL_RESERVASI'] }}</td>
                            <td>{{ $data->STATUS_BATAL }}</td>
                            <td>
                                <form method="POST" action="{{ route('reservasi.batal', $data->ID_DETIL_RESERVASI) }}" accept-charset="UTF-8">
                                  <input name="_method" type="hidden" value="DELETE">
                                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <a href="{{ route('reservasi.detil', $data->ID_DETIL_RESERVASI) }}" class="btn btn-default btn-xs"><i class="fa fa-info-circle"></i> Detil</a>
                                    <input type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Membatalkan Reservasi?');" value="Batal">
                                </form>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                {!! $reservasi->links() !!}
                @else
                <div class="alert">
                    <i class="fa fa-exclamation-triangle"></i> Data Tidak Tersedia...
                </div>
                @endif
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
@endsection

@section('custom_script')
@endsection