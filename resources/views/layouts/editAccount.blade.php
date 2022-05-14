@extends('layouts.main')

@section('content')


<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<label class="labelTest">Sensor aanpassen</label>
<div class="containerTable">
<form action="{{ url('editAccount') }}" method="POST" class="SensorFrom">
{{ csrf_field() }}
    
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value=" {{$userData['name'] }} " >         </td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" value="{{$userData['email'] }}"></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>old password</td>
            <td><input type="text" name="oldpass""></td>
            
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('oldpass'))
                    {{ $errors->first('oldpass') }}
                @endif
            </td>
        </tr>
        
        <tr>
            <td>new password</td>
            <td><input type="text" name="password" ></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
            </td>
        </tr>
        
    </table>
    <button name="AnnuleerBtn" type="submit" value="">Annuleren</button>
    <button name="EditButon" type="submit">Pas aan</button>
</form>
</div>

@endsection