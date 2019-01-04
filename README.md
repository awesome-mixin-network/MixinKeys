#MixinKeys
#Requirements
-Composer
-PHP >= 7.0
-Install MixinSDK by comand: composer require exinone/mixin-sdk-php -vvv
-Arduino UNO
-ESP wi-fi module
-Bluetooth module
-Mixin Messenger account
-Mobile app for bluetooth connection
#INTRODUCTION
Nowadays many people like to travel. During the trip, there is a need for rental housing. If you are traveling in a large company or for a long time, then choosing between the hotel and the apartment, the choice will fall on the apartment. At a price, the cost of daily rent of apartments is similar or cheaper than a hotel room of the appropriate level. The difference in price can reach 20-30%. In addition, at the disposal of a tourist or a business traveler who has arrived in the city for several days, there is a fully equipped kitchen where you can prepare lunch or dinner on your own. And when placed in a hotel, you will have to either leave a lot of money in a restaurant each time, or look for a decent cafe or restaurant. And it is not the fact that a decent institution will be nearby. The hotel will have to pay for each additional service - washing and ironing a shirt, taking care of shoes, etc. In the same apartment for rent, nobody will present an additional bill for using an iron, a washing machine or a brush for shoes. Services helping to rent housing are profitable. Even despite such problems as the introduction in some cities, for example in New York and San Francisco, of legislative norms restricting the operation of these services, Airbnb's annual revenue in 2016 grew by 80%. Nowadays there are many services, which offers to rent an apartment. But there are a number of problems when renting apartments:

Withdrawing money at an overvalued exchange rate;
Uncertainty that the payment has passed;
The need for a personal meeting with the landlord for the transfer of keys. The solution of these problems is aimed at reducing the time of the landlord and tenant to interact with each other, and to protect the tenant from bank problems. Thus, the tasks for solving the problems will be:
Creating a new service for renting housing
Reducing the time of transfer of money
Confirmation of payment made and received
Minimizing action by the landlord
The ability to open the lock without transferring the usual key
#PROJECT DESCRIPTION
The proposed solution to these problems is to create a new service based on Mixin Network and IoT technologies. This service will include:

Web-site on which housing can be selected;
DApp for the relationship between the landlord and the tenant;
Payment platform for faster and more secure money transfer;
Smart lock. Now we will describe what means we will use for each item.
Database Based Site
To store data on housing (location, employment for a certain time, cost, etc.) will be used a database that is linked to the site. The database will be stored in mysql, since this environment allows you to do all the necessary actions with databases, namely, to store, process and send requests.

#DApp based on Mixin Network
Mixin is a system created on the basis of the BFT-DAG network and connecting block chains that works with unlimited bandwidth. It can be easily installed on any mobile phone based on the Android OS by downloading from Google Play. The App Store also has a version for iOS gadget owners. Tokenization of digital assets is one thing, and using them to solve real-world problems is quite another. These are the goals pursued by the developers of Mixin. Released under the platform, the XIN token is considered as a tool to combat problems such as the use, distribution and functionality of blockchain-based digital coins. Mixin solves this problem with a mobile messenger, which allows you to easily, reliably and quickly transfer cryptocurrency between network users. The platform is designed to provide fair and transparent conditions to all users when processing transactions. The transfer of funds takes place in just a few seconds. The platform is based on a peer-to-peer network (P2P). According to the authors of the project, their goal is to provide an ultra-safe and decentralized environment, where everyone can make a secure exchange and transfer of cryptocurrency. The list of main advantages of the platform includes: •	an attempt to find a balance in distributed network and traditional server clusters; •	combining the strengths of the above systems; •	limited and reliable complete nodes with guaranteed transparency and consistency of data; •	zero disclosure proof; •	free high bandwidth transactions; •	inter-unit communication protocol for connecting all popular blockchain types; •	non-deterministic transactions and direct interaction with reliable external sources; •	Login to the user account by sending a PIN code to the phone; •	secure and pass-through encrypted messaging channel for user notification. •	A convenient set of Linux tools and libraries for developers. Mixin uses the Signal protocol to control the messaging system. The protocol runs on the client, so the server acts only as a network of proxy messages. A powerful encryption system does not allow intercepting and decrypting such messages, even Mixin network nodes. Each message is deleted from the network after the recipient has read it. All photos, videos and other attachments are also encrypted using a random AES key before uploading to a special cloud database. It can only be retrieved by the recipient through the AES key, which decrypts the information transmitted by the sender. Based on the above, Mixin was chosen to create a new DApp. The project uses MixinSDK written on PHP language, so it means that all the functionality of Mixin is available in the project.

#Smart lock based on Arduino, Wi-fi and Bluetooth module and servo
To eliminate the need for a personal meeting between the landlord and the tenant and to minimize the actions on the part of the landlord, a smart lock will be made. This lock has the following set of functions:

The ability to use a password to open the lock;
Ability to reprogram the lock to another password;
Ability to postpone reprogramming for a specific time; To solve these problems was selected Arduino UNO. Arduino Uno is a microcontroller board based on ATmega328P. It is equipped with everything that is needed to support the microcontroller. Thus, for starting working with Arduino is simply connect it to a computer (using a USB cable) or power it from an adapter that converts alternating current to direct current, or from a battery. Working with this board, you can almost not worry about the fact that you can do something wrong. In the worst case, you just need to change the crystal, which costs only a few dollars, after which you can get back to work. This microcontroller can be easily programmed and has the ability to connect to it a Wi-fi-module for exchanging data with other devices, for example, with the site. In our project we will use wi-fi module esp8266. The ESP8266 chip is one of the most popular tools for organizing wireless communications in smart home projects. Using wireless controller you can organize communication over a WiFi interface providing Arduino projects with Internet access and the ability to remotely control and collect data. We will use the esp8266 module to communicate with the Arduino and the landlord. For communication between the tenant and the arduino the HC-06 bluetooth module will be used. On the side of a managed device, such as an Arduino, this module looks like a normal serial interface. With the HC-06, you can control various devices directly from your smartphone by putting one of numerous control programs on your phone or tablet. The operating voltage of this bluetooth module is 3.3 V, but its inputs are tolerant to 5 V, so it is compatible with all Arduino boards. Arduino UNO was chosen because of its versatility, low cost, as well as the possibility of easy and rapid expansion of the functional. Bluetooth module HC-06 and wi-fi module esp8266 were chosen because they are easily integrated into the system with Arduino and the servo drive was chosen to create a lock opening mechanism.
Connecting all parts to one server
To work with a ready server, you will need to go to the site and select the housing you like. The site will transfer to mixin messenger, which, when paid, will create a transaction containing the password and time of arrival and departure, which will be communicated to the Arduino using the wi-fi module. Arduino will process the received data and program the lock. Upon arrival, the tenant will install any application that allows you to communicate with arduino Bluetooth and dial a password. This scheme is presented in the form of Figure 1. This system allows you to reduce to an absolute minimum action by the landlord, and the use of mixin allows the tenant to feel more confident when transferring money.

#User interface and scenario.
User interface and script by the landlord.

The landlord has an account on the mixin messenger.
The landlord enters its housing database. User interface and script by the tenant.
The tenant gets a mixin messenger account.
The tenant visits the site and selects the date and place of the booked accommodation.
The tenant chooses the housing you like.
The tenant transfers the money to the landlord and receives a password from the lock, which will be valid from the moment of his arrival until the time of the county. The password is generated by the system and sent automatically by the dapp through Mixin Messenger. This scenario of the landlord shows that the landlord and tenant do not need a personal meeting to transfer the keys and it becomes possible to open the lock without transferring the key, which significantly reduces the necessary actions of the landlord to rent the property. Moreover, the landlord can reprogram his lock from anywhere in the world! Using Mixin, we reduce the time for the transfer of funds, as well as solve the problem of confirming the payment made and received.
#CONCLUSION
Despite the fact that every year more and more cities introduce legislative acts restricting the work of such services, the removal of apartments is gaining great popularity. More and more people prefer apartments to replace hotels. Therefore, rental services bring more profit to their creators. But such people can become even more if problems with the transfer of funds and the transfer of the key are solved. Thus solving these problems you can achieve a good profit. In the course of this project, all these tasks were solved, namely:

Creating a new service for renting housing
Reducing the time of transfer of funds
Confirmation of payment made and received
Minimizing action by the landlord
The ability to open the lock without transferring the usual key This service can be expanded for hotels, cars and other.
