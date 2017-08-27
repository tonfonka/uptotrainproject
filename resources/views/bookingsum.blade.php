@extends('layouts.headuser') @section('title', 'Summary Booking') @section('content')
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
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
        text-align: right;
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

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
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
<div class="welcome about">
    <div class="container" align="center">
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="/img/thailandworld.jpg" style="width:100%; max-width:300px;">
                                </td>

                                <td>
                                    ใบรายการที่ #: 123<br> วันที่ : 20/05/2017<br> เวลา : 20.00
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    เที่ยวละไมไทยแลนด์เวิร์ด จำกัด<br> 555 ถ.พระรามที่สอง ซอย 55<br> แขวง แสมดำ เขต บางขุนเทียน<br>                                    กรุงเทพ 10150
                                </td>

                                <td>
                                    สมชาย<br> รักชาติไทย
                                    <br> somchai@example.com
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="heading">
                    <td>
                        รายละเอียด
                    </td>

                    <td>
                        รอบวันที่
                    </td>
                </tr>

                <tr class="details">
                    <td>
                        เที่ยวกาญจนบุรี (4 วัน 3 คืน)
                    </td>

                    <td>
                        15/04/18
                    </td>
                </tr>

                <tr class="heading">
                    <td>
                        รายการ
                    </td>

                    <td>
                        ราคา
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        ผู้ใหญ่ (จำนวน 1 คน)
                    </td>

                    <td>
                        300 บาท
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        เด็ก (จำนวน 1 คน)
                    </td>

                    <td>
                        100 บาท
                    </td>
                </tr>
                <tr class="total">
                    <td></td>

                    <td>
                        ราคารวม: 400 บาท
                    </td>
                </tr>

            </table>

        </div><br><br>
        <div style='text-align:center'>
            <form name="checkoutForm" method="POST" action="/card">
                <input type="hidden" name="description" value="Product order ฿3200.00" /> {{ csrf_field() }}

                <script type="text/javascript" src="https://cdn.omise.co/card.js" data-key="pkey_test_58x5lew98sd34rjio0a" data-image="http://www.mx7.com/view2/A2ElRcLZ5FAr6dEv"
                    data-frame-label="UP to Train" data-button-label="ซื้อเลยจ้า" data-submit-label="Submit" data-location="yes"
                    data-amount="320000" data-currency="thb">
                </script>
                <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
            </form>
        </div>
    </div>
</div>
@endsection('content')