
@extends('layouts.app')
@section('content')

		<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-left">
						<li>
								<a>
									<p>Log Activity History</p>
								</a>
							  
							 </li>
				</ul>
				
			
		</div>
	</div>
</nav>

	
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
										<th>No</th>
										<th>Subject</th>
										<th>URL</th>
										<th>Ip</th>
										<th>DATE - TIME</th>
										<th>Name</th>
									</thead>
									<tbody>
											@if($logs->count())
											@foreach($logs as $key => $log)
											<tr>
												<td>{{ ++$key }}</td>
												<td>{{ $log->subject }}</td>
												<td class="text-success">{{ $log->url }}</td>
												<td class="text-warning">{{ $log->ip }}</td>
												<td class="text-danger">{{ $log->created_at }}</td>
												<td>{{ $log->name }}</td>
											</tr>
											@endforeach
											@endif
											</tbody>
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
