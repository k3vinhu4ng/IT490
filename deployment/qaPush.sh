#send from deployment to QA
sshpass -p 'IT490pass' scp /home/cristina/testing/* kevin@25.81.19.5:/var/www/sample
#putting kevin's ip here for now, not sure whose machine we're using for QA

rm -r /home/cristina/testing/*
#after sending, remove from cris

