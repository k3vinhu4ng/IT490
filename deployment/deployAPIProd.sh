#!/bin/bash

# extract package in a temp dir, put files into a temp files dir, put files to be seen on frontend
sshpass -p 'password490' scp /home/cristina/testtar/* kalsoom@25.69.174.119:/home/kalsoom/testtar

sshpass -p 'password490' ssh kalsoom@25.69.174.119 'cd ..; cd ~/temp; echo 'password490' | sudo -S cp ~/testtar/\'$1' ./; sudo tar -xf \'$1' --overwrite; cd ~/dmz; echo 'password490' | sudo -S systemctl restart dmz.service'
