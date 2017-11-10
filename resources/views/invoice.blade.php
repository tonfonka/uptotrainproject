<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
        @font-face {
            font-family: 'THSarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabun.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabun";
            font-size: 20px;
        }
        td{
            font-family: "THSarabun";

        }
    </style>
</head>
<body>
<p>รายชื่อผู้ร่วมทริป {{$tripName[0]->trips_name}} ทั้งหมด {{$count}}</p>  
<p>รอบ {{date('d/m/Y', strtotime($tripround->start_date))}} ถึง {{date('d/m/Y', strtotime($tripround->departure_date))}}</p>
                        
                        <table width="100%" frame="border" rules="rows" border="1" >
                       
                            
                            <tr>
                            <td>ลำดับ</td>
                                <td>ชื่อ</td>
                                <td>เด็ก</td>
                                <td>ผู้ใหญ่</td>
                                <td>อาหารที่แพ้</td>
                                <td>โรคประจำตัว</td>
                                <td>เบอร์โทรศัพท์</td>
                                <td>สถานะ</td>
                            </tr> 
                            @foreach($booking as $boo) 
                          
                        <?php
                               $user = DB::table('users')
                               ->join('booking','booking.user_id','=','users.id')
                               ->where([['users.id',$boo->user_id],['booking.status','=','success']])->get();
                              //$count = $user->count();
                            ?>
                            @if(($boo->status) == 'success')
                            <tr>
                            <td align="left">{{$loop->iteration}}</td>
                            <td align="left">
                                {{$user[0]->name}}
                            </td>
                            <td align="right">{{$boo->number_children}}</td>
                            <td align="right">{{$boo->number_adults}}</td>
                            <td align="left">{{$user[0]->food_allergy}}</td>
                            <td align="left">{{$user[0]->chronic_disease}}</td>
                            <td align="right">{{$user[0]->phone}}</td>
                            <td align="left"></td>
                        </tr>
                        @endif
                            @endforeach
                        </table>
        



</body>
</html>