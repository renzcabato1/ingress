@extends('layouts.app')
@section('content')
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a>
							<p>Account View</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

<a href='{{ url('/new-account') }}'><button type="button" data-target="#addnew" class="btn btn-primary pull-left" style='margin-left:28px'><i class="pe-7s-add-user"></i> New Account</button></a>
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
												<td>Id</td>
												<td>Name</td>
												<td>Email</td>
												<td>Password</td>
												<td>Account Type</td>
												<td>Action</td>
										</thead>
										<tbody>
												@if(Session::has('message'))
												{{Session::get('message')}}
												@endif
												@foreach($accounts as $account)
										<tr>
													<td>{{$account->id}}</td>
													<td>{{$account->name}}</td>
													<td>{{$account->email}}</td>
													<td>********</td> 
													<td>{{$account->user_type}}</td>
													@if($account->id == $id = Auth::user()->id)
													<td></td>
													@else
													@if($account->deactivate == 1)
													<td>
															<a href="activate-account/{{$account->id}}"  class="btn btn-success"> 
																<span class="pe-7s-power"></span>
																Activate</a>
													</td>
													@else
													<td><a  href="reset-account/{{$account->id}}"  class="btn btn-success">
														<i class='pe-7s-refresh'></i> Reset</a>
													 
														<a href="deactivate-account/{{$account->id}}"  class="btn btn-danger">
														<span class="pe-7s-power"></span>
														Deactivate</a>
														</td>
												
													@endif
													@endif
												</tr>
											@endforeach
											@include('error')
										</tbody>
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