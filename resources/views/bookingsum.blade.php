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
            font-family: 'Prompt';
            color: #555;
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
        
    </style>
</head>

<body>
    <div class="welcome about">
        <div class="container" align="center">
            <div class="invoice-box">
                <table cellpadding="0" cellspacing="0">
                    <tr class="top">
                        <td colspan="4">
                            <table>
                                <tr>
                                    <td class="title">
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td align="right">
                                        <img src="/img/logo.png" style="width:75%; max-width:150px;"><br>รายการการสั่งซื้อที่ :
                                        {{($book->id)}} <br> สั่งซื้อวันที่ : {{date('d/m/Y', strtotime($book->booking_time))}} เวลา
                                        : {{date('H:i', strtotime($book->booking_time))}} น.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="information">
                        <td colspan="4">
                            <table>
                                <tr>
                                    <td>{{$user[0]->name}}</td>
                                </tr>
                                <tr>
                                    <td>{{$user[0]->email}}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr class="heading">
                        <td colspan="3">รายละเอียด</td>
                        <td align="center">รอบวันที่</td>
                    </tr>
                    <tr class="details">
                        <td colspan="3">
                            {{$trip[0]->trips_name}} ( {{$trip[0]->trip_nday}} วัน {{$trip[0]->trip_nnight}} คืน )
                        </td>
                        <td>
                            {{date('d/m/Y', strtotime($tripround[0]->start_date))}} ถึง {{date('d/m/Y', strtotime($tripround[0]->departure_date))}}
                        </td>
                    </tr>
                </table>
                <?php
$num_a = $book->number_adults ;
$price_a = $tripround[0]->price_adult;
$total_a = $num_a * $price_a;
$num_c = $book->number_children ;
$price_c = $tripround[0]->price_child;
$total_c = $num_c * $price_c;
                ?>
                <table>
                    <tr class="heading" >
                        <td style="width:350px;">รายการ</td>
                        <td>จำนวนผู้เดินทาง (คน)</td>
                        <td align="center">ราคา (บาท)</td>
                        <td align="center">ราคาทั้งหมด (บาท)</td>
                    </tr>
                    <tr class="item" >
                        <td>ผู้ใหญ่</td>
                        <td align="center">{{$book->number_adults}}</td>
                        <td align="center">{{$tripround[0]->price_adult}}</td>
                        <td align="center">{{$total_a }}</td>
                    </tr>
                    <tr class="item">
                        <td>เด็ก</td>
                        <td align="center">{{$book->number_children}}</td>
                        <td align="center">{{$tripround[0]->price_child}}</td>
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
            <div style='text-align:center'>
                <form name="checkoutForm" method="POST" action="/charge">
                    <input type="hidden" name="description" value="Product order " />
                    <input type="hidden" name="name" value="{{$user[0]->name}}" />
                    <input type="hidden" name="booking_id" value="{{$book->id}}" />
                    <input type="hidden" name="amount" value="{{$book->total_cost *100}}" /> {{ csrf_field() }}


                    <script type="text/javascript" src="https://cdn.omise.co/card.js"
                    data-key="pkey_test_58x5lew98sd34rjio0a" data-image="http://www.mx7.com/view2/A2ElRcLZ5FAr6dEv"
                    data-frame-label="UP to Train" 
                    data-button-label="จ่ายเงิน" 
                    data-submit-label="Submit" 
                    data-location="yes"
                        data-amount="{{$book->total_cost * 100}}" data-currency="thb">
                    </script>

                    <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
                </form>

            </div>
        </div>
    </div>
</body>