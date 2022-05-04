@extends('layouts.main')

@section('content')

<table class="responsiveTable">
    <tr>
        
    <form action="addSensor" method="post" >
             @csrf
             <td colspan="4"> <button>sensor toevoegen</button> </td>
    </form>
    </tr>
     <?php
    for ($RowCounter = 1;$RowCounter <= 3 ;$RowCounter++){?>
    <tr>
        <?php
            for ($RowGridCounter = 1;$RowGridCounter <=4;$RowGridCounter++){?>
        <td>
            <table>
                <tr>
                    <td style="width: 75%">
                        <?php data[$counter]['naam'] ?>
                        </td>
                    <td style="width: 25%">
                        <form action="deleteSensor" method="post">
                            @csrf
                            <button name="deleteSensorButton" type="submit" value="24">x</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>afbeelding</td>
                </tr>
                <tr>
                    <td> 
                        <form action="showEditSensor" method="post">
                            @csrf
                            <button name="EditSensorButton" type="submit" value="24"> aanpassen </button> 
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