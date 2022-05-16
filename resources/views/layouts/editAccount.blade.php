@extends('layouts.main')

@section('content')


<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<label class="labelTest">Edit account</label>
<div class="containerTable">
<form action="{{ url('editAccount') }}" method="POST" class="SensorFrom">
{{ csrf_field() }}

    <table>
        <tr>
            <td>Firstname</td>
            <td><input class="InputBox" type="text" name="firstName" value=" {{$userData['firstName'] }} " >         </td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('firstName'))
                    {{ $errors->first('firstName') }}
                @endif
            </td>
        </tr>
        <td>Lastname</td>
            <td><input class="InputBox" type="text" name="lastName" value=" {{$userData['lastName'] }} " >         </td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('lastName'))
                    {{ $errors->first('lastName') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input class="InputBox" type="email" name="email" value="{{$userData['email'] }}"></td>
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
            <td><input class="InputBox" type="password" name="oldpass""></td>

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
            <td><input class="InputBox" type="password" name="password" ></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>confirm new password</td>
            <td><input class="InputBox" type="password" name="confPassword" ></td>
        </tr>
        <tr>
            <td colspan="2" style="color:red">
                @if ($errors->has('password'))
                    {{ $errors->first('confPassword') }}
                @endif
            </td>
        </tr>

    </table>
    <button name="AnnuleerBtn" type="submit" value="">Cancel</button>
    <button name="EditButon" type="submit">Save edit </button>
    <button name="deleteSensorButton" type="submit">Delete account</button>
</form>
</div>

@endsection
@section('initials')
<?php echo $initials ?>
@endsection
