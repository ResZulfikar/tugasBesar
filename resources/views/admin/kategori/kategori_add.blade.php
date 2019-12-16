@extends('admin.layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				
				<form role="form" method="post" action="{{ url('admin/kategori/add') }}">
				<!-- token wajib ketika akan mengirim form-->
				{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
						<label for="exampleInputEmail1">Nama Kategori</label>
							<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="nama kategori">
						</div>
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection