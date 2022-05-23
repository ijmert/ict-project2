@extends('layouts.main')

@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<label class="labelTest">Add sensor</label>
<div class="containerTable">
<form action="{{ url('addSensor') }}" method="post" class="SensorForm" action="/action_page.php">
{{ csrf_field() }}
    <table>
        <tr>
            <td>Topic</td>
            <td><select class="SelectBox" name="topic" >
                <option class="optionGroup" selected disabled>Choose topic</option>
                <?php foreach ($topics as $topic) { ?>
                  <option > <?php echo $topic['topic']; ?> </option>
                <?php } ?>
            </select></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('topic'))
                    {{ $errors->first('topic') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Max</td>
            <td><input class="InputBox" type="text" name="max"></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('max'))
                    {{ $errors->first('max') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Min</td>
            <td><input class="InputBox" type="text" name="min"></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('min'))
                    {{ $errors->first('min') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Unit</td>
            <td><input class="InputBox" type="text" name="unit"></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('unit'))
                    {{ $errors->first('unit') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Type</td>
            <td> <select class="SelectBox" name="type">
                <option class="optionGroup" selected disabled>Choose chart</option>
                <option>chart</option>
                <option>digital</option>
                <option>circle chart</option>
                <option>thermometer</option>
                <option>gauge</option>
                </select>
            </td>
        </tr>
    </table>
    <button class="Knop" name="AnnuleerButton" type="submit" value="">Cancel</button>
    <button class="Knop" name="AddButton" type="submit">Add</button>
</form>
</div>
@endsection

@section('initials')
<?php echo $initials ?>
@endsection
