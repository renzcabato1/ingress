@include('layouts.app')
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
                        <h4 class="title">Register Account</h4>
                    </div>
                    <div class="content">
                        
                        <form  method="POST" action="">
                            
                            {{ csrf_field() }}
                            @if(session()->has('status'))
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    {{session()->get('status')}}
                                    
                                </div>
                            </div>
                            
                            @endif
                            @include('error')
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        Name
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required >
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        E-Mail Address
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        Password
                                        <input id="password" type="password" class="form-control" name="password" required>
                                        <p style="font-size:10px;color:red">Passwords must be at least 8 characters long.
                                            <br>Passwords must contain:
                                            <br> minimum of 1 lower case letter [a-z] 
                                            <br> minimum of 1 upper case letter [A-Z] 
                                            <br> minimum of 1 numeric character [0-9] </p>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    Confirm Password
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    User Type
                                                    <select id="user_type" class="form-control" name="user_type" >
                                                        <option ></option>
                                                        <option value='USER'>USER</option>
                                                        <option value='ADMIN'>ADMIN</option>
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Register </button>
                                        <div class="clearfix"></div>
                                        
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            