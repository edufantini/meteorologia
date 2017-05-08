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
long interval = 10000; // READING INTERVAL

int t = 0;
int h = 0;
String data = "";

void setup() { 
	Serial.begin(9600);

	if (Ethernet.begin(mac) == 0) {
		Serial.println("Erro ao configurar Ethernet."); 
	}

	dht.begin(); 
	delay(10000); // GIVE THE SENSOR SOME TIME TO START

	h = (int) dht.readHumidity(); 
	t = (int) dht.readTemperature(); 

	data = "";
}

void loop(){

	currentMillis = millis();
	if(currentMillis - previousMillis > interval) {
		previousMillis = currentMillis;
		h = (int) dht.readHumidity();
		t = (int) dht.readTemperature();
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
                Serial.println(data);
	} 

	if (client.connected()) { 
		client.stop();
	}

	delay(60000);
}
