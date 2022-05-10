#!/bin/bash

sshpass -p 'password490' ssh winona@25.16.33.129 'cd ..; cd temp; echo 'password490' | sudo -S cp ~/testtar/\'$1' ./; sudo tar -xf \'$1' --overwrite; cd ~/database; echo 'password490' | sudo -S systemctl restart db.service'
