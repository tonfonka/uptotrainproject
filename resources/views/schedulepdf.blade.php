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
<p></p>  
<center><p >ตารางกิจกรรม {{$trip->trips_name}} </p></center>
                        
                        <table width="100%" frame="border" rules="rows" border="1" >
                       
                            
                            <tr>
                                <td>วันที่</td>
                                <td>เวลา</td>
                                <td>สถานที่</td>
                                <td>รายละเอียด</td>
                            </tr> 
                            @foreach($schedule as $sch)
                            <tr>
                                <td>{{$sch->schedule_day}}</td>
                                <td>{{$sch->schedule_time}}</td>
                                <td>{{$sch->schedule_place}}</td>
                                <td>{{$sch->schedule_description}}</td>
                            </tr> 

                           @endforeach
                        </table>
        



</body>
</html>