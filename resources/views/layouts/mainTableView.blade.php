@extends('layouts.main')

@section('content')
<pre>
<?php $rows = (count($data)/4) +1 ?>
<?php $counter = 0 ?>
<?php echo $initials ?>
<br>
</pre>


<table class="responsiveTable">
    <tr>
        
    <form action="showAddSensor" method="post" >
             @csrf
             <td colspan="4"> <button name="AddSensorButton" type="submit" >Sensor Toevoegen</button> </td>
    </form>
    </tr>
     <?php
    for ($RowCounter = 1;$RowCounter <= $rows ;$RowCounter++){?>
    <tr>
        <?php
            for ($ColCounter = 1;$ColCounter <=4 && $counter < count($data);$ColCounter++){?>
        <td>
            <table>
                <tr>
                    <td style="width: 75%">
                        <?php $sensor[] = $data['sensorData'][0] ?>
                       
                        <?php echo $data['sensorData'][$counter]['topic']; ?>
                        
                    </td>
                    <td style="width: 25%">
                        <form action="deleteSensor" method="post">
                            @csrf
                            <button name="deleteSensorButton" type="submit" value="<?php echo $data['sensorData'][$counter]['id'] ?>">x</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $data['value'][$counter] ?> </td>
                </tr>
                <tr>
                    <td> 
                        <form action="showEditSensor" method="post">
                            @csrf
                            <button name="EditSensorButton" type="submit" value="<?php echo $data['sensorData'][$counter]['id'] ?>"> Aanpassen </button> 
                        </form>
                    </td>
                </tr>
                
                        <?php $counter++ ?>
            </table>
        </td>
        <?php } ?>
                </tr>  
       <?php } ?>
    
</table>

@endsection