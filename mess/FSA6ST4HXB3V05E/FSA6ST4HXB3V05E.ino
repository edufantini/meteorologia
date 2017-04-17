#include <DHT.h>
#include <Ethernet.h>
#include <SPI.h>

byte mac[] = {0x90, 0xA2, 0xDA, 0x00, 0x9B, 0x36};
byte ip[] = {192, 168, 0, 50}; //ip arduino
byte server[] = {31, 170, 167, 165};
EthernetClient client;

#define DHTPIN 2 // SENSOR PIN
#define DHTTYPE DHT11 // SENSOR TYPE - THE ADAFRUIT LIBRARY OFFERS SUPPORT FOR MORE MODELS
DHT dht(DHTPIN, DHTTYPE);

long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 1000; // READING INTERVAL

int t = 0;	// TEMPERATURE VAR
int h = 0;	// HUMIDITY VAR
String data;
String get;

void setup() { 
	Serial.begin(9600);

	Ethernet.begin(mac, ip);

	dht.begin(); 
	delay(10000); // GIVE THE SENSOR SOME TIME TO START

	h = (int) dht.readHumidity(); 
	t = (int) dht.readTemperature(); 

	data = "";
}

void loop(){

	currentMillis = millis();
	if(currentMillis - previousMillis > interval) { // READ ONLY ONCE PER INTERVAL
		previousMillis = currentMillis;
		h = (int) dht.readHumidity();
		t = (int) dht.readTemperature();
	}

        get = "GET /atualizar.php?temp=" + t;
        get = get + "&umi=" + h;
        
        Serial.println("connecting...");
        if(client.connect(server, 80)){
             Serial.println("conectado");
             client.println("HTTP/1.1 200 OK");
             client.println(get);
             Serial.println(get);
             client.println("Content-Type: text/html");
             client.println("Connection: close");
        }else{
          Serial.println("Nao conectado");
        }

	if (client.connected()) { 
		client.stop();	// DISCONNECT FROM THE SERVER
	}

	delay(1000); // WAIT FIVE MINUTES BEFORE SENDING AGAIN
        Serial.println(t); 
}



