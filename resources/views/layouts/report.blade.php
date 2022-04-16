<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>@yield('title')</title>
	<link rel="shortcut icon" type="image/png" href="{{url('backend/img/logo1.png')}}"/>
	<style>
		body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
		}
		th, td{
			vertical-align: top
		}
	</style>
</head>
<body>
	
<table>
	<thead>
		<tr>
			<th><img src="backend/img/logo4.png"> </th>
		</tr>
		<tr>
			<td>
				<font size=14><b> SISTEM INFORMASI PENGELOLAAN DATA PROYEK</b></font><br>
				<font size=2> Jl. Hos. Notosuwiryo No. 4</font><br>
				<font size=2> +62 22630004 / +62 22630008</font><br>
				<font size=2> halo@ultranesia.com</font><br>
			</td>
		</tr>
	</thead>
</table>

<center>
	<h2>@yield('title')</h2>
</center>

<table>
	<tr>
		@php
			$tanggal = date ("d F Y");
		@endphp
		<td>Purwokerto, {{ Carbon\carbon::parse($tanggal)->translatedFormat("d F Y") }}</td>
    </tr>
</table>
<br>

@yield('content')


</body>
</html>