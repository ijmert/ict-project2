@extends('layouts.main')

@section('content')
<div class="container-fluid" style="margin: 55px">
    <div class="row">
        <div class="col">
            <form action="showAddSensor" method="post" >
                @csrf
            <button name="AddSensorButton" type="submit" style="float: right; margin-right: 111px">Sensor Toevoegen</button>
       </form>
        </div>
    </div>
    <div class="row">

        <?php for($counter = 0; $counter < count($data['sensorData']); $counter++){ ?>
            <div class="col-sm-6 col-md-4 col-lg-3">

                <table>
                    <tr>
                        <td> <h4> <?php echo $data['sensorData'][$counter]['topic']; ?> </h4> </td>
                        <td>
                            <form action="deleteSensor" method="post">
                                @csrf
                                <button name="deleteSensorButton" type="submit" value="<?php echo $data['sensorData'][$counter]['id'] ?>">x</button>
                             </form>
                        </td>
                    </tr>
                    <tr style="height: 350px">
                        <td style="width: 150px">
                            <?php if($data['sensorData'][$counter]['type'] == "digitaal"){ ?>
                                <div class="container">
                                        <div class="de">
                                            <div class="den">
                                              <div class="dene">
                                                <div class="denem">
                                                  <div class="deneme">
                                                  <strong> <?php echo $data['sensorData'][$counter]['unit'] ?></strong>
                                                    <?php echo $data['value'][$counter] ?>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                      </div>
                            <?php  } ?>
                            <?php if($data['sensorData'][$counter]['type'] == "chart"){ ?>
                            <?php $percent = $data['value'][$counter] /( $data['sensorData'][$counter]['max'] - $data['sensorData'][$counter]['min'] )*100 ?>
                            <?php echo $data['value'][$counter] ?> <?php echo $data['sensorData'][$counter]['unit'] ?>
                                <table class="graph">
                                    <thead>
                                            <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                            </tr>
                                    </thead><tbody>
                                            <tr style="height:<?php echo $percent ?>%">
                                                    <td><span><?php echo $data['value'][$counter] ?><?php echo $data['sensorData'][$counter]['unit'] ?></span></td>
                                            </tr>
                                    </tbody>
                                    </table>
                            <?php  } ?>

                            <?php if($data['sensorData'][$counter]['type'] == "circle chart"){ ?>
                            <?php $percent = $data['value'][$counter] /( $data['sensorData'][$counter]['max'] - $data['sensorData'][$counter]['min'] )*100 ?>
                                <div class="single-chart">
                                    <svg viewBox="0 0 36 36" class="circular-chart">
                                      <path class="circle-bg"
                                        d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                      />
                                      <path class="circle" style="stroke: green"
                                        stroke-dasharray="<?php echo $percent ?>, 100"
                                        d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                      />
                                      <text x="18" y="20.35" class="percentage"><?php echo $data['value'][$counter] ?> <?php echo $data['sensorData'][$counter]['unit'] ?></text>
                                    </svg>
                                  </div>
                            <?php  } ?>

                            <?php if($data['sensorData'][$counter]['type'] == "thermometer"){ ?>
                              <?php $interval = $data['sensorData'][$counter]['max']- $data['sensorData'][$counter]['min']; ?>
                              <?php $stepsLabel = $interval/8; $stepsMeter = 96/$interval;  ?>
                              <?php $value =( $data['value'][$counter] - $data['sensorData'][$counter]['min']) * $stepsMeter; ?>

                              <div class="thermometerBody">
                                <div class="thermometer">
                                  <div class="thermometer__inner">
                                    <div class="thermometer__title"><?php echo $data['sensorData'][$counter]['unit'] ?> </div>
                                    <div class="thermometer__title"></div>
                                    <div class="thermometer__c">
                                      <div class="thermometer__label"><?php echo $data['sensorData'][$counter]['max']-$stepsLabel ?></div>
                                      <div class="thermometer__label"><?php echo $data['sensorData'][$counter]['max']-$stepsLabel*2 ?></div>
                                      <div class="thermometer__label"><?php echo $data['sensorData'][$counter]['max']-$stepsLabel *3?></div>
                                      <div class="thermometer__label"><?php echo $data['sensorData'][$counter]['max']-$stepsLabel*4 ?></div>
                                      <div class="thermometer__label"><?php echo $data['sensorData'][$counter]['max']-$stepsLabel*5 ?></div>
                                      <div class="thermometer__label"><?php echo $data['sensorData'][$counter]['max']-$stepsLabel*6 ?></div>
                                      <div class="thermometer__label"><?php echo $data['sensorData'][$counter]['max']-$stepsLabel*7 ?></div>
                                    </div>
                                    <div id="temp-val" class="thermometer__tube" style="height: <?php echo $value ?>%" data-c="0" data-f="32" title="0°C, 32°F">
                                      <div id="temp-fill" class="thermometer__mercury"></div>
                                      <div class="thermometer__ring"></div>
                                      <div class="thermometer__ring"></div>
                                    </div>
                                    <div class="thermometer__f" >
                                      <div class="thermometer__label"></div>
                                      <div class="thermometer__label"></div>
                                      <div class="thermometer__label"></div>
                                      <div class="thermometer__label"></div>
                                      <div class="thermometer__label"></div>
                                      <div class="thermometer__label"></div>
                                      <div class="thermometer__label"></div>
                                    </div>
                                    <div class="thermometer__bulb"></div>
                                  </div>
                                </div>
                              </div>
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

                </table>

              </div>
        <?php } ?>
    </div>
</div>
@endsection
