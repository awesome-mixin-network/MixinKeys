#include <Servo.h>
int val;
int LED = 13;
char Change[] = "12345678";
char Open[] = "11111111";
int len = 8;
char buf[8];
char buf1[] = "11111111";
long randNumber;
int days;
int hours;
int minute;
unsigned long timer = -1;
unsigned long timer1 = -1;
unsigned long timing = 1000000;
unsigned long timing1 = 1000000;
unsigned long password = 11111111;
unsigned long password1 = 20000000;
unsigned long previousMillis = 0; // last time update
unsigned long interval = 4000; // interval at which to do something (milliseconds)
Servo servo;  // Создаем объект
void setup()
{
  Serial.begin(9600);
  pinMode(LED, OUTPUT);
  digitalWrite(LED, HIGH);
  servo.attach(7);   
  servo.write(0);   
  randomSeed(analogRead(0));
}
void loop()
{
  if (millis() - timing > timer)
  {
    sprintf(Open, "%ld", password);
    digitalWrite(LED, HIGH);
    delay(1000);
    timer = -1;
    timing = 1000000;
  }
  if (millis() - timing1 > timer1)
  {
    sprintf(Open, "%ld", password1);
    digitalWrite(LED, HIGH);
    delay(1000);
    timer1 = -1;
    timing1 = 1000000;
  }
  if (Serial.available())
  {
    Serial.readBytes(buf, len);
    val = 0;
    while (buf[val]==Change[val]) val++;
    if (val == len)
    {
      minute = Serial.parseInt();
      hours  = Serial.parseInt();
      days = Serial.parseInt();
      timer = (long(minute) * 60 + long(hours) * 3600 + 3600 * 24 * long(days)) * 1000;
      //Serial.println(minute * 60 + hours * 3600 + 3600 * 24 * days);
      Serial.println("Change password");
      password = random(10000000,99999999);
      Serial.println(password);
      timing = millis();
      minute = Serial.parseInt();
      hours  = Serial.parseInt();
      days = Serial.parseInt();
      timer1 = (long(minute) * 60 + long(hours) * 3600 + 3600 * 24 * long(days)) * 1000 + timer;
      timing1 = millis();
      //delay(timer);
      //sprintf(Open, "%ld", password);
      //minute = Serial.parseInt();
      //hours  = Serial.parseInt();
      //minute = Serial.parseInt();
      //Serial.println(Open);
      //digitalWrite(LED, HIGH);
      //delay(1000);
      //interval = 120000;
      //previousMillis = millis(); // last time update
    }
    else
    {
      val = 0;
      while (buf[val]==Open[val]) val++;
      if (val == len)  
      {
        Serial.print("Door is opened");
        servo.write(90); 
        delay(100);        
        servo.write(180);
        delay(1000);        
        servo.write(90);
        delay(100);
        servo.write(0);
        delay(100);
        digitalWrite(LED, LOW);
        delay(1000);
      }
    }  
  }
}
