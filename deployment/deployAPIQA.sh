#!/bin/bash

# extract package in a temp dir, put files into a temp files dir, put files to be seen on frontend
sshpass -p 'password490' scp /home/cristina/testtar/* winona@25.11.71.89:/home/winona/testtar

sshpass -p 'password490' ssh winona@25.11.71.89 'cd ..; cd ~/temp; echo 'password490' | sudo -S cp ~/testtar/\'$1' ./; tar -xf \'$1'; sudo cp ~/temp/*/* ./; echo 'password490' | sudo -S cp dmz.service /usr/bin/; sudo cp dmz.service /etc/systemd/system/; echo 'password490' | sudo -S systemctl restart dmz.service'
