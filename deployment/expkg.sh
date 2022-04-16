#!/bin/bash

sshpass -p 'IT490pass' ssh cristina@25.81.36.24 'cd ~/temp; cp ~/testtar/\'$1' ./; tar -xf \'$1'; cd ~/tempfiles; cp ~/temp/testfiles/* ./'
