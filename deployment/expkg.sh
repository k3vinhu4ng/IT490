#!/bin/bash

# extract package in a temp dir, put files into a temp files dir, put files to be seen on frontend
sshpass -p 'IT490pass' ssh cristina@25.81.36.24 'cd ~/temp; cp ~/testtar/\'$1' ./; tar -xf \'$1'; cd ~/tempfiles; cp ~/temp/*/* ./; cd /var/www/sample; cp ~/tempfiles/* ./'
