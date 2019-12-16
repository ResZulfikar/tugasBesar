@extends('admin.layouts.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">

				<a href="{{ url('admin/kategori/add') }}" class="btn btn-success btn-flat">Tambah Kategori Event</a>
				
				<table class="table table-bordered myTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Created By</th>
              <th>Created At</th>
              <th>Updated At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($kategori as $index=>$kt)
						<tr>
							<td>{{ $index+1 }}</td>
							<td>{{ $kt->nama }}</td>
							<td>{{ $kt->name }}</td>
              <td>{{ $kt->created_at }}</td>
              <td>{{ $kt->updated_at }}</td>
							<td>
								<a href="{{ url('admin/kategori/'.$kt->id) }}" class="btn btn-warning btn-flat">Edit</a>
								<a href="{{ url('admin/kategori/'.$kt->id) }}" class="btn btn-danger btn-flat btn-hapus">Hapus</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
 
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">PERHATIAN</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
 
          <div class="modal-body">
 
            <div class="py-3 text-center">
              <i class="ni ni-bell-55 ni-3x"></i>
              <h4 class="heading mt-4">Apakah kamu yakin ingin menghapus data ini?</h4>
            </div>
 
          </div>
 
          <div class="modal-footer">
            <form action="" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <button type="submit" class="btn btn-black">Ok, Hapus</button>
            </form>
            <button type="button" class="btn btn-link text-black ml-auto" data-dismiss="modal">Close</button>
          </div>
 
        </div>
      </div>
    </div>

@endsection

@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
    $('body').on('click','.btn-hapus',function(e){
      e.preventDefault();
      var url = $(this).attr('href');
      $('#modal-notification').find('form').attr('action',url);
 
      $('#modal-notification').modal();
    })
 
    })
</script>
 
@endsection