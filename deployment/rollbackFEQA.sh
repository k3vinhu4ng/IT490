#!/bin/bash

sshpass -p 'password490' ssh winonapatrick@25.78.225.85 'cd ~/temp; echo 'password490' | sudo -S cp ~/testtar/\'$1' ./; tar -xf \'$1'; cd ~/tempfiles; sudo cp ~/temp/*/* ./; cd /var/www/sample; sudo cp ~/tempfiles/* ./; echo 'password490' | sudo -S systemctl restart apache2'
