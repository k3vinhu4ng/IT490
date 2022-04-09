tar -cf testing.tar testDir

#send .tar file to deployment server
sshpass -p 'IT490pass' scp testing.tar cristina@25.81.36.24:/home/cristina/

