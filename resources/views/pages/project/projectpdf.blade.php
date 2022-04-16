@extends('layouts.report')

@section('title','Laporan Data Proyek')

@section('content')

<table border="1px" style="border-collapse: collapse" cellpadding="4px">
	<thead>
		<tr>
			<th width=25px>No.</th>
			<th>Kode Proyek</th>
			<th>Nama Proyek</th>
			<th>Klien</th>
			<th>Pengembang</th>
			<th>Nilai Kontrak</th>
			<th>Tanggal Mulai</th>
			<th>Tanggal Selesai</th>
			<th>Penanggung Jawab</th>
		</tr>
	</thead>
	<tbody>
		@foreach($projects as $project)
		<tr>
			<td>{{ $loop->iteration }}.</td>
			<td>{{ $project -> project_code }}</td>
			<td>{{ $project -> project_name }}</td>
			<td>{{ $project -> client_name }}</td>
			<td>{{ $project->developer->developer_name}}</td>
			<td>Rp. {{ number_format($project -> price) }},-</td>
			<td>{{ Carbon\carbon::parse($project -> project_start)->translatedFormat("d F Y") }}</td>
			<td>{{ Carbon\carbon::parse($project -> project_finish)->translatedFormat("d F Y") }}</td>
			<td>{{ $project -> pj }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection