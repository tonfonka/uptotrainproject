@extends('layouts.agency4') @section('title', 'Agency')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">HELLO {{$travelagencies->agency_name_en}} !!!!</h1>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="container">
    <div class="products-page">
        <!-- Page Content -->
        <div class="container">
            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-12">
                    @foreach($trips as $trip)
                    <h1>{{$trip->trips_name}}</h1> 
                    <button  class="btn btn-primary"><a href='/pdf/{{$tripround->id}}'>พิมพ์รายชื่อผู้ร่วมทริปเป็นไฟล์ PDF </a></button>
                    @endforeach
                    <h3>รอบการเดินทาง {{date('d/m/Y', strtotime($tripround->start_date))}} ถึง {{date('d/m/Y', strtotime($tripround->departure_date))}}</h1>
                        <h3>จำนวนรายชื่อที่มีการจองทั้งหมด {{$username->count()}} คน </h3>
                </div>
            </div>
            <!-- end Marketing Icons Section -->
        </div>
        <!-- end Page Content -->
    </div>
    <!-- end products-page -->
</div>




<style>
    .filterable {
        margin-top: 15px;
    }

    .filterable .panel-heading .pull-right {
        margin-top: -20px;
    }

    .filterable .filters input[disabled] {
        background-color: transparent;
        border: none;
        cursor: auto;
        box-shadow: none;
        padding: 0;
        height: auto;
    }

    .filterable .filters input[disabled]::-webkit-input-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]::-moz-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]:-ms-input-placeholder {
        color: #333;
    }
</style>

<div class="container" style="padding-top:30px;">
    <div class="container" style="font-family:Prompt;">
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">รายชื่อผู้ร่วมทริป</h3>
                    
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter">
                            <span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>]

                </div>
                
                
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th class="text-center">
                                <input type="text" class="form-control" placeholder="ลำดับ" disabled>
                            </th>
                            <th class="text-center">
                                <input type="text" class="form-control" placeholder="ชื่อ" disabled>
                            </th>
                            <th class="text-center">
                                <input type="text" class="form-control" placeholder="จำนวนเด็ก" disabled>
                            </th>
                            <th class="text-center">
                                <input type="text" class="form-control" placeholder="จำนวนผู้ใหญ่" disabled>
                            </th>
                            <th class="text-center">
                                <input type="text" class="form-control" placeholder="จำนวนรวม" disabled>
                            </th>
                            <th class="text-center">
                                <input type="text" class="form-control" placeholder="ราคา" disabled>
                            </th>
                            <th class="text-center">
                                <input type="text" class="form-control" placeholder="สถานะการจ่าย" disabled>
                            </th>
                            <th class="text-center">
                                <input type="text" class="form-control" placeholder="เวลาของการจอง" disabled>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @if($count >0) 
                        @foreach($booking as $boo) 
                          
                        <?php
                               $user = DB::table('users')
                               ->join('booking','booking.user_id','=','users.id')
                               ->where([['users.id',$boo->user_id],['booking.status','=','success']])->get();
                            ?>
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href='/userinfo/{{$boo->user_id}}'>{{$user[0]->name}}</a>
                            </td>
                            <td>{{$boo->number_children}}</td>
                            <td>{{$boo->number_adults}}</td>
                            <td>{{$boo->number_booking}}</td>
                            <td>{{$boo->total_cost}}</td>
                            <td>{{$boo->status}}</td>
                            <td>{{$boo->booking_time}}</td>
                        </tr>
                         @endforeach @endif
                    </tbody>
                </table>
                <div class="col-md-12 text-center">
                    <ul class="pagination pagination-lg pager" id="myPager"></ul>
                </div>
            </div>
        </div>
    </div>
<!--<tr>
                                <td>ยอดรวมรายชื่อการจอง </td>
                                <td>จำนวนเด็กทั้งหมด </td>
                                <td>จำนวนผู้ใหญ่ทั้งหมด</td>
                                <td>ยอดรวมคนทั้งหมด </td>
                                <td>ยอดรวมราคาทั้งหมด </td>
                                <td>พิมพ์รายชื่อคนจองทริป </td>

                            </tr>
                            <tr>
                                <td> {{$count}} </td>
                                <td> {{$totalChild}} </td>
                                <td>{{$totalAdult}} </td>
                                <td>  {{$totalNum}} </td>
                                <td>{{$totalMoney}} </td>
                                <td> <a href="/pdf">พิมพ์รายชื่อผู้ร่วมทริป PDF</a> </td>

                            </tr>-->
    <!-- end container -->
</div>
<script type="text/javascript">
    /*
            	Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
            	*/
    $(document).ready(function () {
        $('.filterable .btn-filter').click(function () {
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function (e) {
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function () {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' +
                    $table.find('.filters th').length +
                    '">No result found</td></tr>'));
            }
        });
    });
</script>

<!--paginate-->
<script>
    $.fn.pageMe = function (opts) {
        var $this = this,
            defaults = {
                perPage: 10,
                showPrevNext: false,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);

        var listElement = $this;
        var perPage = settings.perPage;
        var children = listElement.children();
        var pager = $('.pager');

        if (typeof settings.childSelector != "undefined") {
            children = listElement.find(settings.childSelector);
        }

        if (typeof settings.pagerSelector != "undefined") {
            pager = $(settings.pagerSelector);
        }

        var numItems = children.size();
        var numPages = Math.ceil(numItems / perPage);

        pager.data("curr", 0);

        if (settings.showPrevNext) {
            $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
        }

        var curr = 0;
        while (numPages > curr && (settings.hidePageNumbers == false)) {
            $('<li><a href="#" class="page_link">' + (curr + 1) + '</a></li>').appendTo(pager);
            curr++;
        }

        if (settings.showPrevNext) {
            $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
        }

        pager.find('.page_link:first').addClass('active');
        pager.find('.prev_link').hide();
        if (numPages <= 1) {
            pager.find('.next_link').hide();
        }
        pager.children().eq(1).addClass("active");

        children.hide();
        children.slice(0, perPage).show();

        pager.find('li .page_link').click(function () {
            var clickedPage = $(this).html().valueOf() - 1;
            goTo(clickedPage, perPage);
            return false;
        });
        pager.find('li .prev_link').click(function () {
            previous();
            return false;
        });
        pager.find('li .next_link').click(function () {
            next();
            return false;
        });

        function previous() {
            var goToPage = parseInt(pager.data("curr")) - 1;
            goTo(goToPage);
        }

        function next() {
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }

        function goTo(page) {
            var startAt = page * perPage,
                endOn = startAt + perPage;

            children.css('display', 'none').slice(startAt, endOn).show();

            if (page >= 1) {
                pager.find('.prev_link').show();
            } else {
                pager.find('.prev_link').hide();
            }

            if (page < (numPages - 1)) {
                pager.find('.next_link').show();
            } else {
                pager.find('.next_link').hide();
            }

            pager.data("curr", page);
            pager.children().removeClass("active");
            pager.children().eq(page + 1).addClass("active");

        }
    };

    $(document).ready(function () {

        $('#myTable').pageMe({
            pagerSelector: '#myPager',
            showPrevNext: true,
            hidePageNumbers: false,
            perPage: 5
        });

    });
</script>


@endsection