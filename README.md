rpi-motion-cam
==============
Version 0.1: Todo: Update the motion_cam.c to write files to the /var/www/img folder. Currently it is just writing messages to the console.

Raspberry Pi Motion Cam
----
A motion activated camera for Raspberry Pi, based on the [Motion Sensing Camera](https://www.youtube.com/watch?v=nWYujjsWb_A) project from @misperry.

Instructions below based on our current setup, your mileage may vary.

Hardware
-----
* Raspberry Pi Model B
* Radioshack PIR Sensor

*Connecting the PIR Sensor*
The PIR sensor is extremely simple, with just a few pins to worry about: VCC / GND / OUT. 

For beginners, you can find the corresponding GPIO pins via the [documentation](http://www.raspberrypi.org/documentation/usage/gpio/)

* VCC: Connect to either the 3.5V or a 5V GPIO pin. 
* GND: Connect to a Ground pin. 
* OUT: Connect to an input/output pin. In this code example, we used pin 8.

Creating the Project
--------
Since we'll be using a webserver to view the images, we will set that up first.

**Setting up the web server**

We use Apache2 on the Raspberry Pi to be able to serve up the images taken with the camera.

A great guide on setting up Apache2 is avialable on [Instructables](http://www.instructables.com/id/Raspberry-Pi-Web-Server/step7/Install-Apache-with-PHP/)

By default, your website will be serving up from `/var/www`

To match this repos setup, create 2 new folders via 
```
   sudo mkdir /var/www/img
   sudo mkdir /var/www/css
```

Now you'll need to copy the files under the `web` folder found in this repo:

```
   sudo cp web/index.php /var/www/index.php 
   sudo cp web/css/gallery.css /var/www/css/gallery.css
```
Your web server should be up and running. Head over to [http://localhost/index.php](http://localhost/index.php) to verify.

**Creating the app**

The app is a C project, so you'll need to install and build the bcm2835 header library files (ex. for 1.38).

Full instructions available at [airspayce.com](http://www.airspayce.com/mikem/bcm2835/), but if you're in a hurry follow the steps below

``` 
   wget http://www.airspayce.com/mikem/bcm2835/bcm2835-1.38.tar.gz
   tar zxvf bcm2835-1.xx.tar.gz
   cd bcm2835-1.xx
   ./configure
   make
   sudo make check
   sudo make install
```

Now,  build the app from the file in this project `motion_cam.c`

```
   gcc -o motion_cam motion_cam.c -l bcm2835
   sudo ./motion_cam
```

That's it. Your camera should be snapping pics and saving them to your local webserver.

