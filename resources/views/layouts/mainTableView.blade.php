@extends('layouts.main')

@section('content')



<table class="responsiveTable">
    <tr>
        
    <form action="showAddSensor" method="post" >
             @csrf
             <td colspan="4"> <button name="AddSensorButton" type="submit" value="24">Sensor Toevoegen</button> </td>
    </form>
    </tr>
     <?php
     $counter = 0;
    for ($RowCounter = 1;$RowCounter <= 3 ;$RowCounter++){?>
    <tr>
        <?php
            for ($RowGridCounter = 1;$RowGridCounter <=4;$RowGridCounter++){?>
        <td>
            <table>
                <tr>
                    <td style="width: 75%">
                        <?php $sensor[] = $data[0] ?>
                       
                        <?php $counter++ ?>
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
                            <button name="EditSensorButton" type="submit" value="24"> Aanpassen </button> 
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