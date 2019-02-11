@extends('layouts.app')
@section('content')

<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav navbar-left">
		<li>
			<a>
				<p>Visitors View</p>
			</a>
			
		</li>
	</ul>
	
	
</div>
</div>
</nav>

<a href='{{ url('/barcode') }}'><button type="button" data-target="#addnew" class="btn btn-primary pull-left" style='margin-left:28px'><i class="pe-7s-plus"></i> New Visitor</button></a>
<hr>		
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					
					@if(session()->has('status'))
					
					
					<div class="form-group">
						<div class="alert alert-success">
							{{session()->get('status')}}
						</div>
					</div>
					
					
					@endif
					<div class="content table-responsive table-full-width">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							
							<thead>
								<td>Gate Pass Id</td>
								<td>Name</td>
								<td>Company</td>
								<td>Time In</td>
								<td>Date In</td>
								<td>Reason</td>
								<td>Action</td>
							</thead>
							<tbody>
								@if(Session::has('message'))
								{{Session::get('message')}}
								@endif
								@foreach($visitors as $visitor)
								<tr>
									<td>{{$visitor->gate_pass_id}}</td>
									<td>{{$visitor->name}}</td>
									<td>{{$visitor->company}}</td>
									
									<td>{{date('H:i', strtotime($visitor->created_at))}}</td>
									<td>{{date('F d, Y', strtotime($visitor->created_at))}}</td>
									<td>{{$visitor->reason}}</td>
									<td><a href="edit-visitor/{{$visitor->id}}"  class="btn btn-success">
										<i class='pe-7s-edit'></i> Edit</a>
										<a href="print-barcode/{{$visitor->id}}" target="_blank" class="btn btn-info btn-sl">
											<span class="pe-7s-print"></span>
											Print</a>
											<a href="out-visitor/{{$visitor->id}}"  class="btn btn-danger">
												<span class="pe-7s-delete-user"></span>
												Out</a>
											</td>
										</tr>
										@endforeach
										@include('error')
										
									</tfoot>
								</table>
								
								
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('/datable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('/datable/js/dataTables.bootstrap4.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable( {
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
			} );
		} );
	</script>    
	
	
	@endsection
	