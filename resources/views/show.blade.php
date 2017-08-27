@extends('layouts.headindex') 
@section('title', 'booking') 
@section('content')

    <div class="container">
        <div class="form">
            <div class="row">
                @foreach($trips as $d)
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            {{$d->trips_name}}
                        </div>
                        <div class="panel-body">
                            {{$d->trip_description}}
                        </div>
                        <!-- Table -->
                        <table class="table">

                            <tr>
                                <td>
                                    {{$d->id}}
                                    <td>
                            </tr>
                            <tr>
                                <td>
                                    {{$d->id}}
                                    <td>
                            </tr>
                            <tr>
                                <td>
                                    {{$d->id}}
                                    <td>
                            </tr>
                            <tr>
                                <td>
                                    {{$d->id}}
                                    <td>
                            </tr>

                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <hr>
>>>>>>> 66c01366c1f5d27fb092a38ee3e104763a17d7d1
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>

