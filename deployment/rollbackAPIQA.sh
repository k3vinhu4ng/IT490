#!/bin/bash

sshpass -p 'password490' ssh winona@25.11.71.89 'cd ..; cd ~/temp; echo 'password490' | sudo -S cp ~/testtar/\'$1' ./; sudo tar -xf \'$1' --overwrite; cd ~/dmz; echo 'password490' | sudo -S systemctl restart dmz.service'
