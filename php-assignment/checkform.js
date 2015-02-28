/**
 * Created by nmacdougall on 14-11-20.
 */
function checkForm()
{
    if(document.forms["edit"].emp_no.value.length ==0)
    {
        alert("You must enter an employee number");
        return false;
    }
    else if(document.forms["edit"].birth_date.value.length ==0)
    {
        alert("You must enter a birth date");
        return false;
    }
    else if(document.forms["edit"].first_name.value.length ==0)
    {
        alert("You must enter a first name");
        return false;
    }
    else if(document.forms["edit"].last_name.value.length ==0)
    {
        alert("You must enter a last name");
        return false;
    }
    else if(document.forms["edit"].gender.checked == true)
    {
        alert("You must choose male or female");
        return false;
    }
    else if(document.forms["edit"].hire_date.value.length ==0)
    {
        alert("You must enter a hire date");
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
