#!/bin/bash

# extract package in a temp dir, put files into a temp files dir, put files to be seen on frontend
sshpass -p 'password490' scp /home/cristina/testtar/* viktoriya@25.80.95.153:/home/viktoriya/testtar

sshpass -p 'password490' ssh viktoriya@25.80.95.153 'cd ~/temp; echo 'password490' | sudo -S cp ~/testtar/\'$1' ./; tar -xf \'$1'; cd ~/tempfiles; sudo cp ~/temp/*/* ./; cd /var/www/sample; sudo cp ~/tempfiles/* ./; echo 'password490' | sudo -S systemctl restart apache2'
