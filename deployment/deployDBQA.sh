#!/bin/bash

# extract package in a temp dir, put files into a temp files dir, put files to be seen on frontend
sshpass -p 'password490' scp /home/cristina/testtar/* winonaVM2@25.65.205.84:/home/winonaVM2/testtar

sshpass -p 'password490' ssh winonaVM2@25.65.205.84 'cd ~/temp; echo 'password490' | sudo -S cp ~/testtar/\'$1' ./; tar -xf \'$1'; cd ~/database; echo 'password490' | sudo -S cp db.service /usr/bin; sudo cp db.service /etc/systemd/system/; echo 'password490' | sudo -S systemctl restart db.service'
