@extends('admin.layouts.master')

@section('content')

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="box">
			<div class="box-header">
				<p>
					
				</p>
			</div>

			<div class="box-body">
				
				<form role="form" method="post" action="{{ url('admin/user') }}">
					{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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