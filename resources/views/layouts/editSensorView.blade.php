@extends('layouts.main')

@section('content')

<label>Sensor aanpassen</label>

<form action="editSensor" method="post">
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
                <option>temperatuur</option>
                <option>vochtigheid</option>
            </select> </td>
        </tr>
    </table>
    <button name="AnnuleerBtn" type="submit" class="btn btn-primary" value="">annuleren</button>
    <button name="submitBtn" type="submit" class="btn btn-primary" value="">Pas aan</button>
</form>

@endsection