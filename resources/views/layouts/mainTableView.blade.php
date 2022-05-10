@extends('layouts.main')

@section('content')
<pre>
<?php $rows = (count($data)/4) +1 ?>
<?php $counter = 0 ?>
<?php echo $initials ?>
<br>
</pre>

<!-- <table class="responsiveTable"> -->
  <!--  <tr> -->
<div class="container">
    <div class="row">
    <form action="showAddSensor" method="post" >
             @csrf
             <td colspan="4"> <button name="AddSensorButton" type="submit" >Sensor Toevoegen</button> </td>
    </form>
    </div>
  <!--  </tr> -->
     <?php
    for ($RowCounter = 1;$RowCounter <= $rows ;$RowCounter++){?>
    <!-- <tr> -->
  <div class="row">
        <?php
            for ($ColCounter = 1;$ColCounter <=4 && $counter < count($data['sensorData']);$ColCounter++){?>
        <!-- <td> -->
      <div class="col-md">
            <table>
                <tr>
                    <td style="width: 75%">
                        <?php echo $data['sensorData'][$counter]['topic']; ?>
                        
                    </td>
                    <td style="width: 25%">
                        <form action="deleteSensor" method="post">
                            @csrf
                            <button name="deleteSensorButton" type="submit" value="<?php echo $data['sensorData'][$counter]['id'] ?>">x</button>
                        </form>
                    </td>
                </tr>
                <tr style="height: 300px">
                    <td style="width: 150px">                        
                        <?php if($data['sensorData'][$counter]['type'] == "digitaal"){ ?>
                            <div class="container">
                                    <div class="de">
                                        <div class="den">
                                          <div class="dene">
                                            <div class="denem">
                                              <div class="deneme">
                                                <?php echo $data['value'][$counter] ?><strong> <?php echo $data['sensorData'][$counter]['unit'] ?></strong>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                        <?php  } ?>
                        <?php if($data['sensorData'][$counter]['type'] == "chart"){ ?>
                            <table class="graph">
                                <thead>
                                        <tr>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                        </tr>
                                </thead><tbody>
                                        <tr style="height:<?php echo $data['value'][$counter] ?>%">
                                                <td><span><?php echo $data['value'][$counter] ?>%</span></td>
                                        </tr>
                                </tbody>
                                </table>
                        <?php  } ?>
                         </td>
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
       <!-- </td> -->
      </div>
        <?php } ?>
               <!-- </tr>   -->
  </div>
       <?php } ?>
    
<!-- </table> -->
</div>
@endsection