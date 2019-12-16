@extends('admin.layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				
				<table class="table table-stripped myTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Artikel</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Isi</th>
							<th>Tanggal</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $e=>$dt)
						<tr>
							<td>{{ $e+1 }}</td>
							<td>{{ $dt->judul }}</td>
							<td>{{ $dt->nama }}</td>
							<td>{{ $dt->email }}</td>
							<td>{{ $dt->isi }}</td>
							<td>{{ $dt->created_at }}</td>
							<td>
								<a class="btn btn-sm btn-danger" href="{{ url('hapus/komentar/'.$dt->komentar_id) }}">Hapus Komentar</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

@endsection