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
long interval = 240000; // READING INTERVAL - 4min

const int sensorMin = 0;     // sensor minimum
const int sensorMax = 1024;  // sensor maximum

int t = 0;
int h = 0;
int chuva = 0;
String data = "";

void setup() { 
	Serial.begin(9600);

	if (Ethernet.begin(mac) == 0) {
          Serial.println("Erro ao configurar Ethernet."); 
	}else{
          Serial.println("Conectado.");
        }

	dht.begin(); 
	delay(60000); // GIVE THE SENSOR SOME TIME TO START - 1min
        
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
                    chuva = 1;
                    break;
                 case 1:    // Sensor getting wet
                    chuva = 2;
                    break;
                 case 2:    // Sensor dry - To shut this up delete the " Serial.println("Not Raining"); " below.
                    chuva = 3;
                    break;
                 }
	}

	data = String("temp=") + t + String("&umi=") + h +String("&chuva=") + chuva;

	if (client.connect("www.meterolutini.hol.es",80)) {
                Serial.println("Enviando...");
		client.println("POST /atualizar.php HTTP/1.1"); 
		client.println("Host: meterolutini.hol.es");
		client.println("Content-Type: application/x-www-form-urlencoded"); 
		client.print("Content-Length: "); 
		client.println(data.length()); 
		client.println();
                client.print(data);
                Serial.println("Enviado; Out: ");
                Serial.print(data);
	}else{
                Serial.println("Erro ao enviar. Out: ");
                Serial.print(data);
        }

	if (client.connected()) { 
		client.stop();
	}

	delay(300000); //5min
}
