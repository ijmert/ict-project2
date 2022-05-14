@extends('layouts.main')

@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<label class="labelTest">Sensor toevoegen</label>
<div class="containerTable">
<form action="/addSensor" method="post" class="SensorForm" action="/action_page.php">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

    <table>
        <tr>
            <td>Topic</td>
            <td><input type="text" name="topic"></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('topic'))
                    {{ $errors->first('topic') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Maximum</td>
            <td><input type="text" name="max"></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('max'))
                    {{ $errors->first('max') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Minimum</td>
            <td><input type="text" name="min"></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('min'))
                    {{ $errors->first('min') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Eenheid</td>
            <td><input type="text" name="unit"></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('unit'))
                    {{ $errors->first('unit') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Type meter</td>
            <td> <select name="type">
                <option>chart</option>
                <option>digitaal</option>
                <option>CO2</option>
                <option>thermometer</option>
                </select> 
            </td>
        </tr>
    </table>
    <button name="AnnuleerButton" type="submit" value="">Annuleren</button>
    <button name="AddButton" type="submit">Voeg toe</button>
</form>
</div>
@endsection

