#!/bin/bash

#tar -cf testing.tar testDir

#sshpass -p 'IT490pass' scp testing.tar cristina@25.81.36.24:/home/cristina/

#tar -czf /home/cristina/realtest/package.tar /home/cristina/realtest/

while read line; do echo $line; tar --append --file=/home/kevin/testing/package.tar "$line" ; done < package.ini
