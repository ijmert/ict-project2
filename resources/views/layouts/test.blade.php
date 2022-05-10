@extends('layouts.main')

@section('content')

<?php echo $test['sensorData'] ?>
<?php echo $test['value'][0] ?>
<?php $counter = 0 ?>

<?php $rows = (count($test['sensorData'])/4) +1 ?>


<br>
<?php for ($RowCounter = 1;$RowCounter <= $rows ;$RowCounter++){?>

 <?php
            for ($ColCounter = 1;$ColCounter <=4 && $counter < count($test['sensorData']);$ColCounter++){?>

   <?php echo $test['sensorData'][$counter]['topic']; ?>
<?php echo $test['sensorData'][$counter]['id'] ?>
    
    <?php $counter++ ?>
    <?php } ?>
    <br>
    
<?php } ?>
@endsection

