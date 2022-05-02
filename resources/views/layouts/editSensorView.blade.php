@extends('layouts.main')

@section('content')

<label>Sensor aanpassen</label>

<form action="" method="post">
    <table>
        <tr>
            <td>Topic</td>
            <td><input type="text" name="sensorTopic" value="" ></td>
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
            <td><input type="text" name="sensorTopic"></td>
        </tr>
        <tr>
            <td>Type meter</td>
            <td> <select name="sensorTypeMeter">
                <option>1</option>
                <option>2</option>
            </select> </td>
        </tr>
    </table>
    <button name="AnnuleerBtn" type="submit" class="btn btn-primary" value="">annuleren</button>
    <button name="submitBtn" type="submit" class="btn btn-primary" value="">Toevoegen</button>
</form>

@endsection