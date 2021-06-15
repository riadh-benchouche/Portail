<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('black') }}/css/style.css">

</head>
<body style="background-color: transparent">

            <div class="col-md-10">
                <div class="calendar">
                    <div class="header">
                        <a data-action="prev-month" href="javascript:void(0)" title="Previous Month"><i></i></a>
                        <div class="text" data-render="month-year"></div>
                        <a data-action="next-month" href="javascript:void(0)" title="Next Month"><i></i></a>
                    </div>
                    <div class="months" data-flow="left">
                        <div class="month month-a">
                            <div class="render render-a"></div>
                        </div>
                        <div class="month month-b">
                            <div class="render render-b"></div>
                        </div>
                    </div>
                </div>
            </div>



<script src="{{ asset('black') }}/js/calendar/bootstrap.min.js"></script>
<script src="{{ asset('black') }}/js/calendar/jquery.min.js"></script>
<script src="{{ asset('black') }}/js/calendar/main.js"></script>
<script src="{{ asset('black') }}/js/calendar/popper.js"></script>

</body>
</html>

