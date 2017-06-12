#include <DHT.h>
#include <Ethernet.h>
#include <SPI.h>

byte mac[] = { 0xF0, 0x4D, 0xA2, 0xE6, 0x3E, 0xC8 };
EthernetClient client;

#define DHTPIN 2
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 240000; // READING INTERVAL - 4min

const int sensorMin = 0;     // sensor minimum
const int sensorMax = 1024;  // sensor maximum

int ldrPin = A2; // select the input pin for LDR
int ldrValue = 0; // variable to store the value coming from the sensor
int sol = 0;

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

		ldrValue = analogRead(ldrPin);
		int rangeldr = map(ldrValue, sensorMin, sensorMax, 0, 3);
		switch (rangeldr) {
			case 0:
				//sol
				sol = 1;
				break;
			case 1:
				//nublado
				sol = 2;
				break;
			case 2:
				//noite
				chuva = 3;
				break;	
		}

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

	data = String("temp=") + t + String("&umi=") + h + String("&chuva=") + chuva + String("&sol=") + sol;

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
