@extends('layouts.report')

@section('title','Laporan Data Pengembang')

@section('content')

<table border="1px" style="border-collapse: collapse" cellpadding=4px>
	<thead>
		<tr>
			<th width=25px>No.</th>
			<th>Kode</th>
			<th>Kategori</th>
			<th>Nama</th>
            <th>Email</th>
            <th>No. Telepon</th>
		</tr>
	</thead>
	<tbody>
		@foreach($developers as $developer)
		<tr>
			<td>{{ $loop->iteration }}.</td>
			<td>{{ $developer -> developer_code }}</td>
			<td>{{ $developer->category->category_name }}</td>
			<td>{{ $developer -> developer_name }}</td>
			<td>{{ $developer -> email }}</td>
			<td>{{ $developer -> telp }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection