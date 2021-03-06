#include <DHT.h>
#include <Ethernet.h>
#include <SPI.h>

byte mac[] = { 0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x01 };
EthernetClient client;

#define DHTPIN 2
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 10; // READING INTERVAL

const int sensorMin = 0;     // sensor minimum
const int sensorMax = 1024;  // sensor maximum

int t = 0;
int h = 0;

void setup() { 
	Serial.begin(9600);

	if (Ethernet.begin(mac) == 0) {
          Serial.println("Erro ao configurar Ethernet."); 
	}else{
          Serial.println("Conectado.");
        }

	dht.begin(); 
	delay(1); // GIVE THE SENSOR SOME TIME TO START
        
	h = (int) dht.readHumidity(); 
	t = (int) dht.readTemperature();
}

void loop(){

	currentMillis = millis();
	if(currentMillis - previousMillis > interval) {
		previousMillis = currentMillis;
		h = (int) dht.readHumidity();
		t = (int) dht.readTemperature();
        	int sensorReading = analogRead(A0);
                int range = map(sensorReading, sensorMin, sensorMax, 0, 3);
                switch (range) {
                 case 0:    // Sensor getting wet
                    Serial.println("Flood");
                    break;
                 case 1:    // Sensor getting wet
                    Serial.println("Rain Warning");
                    break;
                 case 2:    // Sensor dry - To shut this up delete the " Serial.println("Not Raining"); " below.
                    Serial.println("Not Raining");
                    break;
                 }
	}

	data = String("temp=") + t + String("&umi=") + h;

	if (client.connect("www.meterolutini.hol.es",80)) {
                Serial.println("Conectado;");
		client.println("POST /atualizar.php HTTP/1.1"); 
		client.println("Host: meterolutini.hol.es");
		client.println("Content-Type: application/x-www-form-urlencoded"); 
		client.print("Content-Length: "); 
		client.println(data.length()); 
		client.println();
                client.print(data);
                Serial.println("Sucesso;");
                Serial.println(data);
	}else{
                Serial.println("Erro ao enviar.");
                Serial.println("Out " + data);
        }

	if (client.connected()) { 
		client.stop();
	}

	delay(6);
}
