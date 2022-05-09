@extends('layouts.main')

@section('content')
<pre>
    <?php echo $data[0]['id'] ?>
    <?php echo $data[0]['topic'] ?>
    <?php echo $data[0]['type'] ?>
    <?php echo $data[0]['unit'] ?>
    <?php echo $data[0]['min'] ?>
    <?php echo $data[0]['max'] ?>
</pre>


<table class="responsiveTable">
    <tr>
        
    <form action="addSensor" method="post" >
             @csrf
             <td colspan="4"> <button>sensor toevoegen</button> </td>
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
                        <form action="showEditSensor" method="POST">
                            @csrf
                            <button name="EditSensorButton" type="submit" value="<?php echo $data[0]['id'] ?>"> aanpassen </button> 
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