#!/bin/bash

cd /home/kevin/testing
#move to temp folder
tar -xf *.tar
# extract
rm *.tar
#remove the tar
cd *
#go into directory you just extracted
cp * /var/www/sample
#copy to var
