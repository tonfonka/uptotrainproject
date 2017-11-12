@extends('admin.layouts.admin') @section('content')
   <!-- add -->
    <div id="page-wrapper">
        <div class="row">
        
          <div class="col-lg-12">
            <h1 class="page-header">User</h1>
          </div>
          <!-- ./col lg 12 -->
          <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Detail User
                </div>
                <!-- ./div class panel-heading -->
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <form role="form-group">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" placeholder="email" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                              <label>Firstname</label>
                              <input class="form-control" placeholder="firstname" value="{{$user->firstname}}">                    
                            </div>
                            <div class="form-group">
                              <label>Lastname</label>
                              <input class="form-control" placeholder="lastname" value="{{$user->lastname}}">                    
                            </div>
                            <div class="form-group">
                              <label>Tel</label>
                              <input class="form-control" placeholder="phone" value="{{$user->phone}}">
                            </div>
                            <div class="form-group">
                              <label>Sex</label>
                              <input class="form-control" placeholder="sex" value="{{$user->sex}}">
                            </div>
                            <div class="form-group">
                              <label>Age</label>
                              <input class="form-control" placeholder="age" value="{{$user->age}}">
                            </div>
                          </div>
                          <!-- ./div class col-lg-6 -->
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Food Allergy</label>
                              <input class="form-control" placeholder="Food Allergy"value="{{$user->	food_allergy}}" >
                            </div>
                             <div class="form-group">
                              <label>chronic_disease</label>
                              <input class="form-control" placeholder="chronic_diseasee" value="{{$user->chronic_disease}}">
                            </div>
                            <div class="form-group">
                              <label for="exampleTextarea">Address</label>
                              <textarea class="form-control" id="Address" rows="5">{{$user->address}}</textarea>
                            </div>
                            <div class="form-group">
                              <label>Province</label>
                              <input class="form-control" placeholder="Province"value="{{$user->province}}">
                            </div>
                            <div class="form-group">
                              <label>Zipcode</label>
                              <input class="form-control" placeholder="Zipcode" value="{{$user->	zipcode}}">
                            </div>
                           

                            
                          </div>
                          <!-- ./div col-lg-6 -->
                        </div>
                        <!-- ./div class row -->
                      </form>
                      <!-- ./form -->
                    </div>
                    <!-- ./div class col-lg-12 -->
                  </div>
                  <!-- ./div class row -->
                  <br>
                  <center>
               <a href="/usermanage" >  <button type="button" class="btn btn-success">Back</button></a>
                  &nbsp;&nbsp;
                  <button type="button" class="btn btn-danger">Block</button>
                  <center>
                </div>
                <!-- ./div class panel-body -->
            <div>
            <!-- ./div class panel-default -->
          </div><!-- ./div class col-lg-12 body -->
           
          
            
                

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <!-- add end -->

@endsection