@extends('layouts.main')

@section('content')

<br>
<table>
    <tr>
        <td colspan="4"><button>sensor toevoegen</button></td>
    </tr>
     <?php
    for ($RowCounter = 1;$RowCounter <= 3 ;$RowCounter++){?>
    <tr>
        <?php
            for ($RowGridCounter = 1;$RowGridCounter <=4;$RowGridCounter++){?>
        <td>
            <table>
                <tr>
                    <td>sensornaam</td>
                </tr>
                <tr>
                    <td>afbeelding</td>
                </tr>
                <tr>
                    <td> 
                        <form action="test" method="post">
                            @csrf
                            <button name="btnAanpassen" type="submit" value="sensorId"> aanpassen </button> 
                        </form>
                    </td>
                </tr>
            </table>
        </td>
        <?php } ?>
                </tr>  
       <?php } ?>
    
</table>

@endsection