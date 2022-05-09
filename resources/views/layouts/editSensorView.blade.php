@extends('layouts.main')

@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<label class="labelTest">Sensor aanpassen</label>
<div class="containerTable">
<form action="editSensor" method="post" class="SensorFrom">
     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

    <table>
        <tr>
            <td>Topic</td>
            <td><input type="text" name="sensorTopic" value=" {{$sensorData[0]['id'] }} " ></td>
        </tr>
        <tr>
            <td>Maximum</td>
            <td><input type="text" name="sensorMaximum" value="{{$sensorData[0]['max'] }}"></td>
        </tr>
        <tr>
            <td>Minimum</td>
            <td><input type="text" name="sensorMinumum" value="{{$sensorData[0]['min'] }}"></td>
        </tr>
        <tr>
            <td>Eenheid</td>
            <td><input type="text" name="sensorTopic" value="{{$sensorData[0]['id'] }}"></td>
        </tr>
        <tr>
            <td>Type meter</td>
            <td> <select name="sensorTypeMeter">
                <option>temperatuur</option>
                <option>vochtigheid</option>
            </select> </td>
        </tr>
    </table>
    <button name="AnnuleerBtn" type="submit" value="">annuleren</button>
    <button name="EditButon" type="submit"  value="10">Pas aan</button>
</form>
</div>
@endsection