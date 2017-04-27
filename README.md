BerryIO SmartThings
=======

- **Description:** BerryIO SmartThings is a web browser based control system for the RaspberryPi
- **Project Website:** [GitHub](https://github.com/nicholaswilde/berryio-smartthings)
- **License:** GPL Version 3
- **Platform:** Tested on [Raspbian Wheezy](https://www.raspberrypi.org/downloads/raspbian/) (2015-05-05) and a Raspberry Pi B.
- **Requirements:** A Raspberry Pi running Raspbian and a web browser (Internet Explorer versions before 8 are not supported) and a SmartThings hub.

==
![overview](https://raw.githubusercontent.com/nicholaswilde/berryio-smartthings/master/art/screenshot.png)
![overview](https://raw.githubusercontent.com/nicholaswilde/berryio-smartthings/master/art/screenshot-berryio.png)

###Getting Started
[Installation Instructions](https://github.com/mauricetheferret/berryio-smartthings/wiki/Installation)

[Contributing Code](https://github.com/nicholaswilde/berryio-smartthings/blob/master/CONTRIBUTING_CODE)

###Project Details

The long term aim of BerryIO is to enable developers to control the Raspberry Pi and its GPIO ports remotely from any device with a browser, without ever needing to connect a screen or keyboard to the Pi itself. The new API mode extends this further enabling mobile apps, etc to be produced and control BerryIO.

The way BerryIO works is once the Raspberry Pi has booted up (or if the connectivity changes) it automatically connects to the main wired or one of the predefined wireless networks and emails the owner with a web link. They can then click the link and open the control panel in a browser (with their username and password).

There is also a command line interface, so you can issue commands directly to it over SSH or in scripting should you wish to.

For those interested in the technical details its mostly written in PHP which runs the back end for both the command line and the web browser interface (which is served with Apache). SPI control is written in C, the emailing is done with msmtp and the network can be managed by Raspians wpagui (although I hope to include functions in BerryIO to configure the network at some point).


###Features
- Full GPIO control including input/output mode switching and on off toggling.
- Support for Raspberry Pi Model A, Model B revision 1 and 2 (including both 256MB and 512MB versions) and Model B+.
- Ability to take photos and adjust camera settings (video coming soon).
- SPI DAC control and ADC values display.
- Control of HDD44780 or KS0066U compatible LCD's (and VFD's).
- Realtime CPU information display, including temperature.
- Realtime disk and memory usage information.
- Network status view showing connectivity, signal strength, etc.
- Command line interface which offers the same level of control as the web browser interface.
- Email notification with a link to the BerryIO web browser interface.
- Integrated upgrade system.
- API system for developing mobile apps.


###License Information

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see [http://www.gnu.org/licenses/](http://www.gnu.org/licenses/).

###Credits

- [NeonHorizon's BerryIO](https://github.com/NeonHorizon/berryio)
- [Ledridges's BerryIO](https://github.com/Ledridge/berryio)

SPI module based on code from the Gertboard test suite:
Copyright (C) Gert Jan van Loo & Myra VanInwegen 2012

