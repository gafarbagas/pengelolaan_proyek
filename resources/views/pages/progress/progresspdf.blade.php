@extends('layouts.report')

@section('title','Laporan Progres Proyek')

@section('content')

@php
	$pengeluaran = DB::table("progresses")->where('project_id',$projects->id)->get()->sum("act_cost");
	$pro = DB::table("progresses")->where('project_id',$projects->id)->get()->sum("progress");
@endphp

<table cellpadding=4px>
	<tr>
		<td width="180px">Status Proyek</td>
		<td>: {{ $projects->status->status_name}}</td>
	</tr>
	<tr>
		<td width=180px>Kode Proyek</td>
		<td>: {{ $projects-> project_code}}</td>
	</tr>
	<tr>
		<td>Nama Proyek</td>
		<td>: {{ $projects-> project_name}}</td>
	</tr>
	<tr>
		<td>Nama Klien</td>
		<td>: {{ $projects -> client_name}}</td>
	</tr>
	<tr>
		<td>Pengembang</td>
		<td>: {{ $projects->developer->developer_name}}</td>
	</tr>
	<tr>
		<td>Penanggung Jawab</td>
		<td>: {{ $projects -> pj}}</td>
	</tr>
	<tr>
		<td>Tanggal Mulai</td>
		<td>: {{ $projects -> project_start}}</td>
	</tr>
	<tr>
		<td>Tanggal Selesai</td>
		<td>: {{ $projects -> project_finish}}</td>
	</tr>
	<tr>
		<td>Nilai Kontrak</td>
		<td>: Rp. {{number_format ($projects -> price)}},-</td>
	</tr>
	<tr>
		<td>Keuntungan</td>
		<td>: Rp. {{number_format ($projects->price-$pengeluaran)}},-</td>
	</tr>
	<tr>
		<td>Total Pengerjaan</td>
		<td>: {{ $pro}}%</td>
	</tr>
	<tr>
		<td>Sisa Pengerjaan</td>
		<td>: {{ $projects->target-$pro}}%</td>
	</tr>
</table>
<br>
<table border="1px" style="border-collapse: collapse" cellpadding=4px>
	<thead>
		<tr>
			<th width=25px>No.</th>
			<th width=200px>Tanggal</th>
			<th width=150px>Progres</th>
			<th width=275px>Biaya Pengeluaran</th>
		</tr>
	</thead>
	<tbody>
		@foreach($projects->progress as $progres)
		<tr>
			<td>{{ $loop->iteration }}.</td>
			<td>{{ $progres->period }}</td>
			<td>{{ $progres->progress }}%</td>
			<td>Rp. {{number_format($progres->act_cost) }},-</td>
		</tr>
		@endforeach
		<tr>
			<th colspan="2" align="right">Total</th>
			<td>{{$pro}}%</td>
			<td>Rp. {{number_format($pengeluaran)}},-</td>
		</tr>
	</tbody>
</table>

@endsection