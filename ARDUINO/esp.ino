    #include <SoftwareSerial.h>

    SoftwareSerial mySerial(8, 9);

    #define WIFI_SERIAL    mySerial
     
    void setup()
    {
      Serial.begin(9600);
      while (!Serial) {
      }
      Serial.print("Serial init OK\r\n");
      WIFI_SERIAL.begin(115200);
    }
     
    void loop()
    {
      if (WIFI_SERIAL.available()) {
        Serial.write(WIFI_SERIAL.read());
      }
      if (Serial.available()) {
        WIFI_SERIAL.write(Serial.read());
      }
    }
