@extends('admin.layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				
				<form role="form" enctype="multipart/form-data" method="post" action="{{ url('admin/artikel/'.$dt->artikel_id) }}">
					{{ csrf_field() }}
					{{ method_field('put') }}
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Judul</label>
							<input type="name" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Judul" value="{{ $dt->judul }}">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Isi</label>
							<textarea name="isi" class="form-control summernote" rows="10">{{ $dt->isi }}</textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputFile">File input (optional)</label>
							<input type="file" name="image" id="exampleInputFile">
						</div>

						<div class="form-group">
						<label for="exampleInputEmail1">Kategori</label>
							<select class="form-control select2" name="id_kategori">
								<option>Pilih Kategori</option>
								@foreach($kategori as $kt)
								<option value="{{ $kt->id }}" {{ ($dt->id_kategori == $kt->id) ? 'selected' : '' }}>{{ $kt->nama }}</option>
								@endforeach
							</select>
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