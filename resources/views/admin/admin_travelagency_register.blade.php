@extends('admin.layouts.admin') @section('content')
   <!-- add -->
    <div id="page-wrapper">
        <div class="row">
        
          <div class="col-lg-12">
            <h1 class="page-header">Register Travel Agency</h1>
          </div>
          <!-- ./col lg 12 -->
          <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Plase fill information this form.
                </div>
                <!-- ./div class panel-heading -->
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <form role="form-group">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Name(Thai)</label>
                              <input class="form-control" placeholder="Name(Thai)">                    
                            </div>
                            <div class="form-group">
                              <label>Name(Eng)</label>
                              <input class="form-control" placeholder="Name(ENG)">                    
                            </div>
                            <div class="form-group">
                              <label for="exampleTextarea">Description</label>
                              <textarea class="form-control" id="agency_description" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                              <label>Email	</label>
                              <input class="form-control" placeholder="agency_email">                    
                            </div>
                            <div class="form-group">
                              <label>License</label>
                              <input class="form-control" placeholder="agency_license">                    
                            </div>
                            <div class="form-group">
                              <label>Tax ID	</label>
                              <input class="form-control" placeholder="agency_tax_id">                    
                            </div>
                            <div class="form-group">
                              <label>IATA</label>
                              <input class="form-control" placeholder="agency_iata_no">                    
                            </div>
                            <div class="form-group">
                              <label>Fax	</label>
                              <input class="form-control" placeholder="agency_fax">                    
                            </div>
                            
                            
                          </div>
                          <!-- ./div class col-lg-6 -->
                          <div class="col-lg-6">
                            
                            <div class="form-group">
                              <label>Tel 1	</label>
                              <input class="form-control" placeholder="agency_email">                    
                            </div>
                            <div class="form-group">
                              <label>Tel 2	</label>
                              <input class="form-control" placeholder="agency_email">                    
                            </div>
                            <div class="form-group">
                              <label>Website	</label>
                              <input class="form-control" placeholder="agency_web">                    
                            </div>
                            <div class="form-group">
                              <label>Facebook</label>
                              <input class="form-control" placeholder="	agency_fb">                    
                            </div>
                            <div class="form-group">
                              <label for="exampleTextarea">Address</label>
                              <textarea class="form-control" id="agency_address" rows="9"></textarea>
                            </div>
                            <div class="form-group">
                              <label>Province</label>
                              <input class="form-control" placeholder="agency_province">                    
                            </div>
                            <div class="form-group">
                              <label>Zipcode</label>
                              <input class="form-control" placeholder="agency_zipcode">                    
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
                  <br><center><button type="button" class="btn btn-success">Submit</button><center>
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