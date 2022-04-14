#!/bin/bash

#tar -cf testing.tar testDir

#sshpass -p 'IT490pass' scp testing.tar cristina@25.81.36.24:/home/cristina/

#open ini file here and parse it for loop 
#zip up every file instead of testing/*

#CONFIG=app.conf
#pw=$(awk '/^password/{print $3}' "${CONFIG}")
#user=$(awk '/^user/{print $3}' "${CONFIG}")

#awk -F':' '{ print $1 }' package.ini

#sed -ne '/\[package\]/ p' < package.ini
#sed -n '/\[package]/ { /^[^[]/ p;}' package.ini 


#source package.ini

while read line; do echo $line; tar --append --file=/home/winonapatrick/winonapatrick/testing/package1.tar "$line" ; done < package.ini

#cat package.ini | sed -n "/^package/" | head -n-1
#ps | sed -n '/^package/ {p;q}' package.ini

#tar -czf /home/winonapatrick/winonapatrick/testing/package.tar /home/winonapatrick/winonapatrick/testing/

