#!/bin/bash

# extract package in a temp dir, put files into a temp files dir, put files to be seen on frontend
sshpass -p 'password490' scp /home/cristina/testtar/* winonapatrick@25.78.225.85:/home/winonapatrick/testtar

sshpass -p 'password490' ssh winonapatrick@25.78.225.85 'cd ~/temp; echo 'password490' | sudo -S cp ~/testtar/\'$1' ./; tar -xf \'$1'; cd ~/tempfiles; sudo cp ~/temp/*/* ./; cd /var/www/sample; sudo cp ~/tempfiles/* ./; echo 'password490' | sudo -S systemctl restart apache2'
