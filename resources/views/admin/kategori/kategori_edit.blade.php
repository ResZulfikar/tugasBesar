@extends('admin.layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				
				<form role="form" method="post" action="{{ url('admin/kategori/'.$kategori->id) }}">
				{{ csrf_field() }}
				{{ method_field('put') }}
					<div class="box-body">
						<div class="form-group">
						<label for="exampleInputEmail1">Nama Kategori</label>
							<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="nama kategori" value="{{ $kategori->nama }}">
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection