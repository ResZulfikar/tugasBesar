@extends('admin.layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">

				@if(Session::has('sukses'))
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					{{ Session::get('sukses') }}
				</div>
				@endif
				
				@if(Session::has('gagal'))
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-ban"></i> Gagal!</h4>
					{{ Session::get('gagal') }}
				</div>
				@endif
				
				<a href="{{ url('admin/artikel/add') }}" class="btn btn-flat btn-primary" style="margin-bottom: 10px;">Tambah Event</a>

				<table class="table table-stripped myTable">
					<thead>
                    <tr>
							<th>#</th>
							<th>Judul</th>
							<th>Kategori</th>
							<th>Penulis</th>
							<th>Created At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $e=>$dt)
						<tr>
							<td>{{ $e+1 }}</td>
							<td>{{ $dt->judul }}</td>
							<td>{{ $dt->kategori }}</td>
							<td>{{ $dt->name }}</td>
							<td>{{ $dt->created_at }}</td>
							<td>
								<p>
									<a href="{{ url('admin/artikel/'.$dt->artikel_id) }}" style="color: red;"><i class="fa fa-fw fa-pencil"></i></a>

									<a class="btn-hapus" href="{{ url('admin/artikel/'.$dt->artikel_id) }}" style="color: red;"><i class="fa fa-fw fa-trash-o"></i></a>
								</p>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

<!-- modal hapus -->
<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
<div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
		<div class="modal-content bg-gradient-danger">

			<div class="modal-header">
				<h3 class="modal-title" id="modal-title-notification">PERHATIAN</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="py-3 text-center">
					<i class="ni ni-bell-55 ni-3x"></i>
					<h4 class="heading mt-4">Apakah kamu yakin ingin menghapus data ini?</p>
					</div>

				</div>

				<div class="modal-footer">
					<form action="" method="post">
						{{ csrf_field() }}
						{{ method_field('delete') }}
						<button type="submit" class="btn btn-white">Ok, Got it</button>
					</form>
					<button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>

	@endsection

	@section('scripts')
    
    <script type="text/javascript">
    //jquerry
		$(document).ready(function(){

			$('body').on('click','.btn-hapus',function(e){
                //mencegah pindah page
				e.preventDefault();
				var url = $(this).attr('href');
				$('#modal-hapus').find('form').attr('action',url);

				$('#modal-hapus').modal();
			})

		})
	</script>

	@endsection