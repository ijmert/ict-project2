@extends('layouts.main')

@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<label class="labelTest">Sensor toevoegen</label>
<div class="containerTable">
<form action="addSensor" method="post" class="SensorForm">
    @csrf

    <table>
        <tr>
            <td>Topic</td>
            <td><input type="text" name="sensorTopic"</td>
        </tr>
        <tr>
            <td>Naam</td>
            <td><input type="text" name="sensorNaam"></td>
        </tr>
        <tr>
            <td>Maximum</td>
            <td><input type="text" name="sensorMaximum"></td>
        </tr>
        <tr>
            <td>Minimum</td>
            <td><input type="text" name="sensorMinumum"></td>
        </tr>
        <tr>
            <td>Eenheid</td>
            <td><input type="text" name="sensorEenheid"></td>
        </tr>
        <tr>
            <td>Type meter</td>
            <td> <select name="sensorType">
                <option>Temperatuur</option>
                <option>Vochtigheid</option>
            </select> </td>
        </tr>
    </table>
    <button name="AnnuleerButton" type="submit" value="">Annuleren</button>
    <button name="AddButton" type="submit">Voeg toe</button>
</form>
</div>
@endsection

