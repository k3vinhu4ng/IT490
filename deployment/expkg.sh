#!/bin/bash

# extract package in a temp dir, put files into a temp files dir, put files to be seen on frontend
sshpass -p 'it490' scp /home/cristina/testtar/* kevin@25.81.19.5:/home/kevin/testtar

sshpass -p 'it490' ssh kevin@25.81.19.5 'cd ~/temp; cp ~/testtar/\'$1' ./; tar -xf \'$1'; cd ~/tempfiles; cp ~/temp/*/* ./; ./testRabbitMQServer.php'
