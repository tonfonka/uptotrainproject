@extends('admin.layouts.admin_datatable') @section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Travel Agency</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Travel Agency Statement Income
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Travel Agency </th>
                                        <th>รายเงินรวม</th>
                                        <th>ยอดสุธิ</th>
                                        <th>บริษัทได้รับ</th>
                                        <th>เช็คสถานะ</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($agency as $agencys)
                                <?php
                                    $income = DB::table('trips')
                                              ->join('triprounds','triprounds.trip_id','=','trips.id')
                                              ->join('booking','booking.tripround_id','=','triprounds.id')
                                              ->where([['trips.travelagency_id','=',$agencys->id],['booking.status','=','success']])->get();
                                    $total = $income->sum('total_cost');
                                    $net = ($total*90)/100;
                                    $uptotrain = ($total*6.3)/100;
                                              //dd($income);
                                ?>
                                    <tr class="">
                                        <td>{{$agencys->name}}</td>
                                        <td>{{$agencys->agency_name_en}}</td>
                                        <td class="center">{{$total}}</td>
                                        <td class="center">{{$net}}</td>
                                        <td class="center">{{$uptotrain}}</td>
                                        <?php
                                        $id = DB::table('travelagency')->where('id',$agencys->id)->first();

                                        ?>
                                       <td><button class="btn btn-success">โอนแล้ว</button>
                                      
                                  </td>
                               </tr>
                               </form>
                                        
                                    </tr>
                                 @endforeach   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
<!-- /.page-wraper -->
@endsection