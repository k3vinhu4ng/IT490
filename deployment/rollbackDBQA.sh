#!/bin/bash

# need to change service so that the path is this one
sshpass -p 'password490' ssh kevin@25.81.19.5 'cd ~/temp; cp ~/testtar/\'$1' ./; tar -xf \'$1'; cd ~/tempfiles; cp ~/temp/*/* ./; echo 'password' | sudo -S systemctl restart db.service'

#need to remove the files that came from bad package 

#need to scp to put pack working version


