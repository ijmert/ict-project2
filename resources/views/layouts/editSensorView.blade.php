@extends('layouts.main')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<label class="labelTest">Sensor aanpassen</label>
<div class="containerTable">
<form action="editSensor" method="post" class="SensorFrom">
    @csrf
    
    <table>
        <tr>
            <td>Topic</td>
            <td><input type="text" name="sensorTopic" value=" {{$sensorData['topic'] }} " ></td>
        </tr>
        <tr>
            <td>Maximum</td>
            <td><input type="text" name="sensorMax" value="{{$sensorData['max'] }}"></td>
        </tr>
        <tr>
            <td>Minimum</td>
            <td><input type="text" name="sensorMin" value="{{$sensorData['min'] }}"></td>
        </tr>
        <tr>
            <td>Eenheid</td>
            <td><input type="text" name="sensorUnit" value="{{$sensorData['unit'] }}"></td>
        </tr>
        <tr>
            <td>Type meter</td>
            <td> <select name="sensorType">
                <option <?php if ($sensorData['type'] == 'Temperatuur'){ ?> selected <?php } ?> >Temperatuur</option>
                <option <?php if ($sensorData['type'] == 'Vochtigheid'){ ?> selected <?php } ?> >Vochtigheid</option>
                <option <?php if ($sensorData['type'] == 'CO2'){ ?> selected <?php } ?> >CO2</option>
            </select> </td>
        </tr>
    </table>
    <button name="AnnuleerBtn" type="submit" value="">Annuleren</button>
    <button name="EditButon" type="submit"  value="<?php echo $sensorData['id'] ?>">Pas aan</button>
</form>
</div>
@endsection