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
            <td><input type="text" name="sensorTopic" value=" {{$sensorData['Topic'] }} " ></td>
        </tr>
        <tr>
            <td>Naam</td>
            <td><input type="text" name="sensorNaam" value="{{$sensorData['Naam'] }}"></td>
        </tr>
        <tr>
            <td>Maximum</td>
            <td><input type="text" name="sensorMaximum" value="{{$sensorData['Maximum'] }}"></td>
        </tr>
        <tr>
            <td>Minimum</td>
            <td><input type="text" name="sensorMinumum" value="{{$sensorData['Minimum'] }}"></td>
        </tr>
        <tr>
            <td>Eenheid</td>
            <td><input type="text" name="sensorTopic" value="{{$sensorData['Eenheid'] }}"></td>
        </tr>
        <tr>
            <td>Type meter</td>
            <td> <select name="sensorTypeMeter">
                <option>Temperatuur</option>
                <option>Vochtigheid</option>
            </select> </td>
        </tr>
    </table>
    <button name="AnnuleerBtn" type="submit" value="">Annuleren</button>
    <button name="EditButon" type="submit"  value="{{$sensorData['Id'] }}">Pas aan</button>
</form>
</div>
@endsection