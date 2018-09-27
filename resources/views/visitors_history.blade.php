@extends('layouts.app')
@section('content')
		<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-left">
						<li>
								<a>
									<p>Visitors History</p>
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
					
			
					<div class="content table-responsive table-full-width">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
									
									<thead>
										<th>Id</th>
										<th>Name</th>
                                        <th>Company</th>
                                        <th>Contact Person</th>
										<th>Date - Time In</th>
										<th>Date - Time Out</th>
										<th>Reason</th>
									</thead>
									<tbody>
											@if($logs->count())
											@foreach($logs as $key => $log)
											<tr>
												<td>{{ $log->id }}</td>
												<td>{{ $log->name }}</td>
                                                <td>{{ $log->company }}</td>
                                                <td>{{ $log->contact_person }}</td>
												<td>{{ $log->created_at }}</td>
												<td>{{ $log->time_out }}</td>
												<td>{{ $log->reason }}</td>
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
