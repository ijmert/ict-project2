@extends('layouts.main')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<label class="labelTest">Edit sensor</label>
<div class="containerTable">
<form action="{{ url('editSensor') }}" method="POST" class="SensorFrom">
{{ csrf_field() }}

    <table>
        <tr>
            <td>Topic</td>
            <td><select class="SelectBox" name="topic" >
                <option class="optionGroup" selected disabled>Choose topic</option>
                <?php foreach ($topics as $topic) { ?>
                  <option <?php if ($sensorData['topic'] == $topic['topic']){ ?> selected <?php } ?>> <?php echo $topic['topic']; ?> </option>
                <?php } ?>
            </select>         </td>
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
            <td>Min</td>
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
            <td>Unit</td>
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
            <td>Type</td>
            <td> <select class="SelectBox" name="type">
                <option <?php if ($sensorData['type'] == 'chart'){ ?> selected <?php } ?> >chart</option>
                <option <?php if ($sensorData['type'] == 'digital'){ ?> selected <?php } ?> >digitaal</option>
                <option <?php if ($sensorData['type'] == 'circle chart'){ ?> selected <?php } ?> >circle chart</option>
                <option <?php if ($sensorData['type'] == 'thermometer'){ ?> selected <?php } ?> >thermometer</option>
            </select> </td>
        </tr>
    </table>
    <button class="Knop" name="AnnuleerBtn" type="submit" value="">Cancel</button>
    <button class="Knop" name="EditButon" type="submit"  value="<?php echo $sensorData['id'] ?>">Save</button>
</form>
</div>

@endsection
@section('initials')
<?php echo $sensorData['initials'] ; ?>
@endsection
