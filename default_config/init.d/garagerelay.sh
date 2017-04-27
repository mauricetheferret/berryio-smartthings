#! /bin/bash
# /etc/init.d/garagerelay

case "$1" in
start)
echo "Starting Relay"
echo "17" > /sys/class/gpio/export
echo "high" > /sys/class/gpio/gpio17/direction
echo "22" > /sys/class/gpio/export
echo "high" > /sys/class/gpio/gpio22/direction
;;
stop)
echo "Stopping Relay"
;;
*)
echo "Usage: /etc/init.d/garagerelay.sh {start|stop}"
exit 1
;;
esac
exit 0
