@extends('layouts.main')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<label class="labelTest">Sensor aanpassen</label>
<div class="containerTable">
<form action="{{ url('editSensor') }}" method="POST" class="SensorFrom">
{{ csrf_field() }}

    <table>
        <tr>
            <td>Topic</td>
            <td><input class="InputBox" type="text" name="topic" value=" {{$sensorData['topic'] }} " >         </td>
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
            <td><input class="InputBox" type="text" name="max" value="{{$sensorData['max'] }}"></td>
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
            <td><input class="InputBox" type="text" name="min" value="{{$sensorData['min'] }}"></td>
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
            <td><input class="InputBox" type="text" name="unit" value="{{$sensorData['unit'] }}"></td>
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
            <td> <select class="SelectBox" name="type">
                <option <?php if ($sensorData['type'] == 'chart'){ ?> selected <?php } ?> >chart</option>
                <option <?php if ($sensorData['type'] == 'digitaal'){ ?> selected <?php } ?> >digitaal</option>
                <option <?php if ($sensorData['type'] == 'CO2'){ ?> selected <?php } ?> >CO2</option>
                <option <?php if ($sensorData['type'] == 'thermometer'){ ?> selected <?php } ?> >thermometer</option>
            </select> </td>
        </tr>
    </table>
    <button name="AnnuleerBtn" type="submit" value="">Annuleren</button>
    <button name="EditButon" type="submit"  value="<?php echo $sensorData['id'] ?>">Pas aan</button>
</form>
</div>

@endsection
@section('initials')
<?php echo $initials ?>
@endsection
