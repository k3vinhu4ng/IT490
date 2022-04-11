#!/bin/bash


sshpass -p 'IT490pass' scp /home/winonapatrick/winonapatrick/testing/* cristina@25.81.36.24:/var/www/sample


rm -r /home/winonapatrick/winonapatrick/testing/*
