
console.log(mqtt);
const clientId = 'mqttjs_' + Math.random().toString(16).substr(2, 8)



const hostURL = 'ws://94.110.73.79:9001'

const options = {
  keepalive: 60,
  clientId: clientId,
  protocolId: 'MQTT',
  protocolVersion: 4,
  reconnectPeriod: 1000,
  connectTimeout: 30 * 1000,
  will: {
    topic: 'WillMsg',
    payload: 'Connection Closed abnormally..!',
    qos: 0,
    retain: false
  },
}
console.log('Connecting mqtt client')

const client  = mqtt.connect(hostURL, options)


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
    var identifier_divs=document.getElementsByClassName("identifier");
    for (var i = 0; i<identifier_divs.length; i++)
    {
      var topic = identifier_divs[i].attributes.getNamedItem("data-topic").value;
      if (typeof(topics.find(p=> p == topic)) == "undefined")
      {
        topics.push(topic);
        console.log(topic); //debug
      }
    }
    topics.forEach(topic =>
        {
            client.subscribe(topic, {qos: 0})
        })
        console.log(topics);
  })

  //MAX ONE TYPE OF CHART FOR EACH TOPIC
  client.on('message', (topic, message, packet) => {
    message=parseFloat(message);    
    console.log(message);
    var elems = document.getElementsByClassName(topic);
    console.log(elems);
    var gauges = [];
    for (var i = 0; i<elems.length; i++)
    {
      gauges.push(elems[i].getElementsByClassName("container")[0]);
      gauges.push(elems[i].getElementsByClassName("graph")[0]);
      gauges.push(elems[i].getElementsByClassName("single-chart")[0]);
      gauges.push(elems[i].getElementsByClassName("thermometerBody")[0]);
      gauges.push(elems[i].getElementsByClassName("single-chart-half")[0]);
      console.log(gauges);
      for (var i = 0; i<gauges.length; i++)
      {
        if (typeof(gauges[i]) != "undefined")
        {
          switch(i)
          {
            case 0:
              handleDigital(gauges[i], message);
              break;
            case 1:
              handleBarChart(gauges[i], message);
              break;
            case 2:
              handleCircleChart(gauges[i], message);
              break;
            case 3:
              handleThermometerChart(gauges[i], message);
              break;
            case 4:
              handleGauge(gauges[i], message);

          }
        }
      }
    }
    // elem[0].getElementsByClassName("percentage")[0].innerHTML = message;
    // console.log('Received Message: ' + message.toString() + '\nOn topic: ' + topic)
  })

  function handleDigital(elem, value)
  {
    elem.getElementsByClassName("digital-value")[0].innerHTML = value;
  }

  function handleCircleChart(elem, value)
  {
    var attributes = elem.attributes
    var max = attributes.getNamedItem("data-max").value;
    if (value > max){value = max}
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
    if (value > max){value = max}
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
    if (value > max){value = max}
    var min= attributes.getNamedItem("data-min").value;
    var percentage = ((value-min)/(max-min))*100;
    elem.getElementsByClassName("thermometer__tube")[0].style.height=percentage + "%";
  }

  function handleGauge(elem, value)
  {
      var attributes = elem.attributes;
      console.log(attributes);
      var max= attributes.getNamedItem("data-max").value;
      if (value > max){value = max}
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

  
  