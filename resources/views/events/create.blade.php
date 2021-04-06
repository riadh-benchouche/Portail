@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
<form action="{{ route('events.store') }}" method="post">
    {{ csrf_field() }}
    Task name:

    <input type="text" name="title" />

    Task description:
    <input type="date" name="task_date" class="start" />

    Start time:
    <input  type="date" name="task_date" class="end" />

    <input type="submit" value="Save" />
</form>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
@endsection
