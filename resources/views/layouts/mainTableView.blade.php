@extends('layouts.main')

@section('content')
<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
<script type="module" src="js/MQTTwebsocket.js"></script>
<div class="container-fluid" style="margin: 55px, width: 0px">
    <div class="row">
        <div class="col">
            <form action="showAddSensor" method="post" >
                @csrf
            <button class="Knop" name="AddSensorButton" type="submit" style="float: right; margin-right: 111px">Add sensor</button>
       </form>
        </div>
    </div>
    <div class="row">

        <?php for($counter = 0; $counter < count($data['sensorData']); $counter++){ ?>
            <div data-topic=<?php echo $data['sensorData'][$counter]['topic']?> class="identifier <?php echo $data['sensorData'][$counter]['topic']?> col-sm-6 col-md-4 col-lg-3">

                <table>
                    <tr>
                        <td> <h4> <?php echo $data['sensorData'][$counter]['topic']; ?> </h4> </td>
                        <td>
                            <form action="deleteSensor" method="post">
                                @csrf
                                <button class="Knop" name="deleteSensorButton" type="submit" value="<?php echo $data['sensorData'][$counter]['id'] ?>">x</button>
                             </form>
                        </td>
                    </tr>
                    <tr style="height: 350px">
                        <td style="width: 150px">
                            <?php if($data['sensorData'][$counter]['type'] == "digital"){ ?>
                                <div class="container">
                                        <div class="de">
                                            <div class="den">
                                              <div class="dene">
                                                <div class="denem">
                                                  <div class="deneme">
                                                  <strong class="digital-unit"> <?php echo $data['sensorData'][$counter]['unit'] ?></strong>
                                                    <div class="digital-value"><?php echo $data['value'][$counter] ?>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                      </div>
                            <?php  } ?>
                            <?php if($data['sensorData'][$counter]['type'] == "chart"){ ?>
                                <table data-unit="<?php echo $data['sensorData'][$counter]['unit']?>" data-max="<?php echo $data['sensorData'][$counter]['max']?>" data-min="<?php echo $data['sensorData'][$counter]['min']?>" class="graph">
                                    <thead>
                                            <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                            </tr>
                                    </thead><tbody>
                                            <tr class="chart-data-holder" style="height:<?php echo $data['percent'][$counter] ?>%; background:<?php echo $data['color'][$counter] ?>; border-radius:0.5em 0.5em 0 0;">
                                                    <td><span> <?php echo $data['value'][$counter] ?><?php echo $data['sensorData'][$counter]['unit'] ?></span></td>
                                            </tr>
                                    </tbody>
                                </table>
                            <?php  } ?>

                            <?php if($data['sensorData'][$counter]['type'] == "circle chart"){ ?>
                                <div data-unit="<?php echo $data['sensorData'][$counter]['unit']?>" data-max="<?php echo $data['sensorData'][$counter]['max']?>" data-min="<?php echo $data['sensorData'][$counter]['min']?>" class="single-chart">
                                    <svg viewBox="0 0 36 36" class="circular-chart">
                                      <path class="circle-bg"
                                        d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                      />
                                      <path class="circle" style="stroke: <?php echo $data['color'][$counter] ?>"
                                        stroke-dasharray="<?php echo $data['percent'][$counter] ?>, 100"
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
                              <?php $stepsLabel = $interval/8; ?>
                              <div data-max="<?php echo $data['sensorData'][$counter]['max']?>" data-min="<?php echo $data['sensorData'][$counter]['min']?>" class="thermometerBody">
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
                                    <div id="temp-val" class="thermometer__tube" style="height: <?php echo $data['percent'][$counter] ?>%" data-c="0" data-f="32" title="0??C, 32??F">
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

                            <?php if($data['sensorData'][$counter]['type'] == "gauge"){ ?>
                                <div class="single-chart-half" data-max="<?php echo $data['sensorData'][$counter]['max']?>" data-min="<?php echo $data['sensorData'][$counter]['min']?>"  >
                                    <svg viewBox="0 0 36 36" class="circular-chart-half">
                                      <path class="circle-bg-half"
                                      stroke-dasharray="50, 100"
                                        d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                      />
                                      <path class="circle-half" style="stroke: <?php echo $data['color'][$counter] ?>"
                                        stroke-dasharray="<?php echo $data['percent'][$counter]/2 ?>, 100"
                                        d="M18 2.0845
                                          a 15.9155 15.9155 0 0 1 0 31.831
                                          a 15.9155 15.9155 0 0 1 0 -31.831"
                                      />
                                      <text x="3" y="-14" class="scale"><?php echo $data['sensorData'][$counter]['min'] ?></text>
                                      <text x="33" y="-14" class="scale"><?php echo $data['sensorData'][$counter]['max'] ?></text>
                                      <text x="18" y="-21" class="value"><?php echo $data['value'][$counter] ?> </text>
                                      <text x="18" y="-19" class="unit"><?php echo $data['sensorData'][$counter]['unit'] ?> </text>

                                      <text x="26.9" y="-16" class="unit" style="transform: rotate(45deg)">|</text> <!--25-->
                                      <text x="0" y="42.9" class="unit" style="transform: rotate(-45deg)">|</text> <!--75 -->
                                      <text x="18" y="-34" class="unit" >|</text>                                   <!--50-->
                                    </svg>
                                  </div>
                              <?php  } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="showEditSensor" method="post">
                                @csrf
                                <button class="Knop" name="EditSensorButton" type="submit" value="<?php echo $data['sensorData'][$counter]['id'] ?>"> Change </button>
                            </form>
                        </td>
                    </tr>

                </table>

              </div>
        <?php } ?>
    </div>
</div>
@endsection

@section('initials')
<?php echo $initials ?>
@endsection
