<head>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'THSarabun';
            color: #555;
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabun.ttf') }}") format('truetype');
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.total td {
            border-bottom: 1px solid #eee;
        }

        /*.invoice-box table tr.item.last td {
            border-bottom: none;
        }*/

        .invoice-box table tr.total td:nth-child(4) {
            border-bottom: 3px solid #eee;
            font-weight: bold;
            text-align: center;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }
            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
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
<?php
$num_a = $book->number_adults ;
$price_a = $triprounds[0]->price_adult;
$total_a = $num_a * $price_a;

$num_c = $book->number_children ;
$price_c = $triprounds[0]->price_child;
$total_c = $num_c * $price_c;
                ?>
                <table cellpadding="0" cellspacing="0" width="100%" frame="border" rules="rows" border="1">
                <tr class="top">
                    <td colspan="4" >
                        <table cellpadding="0" cellspacing="0" width="100%" frame="border" rules="rows" border="0">
                            <tr>
                                <td class="title">
                                </td>
                                <td></td>
                                <td></td>
                                <td align="right">
                                   รายการการสั่งซื้อที่ :
                                    {{($book->id)}} <br> สั่งซื้อวันที่ : {{date('d/m/Y', strtotime($book->booking_time))}} เวลา
                                    : {{date('H:i', strtotime($book->booking_time))}} น.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="4">
                        <table width="100%" frame="border" rules="rows" border="0">
                        <tr>
                            <td>{{$user[0]->firstname}} {{$user[0]->lastname}}</td>
                        </tr>
                        <tr>
                            <td>{{$user[0]->email}}</td>
                        </tr>
                        <tr>
                            <td>{{$user[0]->address}}
                            {{$user[0]->province}}
                            {{$user[0]->zipcode}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
                <table  width="100%" frame="border" rules="rows" border="1">
                <tr >
                    <td align="center" >รายละเอียด</td>
                    
                    <td align="center">รอบวันที่</td>
                </tr>
                <tr>
                    <td >
                        {{$trip[0]->trips_name}} ( {{$trip[0]->trip_nday}} วัน {{$trip[0]->trip_nnight}} คืน )
                    </td>
                    
                    <td align="center">
                        {{date('d/m/Y', strtotime($triprounds[0]->start_date))}} ถึง {{date('d/m/Y', strtotime($triprounds[0]->departure_date))}}
                    </td>
                </tr>
            </table>
               
                <table width="100%" frame="border" rules="rows" border="1">
                
                <tr class="heading" >
                    <td style="width:350px;">รายการ</td>
                    <td>จำนวนผู้เดินทาง (คน)</td>
                    <td align="center">ราคา (บาท)</td>
                    <td align="center">ราคาทั้งหมด (บาท)</td>
                </tr>
                <tr class="item" >
                    <td>ผู้ใหญ่</td>
                    <td align="center">{{$book->number_adults}}</td>
                    <td align="center">{{$triprounds[0]->price_adult}}</td>
                    <td align="center">{{$total_a }}</td>
                </tr>
                <tr class="item">
                    <td>เด็ก</td>
                    <td align="center">{{$book->number_children}}</td>
                    <td align="center">{{$triprounds[0]->price_child}}</td>
                    <td align="center">{{$total_c }}</td>
                </tr>
                <tr class="total">
                    <td>คำนวณราคาทั้งหมด</td>
                    <td>{{$book->number_booking}} คน</td>
                    <td></td>
                    <td align="center">{{$book->total_cost}}</td>
                </tr>
            </table>
            </div><br><br>
</body>