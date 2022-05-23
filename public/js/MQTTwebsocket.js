// import mqtt from '/mqtt.min.js'

// mqtt = require('mqtt')
console.log("did the require");
// console.log(mqtt);
const clientId = 'mqttjs_' + Math.random().toString(16).substr(2, 8)

// var div = document.getElementsByClassName("single-chart")[0];
// handleCircleChart(div, -20);
// var div = document.getElementsByClassName("container")[0];
// handleDigital(div, 20);
// var div = document.getElementsByClassName("graph")[0];
// handleBarChart(div,7);
// var div = document.getElementsByClassName("thermometerBody")[0];
// handleThermometerChart(div, 7)

var div = document.getElementsByClassName("single-chart-half")[0];
console.log(div);
handleGauge(div, 7);

// const host = '192.168.137.239:1883'

// const options = {
//   keepalive: 60,
//   clientId: clientId,
//   protocolId: 'MQTT',
//   protocolVersion: 4,
//   reconnectPeriod: 1000,
//   connectTimeout: 30 * 1000,
//   will: {
//     topic: 'WillMsg',
//     payload: 'Connection Closed abnormally..!',
//     qos: 0,
//     retain: false
//   },
// }
console.log('Connecting mqtt client')

// const client  = mqtt.connect('mqtt://192.168.137.239:1883', options)


client.on('error', (err) => {
  console.log('Connection error: ', err)
  client.end()
})

client.on('reconnect', () => {
  console.log('Reconnecting...')
})

client.on('connect', () => {
    console.log('Client connected:' + clientId)
    // Subscribe
    const topics = [];
    identifier_divs=document.getElementsByClassName("identifier");
    identifier_divs.forEach(identifier => 
        { 
            if (topics.find(p => p==identifier ) == 0)
            {
                topics.push(identifier)
            }
        });
    topics.forEach(topic =>
        {
            client.subscribe(topic, {qos: 0})
        })
  })

  
  client.on('message', (topic, message, packet) => {
    var elems = document.getElementsByClassName("topic");
    elems.forEach(gauge => {
        digital = gauge.getElementsByClassName("container");
        
    });
    elem[0].getElementsByClassName("percentage")[0].innerHTML = message;
    console.log('Received Message: ' + message.toString() + '\nOn topic: ' + topic)
  })

  function handleDigital(elem, value)
  {
    elem.getElementsByClassName("digital-value")[0].innerHTML = value;
  }

  function handleCircleChart(elem, value)
  {
      console.log("in function")
    var attributes = elem.attributes
    var max = attributes.getNamedItem("data-max").value;
    var min = attributes.getNamedItem("data-min").value;
    var unit = attributes.getNamedItem("data-unit").value;
    var percentage = ((value-min)/(max-min))*100
    var color = GetColorByPercentage(percentage);
    var circle = elem.getElementsByClassName("circle")[0]
    circle.style.stroke = color;
    circle.setAttribute("stroke-dasharray", percentage/2 + ", 100"); //waarom gedeelt door 2?
    elem.getElementsByClassName("percentage")[0].innerHTML = value + " " + unit;
  }

  function handleBarChart(elem, value)
  {
    var attributes = elem.attributes;
    var max= attributes.getNamedItem("data-max").value;
    var min= attributes.getNamedItem("data-min").value;
    var unit = attributes.getNamedItem("data-unit").value;
    var percentage = ((value-min)/(max-min))*100
    var color = GetColorByPercentage(percentage);
    var chart = elem.getElementsByClassName("chart-data-holder")[0]
    chart.style.height = percentage+"%";
    chart.style.background = color;
    chart.getElementsByTagName("span")[0].innerHTML = value + unit;
  }

  function handleThermometerChart(elem, value)
  {
    var attributes = elem.attributes;
    var max= attributes.getNamedItem("data-max").value;
    var min= attributes.getNamedItem("data-min").value;
    var percentage = ((value-min)/(max-min))*100;
    elem.getElementsByClassName("thermometer__tube")[0].style.height=percentage + "%";
  }

  function handleGauge(elem, value)
  {
      var attributes = elem.attributes;
      console.log(attributes);
      var max= attributes.getNamedItem("data-max").value;
      var min= attributes.getNamedItem("data-min").value;
      var percentage = ((value-min)/(max-min))*100;
      var color = GetColorByPercentage(percentage);
      var halfcircle = elem.getElementsByClassName("circle-half")[0];
      halfcircle.style.stroke=color;
      halfcircle.setAttribute("stroke-dasharray", percentage/2 + ", 100"); //waarom gedeelt door 2?
      elem.getElementsByClassName("value")[0].innerHTML = value;
  }

  function GetColorByPercentage(percentage)
  {
      var color;
    if (percentage < 50)
    {
        if (percentage < 25)
        {
            color = "RED"
        }
        else
        {
            color = "ORANGE"
        }
    }
    else
    {
        if (percentage < 75)
        {
            color = "YELLOW"
        }
        else
        {
            color = "GREEN"
        }
    }
    return color;
  }

  
  

//   div class = topic
// 	class "container" (digital?)   -> class "digital-unit"
// 				       -> class "digital-value"
	
// 	OR class "single-chart" (circle chart)          -> class "single-chart"
// 							-> <path class="circle" style="stroke: $color" stroke-dasharray="$percent">
// 							COLOR: RED -> ORANGE -> YELLOW -> GREEN equidistant
// 							-> class="percentage" INNER HTML $percentage? met unit
// 							(ik denk dat dit gewoon absolute waarde is, nie percentage)
 	
// 	OR class "graph" 				-> <tr class "bar" style="height:$percent; background:$color>
// 							COLOR: RED -> ORANGE -> YELLOW -> GREEN equidistant
// 								<span> $value $unit </span>
	
	
// 	OR class "thermometerBody"			-> <div class="thermometer_tube" style = "height: $value %">
// 								VALUE IS PERCENTAGE VAN MIN TOT MAX
// 								MIN MAX VERKRIJGEN VAN STEPS?
// 							thermometerlabel[0].innerhtml-thermometerlabel[1].innerhtml=step
// 							thermometerlabel[0]+0.5$stepslabel = max?
// 							thermometerlabel[7]-0.5$stepslabel = min?
// 							thermometerlabel is de class
	
// 	OR class "single-chart-half" (gauge)		-> <path class "circle-half" style="stroke: $color" stroke-dasharray="$percentage/2, 100"
// 								<text class="value"> $value </text>
