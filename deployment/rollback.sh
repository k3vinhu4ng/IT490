#!/bin/bash

#this line removes the package
sshpass -p 'IT490pass' ssh cristina@25.81.36.24 'cd ~/temp; cp ~/testtar/\'$1' ./; tar -xf \'$1'; cd ~/tempfiles; cp ~/temp/*/* ./; cd /var/www/sample; cp ~/tempfiles/* ./'

#need to remove the files that came from bad package 

#need to scp to put pack working version


