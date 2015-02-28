function deleteEmployee(){
    if(document.forms["deleteForm"])
        {
            $result = confirm("Are you sure you want to delete?");

            if($result == 1)
                return true;
            else
                return false;
        }
}