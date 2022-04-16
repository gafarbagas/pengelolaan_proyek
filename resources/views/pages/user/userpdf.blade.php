@extends('layouts.report')

@section('title','Laporan Data Pengguna')

@section('content')

<table border="1px" style="border-collapse: collapse" cellpadding=4px>
	<thead>
		<tr>
			<th width=25px>No.</th>
			<th width=90px>Nama</th>
			<th width=230px>Username</th>
			<th width=200px>Hak Akses</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{ $loop->iteration }}.</td>
			<td>{{ $user -> name }}</td>
			<td>{{ $user -> username }}</td>
			<td>{{ $user->role->role_name }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection