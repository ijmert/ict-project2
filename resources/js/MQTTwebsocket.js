const mqtt = require('mqtt')
console.log("did the require");
const clientId = 'mqttjs_' + Math.random().toString(16).substr(2, 8)

const host = '192.168.137.239:1883'

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

const client  = mqtt.connect('mqtt://192.168.137.239:1883', options)


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
    client.subscribe('testtopic', { qos: 0 })
  })

  
  client.on('message', (topic, message, packet) => {
    var elem = document.getElementsByClassName("Maarten3");
    elem[0].getElementsByClassName("percentage")[0].innerHTML = message;
    console.log('Received Message: ' + message.toString() + '\nOn topic: ' + topic)
  })
