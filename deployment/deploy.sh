#!/bin/bash

#send to deployment server
sshpass -p 'IT490pass' scp /home/winonapatrick/winonapatrick/backups/* cristina@25.81.36.24:/var/www/sample


#rm local copy 
rm -r /home/winonapatrick/winonapatrick/backups/*
