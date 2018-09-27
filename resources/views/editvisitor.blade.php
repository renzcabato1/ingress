
@extends('layouts.app')
@section('content')
<div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-left">
                <li>
                        <a>
                            <p>Visitors</p>
                        </a>
                      
                     </li>
        </ul>
        
    
</div>
</div>
</nav>

<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Visitor</h4>
                        </div>
                        <div class="content">
                           
                        <form method='POST' action='' target="">
                    
                                {{ csrf_field() }}
                                @if(session()->has('status'))
                                <div class="form-group">
                                        <div class="alert alert-danger">
                                {{session()->get('status')}}
                            </div>
                        </div>

                      

                            @endif
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            Name
                                            <input type='text'  class="form-control"  name='name' id='name' value="{{$visitors->name}}" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                               Company
                                                <input type='text'  class="form-control"  name='company' id='company' value="{{$visitors->company}}" required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                  Contact Person
                                                    <input type='text'  class="form-control" name='contact_person' id='contact_person' value="{{$visitors->contact_person}}" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                            Gate Pass Number
                                                        <input type='number' class="form-control" name='gate_pass_id' id='gate_pass_id' value="{{$visitors->gate_pass_id}}" required>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                        Reason
                                                            <input type='text'  class="form-control" name='reason' id='reason' value="{{$visitors->reason}}" required>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                               
                                <button type="submit" class="btn btn-info btn-fill pull-right">Save </button>
                                <div class="clearfix"></div>
                               
                                @include('error')
                            </form>
                        </div>
                    </div>
                </div>
              

            </div>
        </div>
    </div>

        

    @endsection
