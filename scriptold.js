function Validation()
{
    if(!document.getElementById('fname').value)
    {
        alert('First name is empty');
        return false;
    }
    if(!document.getElementById('lname').value)
    {
        alert('Last name is empty');
        return false;
    }
    if(!document.getElementById('uname').value)
    {
        alert('User name is empty');
        return false;
    }
    if(!document.getElementById('password').value)
    {
        alert('Password is empty');
        return false;
    }

    if(!document.getElementById('phone').value)
    {
        alert('Phone number is empty');
        return false;
    }
    if(!document.getElementById('mail').value)
    {
        alert('E-mail is empty');
        return false;
    }

    var password=document.getElementById('password').value;
    if(password.length>8)
    {
        alert('Password length exceeds 8');
        return false;
    }

    var cap=0,num=0;
    for(var i=0;i<password.length;i++)
    {
        if(!isNaN(password.charAt(i)))
            num++;
        else if(password.charAt(i)==password.charAt(i).toUpperCase())
            cap++;
    }
    if(num==0)
    {
        alert('No number in password');
        return false;
    }
    if(cap==0)
    {
        alert('No Capital Letter');
        return false;
    }

    var phone=document.getElementById('phone').value;
    if(phone.length==10)
    {
        for(var i=0;i<10;i++)
        {
            if(isNaN(phone.charAt(i)))
            {
                alert('Phone number contains non numeric character');
                return false;
            }
        }
    }

    if(phone.length<10 || phone.length>12)
    {
        alert('Invalid length of Phone number');
        return false;
    }
    if(phone.length===12)
    {
        if(phone.charAt(3)!==phone.charAt(7))
        {
            alert('Improper delimetter');
            return false;
        }

        var n=0,d=0;
        for(var i=0;i<10;i++)
        {
            if(!isNan(phone.charAt(i)))
                n++;
            if(phone.charAt(i)===' ' || phone.charAt(i)==='-')
                d++;
        }
        if(n===10 && d===2)
        {
            console.log('ok');
        }
        else
        {
            alert('Invalid Format of Phone number. Enter again');
            return false;
        }
    }

    var mail=document.getElementById('mail').value;

    if(mail.indexOf('@')!==mail.lastIndexOf('@'))
    {
        alert('Multiple @ present. Invalid Mail');
        return false;
    }

    var domain=mail.substring(mail.indexOf('@')+1,mail.indexOf('.'));
    if(domain.length <= 3 && domain.length >= 5 )
    {
        alert('Invalid Domain name');
        return false;
    }
    return true;

}


var submit = document.getElementById('submit');
    submit.addEventListener('click', () => {
        Validation();
        if(Validation()) {
            alert(document.getElementById('fname').value + " " + document.getElementById('lname').value + " " + document.getElementById('uname').value + " " + document.getElementById('password').value + " " + document.getElementById('phone').value + " " + document.getElementById('mail').value)

        }
    });




