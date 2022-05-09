#!/bin/bash

# extract package in a temp dir, put files into a temp files dir, put files to be seen on frontend
sshpass -p 'password490' scp /home/cristina/testtar/* vik@25.51.177.54:/home/vik/testtar

sshpass -p 'password490' ssh vik@25.51.177.54 'cd ..; cd temp; echo 'password490' | sudo -S cp ~/testtar/\'$1' ./; sudo tar -xf \'$1' --overwrite; cd ~/database; echo 'password490' | sudo -S systemctl restart db.service'
