#!/bin/bash


sshpass -p 'it490password' scp /home/kevin1/testing/* cristina@25.81.36.24:/home/cristina/testtar

rm -r /home/kevin1/testing/*

