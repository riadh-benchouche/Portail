<!doctype html>
<html lang="en">
<head>
    <title>Calendar 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('black') }}/js/calendar2/style.css">

</head>
<body style="background-color: transparent">
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="elegant-calencar d-md-flex">
                    <div class="wrap-header d-flex align-items-center img" style="background-image: url({{'black'}}/js/calendar/bg.jpg);">
                        <p id="reset">Today</p>
                        <div id="header" class="p-0">
                            <!-- <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div> -->
                            <div class="head-info">
                                <div class="head-month"></div>
                                <div class="head-day"></div>
                            </div>
                            <!-- <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div> -->
                        </div>
                    </div>
                    <div class="calendar-wrap">
                        <div class="w-100 button-wrap">
                            <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
                            <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
                        </div>
                        <table id="calendar">
                            <thead>
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('black') }}/js/calendar2/main.js"></script>
<script src="{{ asset('black') }}/js/calendar2/popper.js"></script>
<script src="{{ asset('black') }}/js/calendar2/jquery.min.js"></script>
<script src="{{ asset('black') }}/js/calendar2/bootstrap.min.js"></script>

</body>
</html>

