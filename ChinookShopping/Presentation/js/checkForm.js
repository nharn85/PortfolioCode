/**
 * Created by nmacdougall on 14-12-19.
 */
function checkForm()
{
    if(document.forms["register"].username.value.length ==0)
    {
        alert("You must enter a username");
        return false;
    }
    else if(document.forms["register"].password.value.length ==0)
    {
        alert("You must enter a password");
        return false;
    }
    else if(document.forms["register"].password2.value.length ==0)
    {
        alert("You must enter the password again");
        return false;
    }

    else
    {
        return true;
    }
}

function anyText(field,messageText,target) {
    var targetSpan = document.getElementById(target);
    if (targetSpan != null) {
        if (field.value.length == 0) {
            targetSpan.innerHTML = messageText;
            return false;
        }
        else {
            targetSpan.innerHTML = "";
            return true;
        }
    }

}