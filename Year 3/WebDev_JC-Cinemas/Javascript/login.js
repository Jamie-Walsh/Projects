    function validateForm()
    {
        var validate = true;

        //First Name
        document.getElementById('name_error').innerHTML = "";
        var name = document.getElementById('name_text').value;
        if(name != "")
        {
            if (/^[A-Za-z]+$/.test(name) == false) //check if the input has numbers in it
            {
                document.getElementById('name_error').innerHTML = "Must contain letters only";
                return false;
            }
        }
        else
        {
            document.getElementById('name_error').innerHTML = "Must be filled in";
            return false;
        }

        //Second Name
        document.getElementById('sur_error').innerHTML = "";
        var sur = document.getElementById('sur_text').value;
        if(sur != "")
        {
            if (/^[A-Za-z]+$/.test(sur) == false) //check if the input has numbers in it
            {
                document.getElementById('sur_error').innerHTML = "Must contain letters only";
                return false;
            }
        }
        else
        {
            document.getElementById('sur_error').innerHTML = "Must be filled in";
            return false;
        }

        //Address
        document.getElementById('addr_error').innerHTML = "";
        var addr = document.getElementById('addr_text').value;
        if(addr == "")
        {
            document.getElementById('addr_error').innerHTML = "Must be filled in";
            return false;
        }

        //Date of birth
        document.getElementById('Date_error').innerHTML = "";
        var day = document.getElementById('day_text').value;
        var month = document.getElementById('m_text').value;
        var year = document.getElementById('y_text').value;

        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        m++;

        if(year > y)
        {
            document.getElementById('Date_error').innerHTML = "Date cannot be in the future";
            return false;
        }
        else if(year == y)
        {
            if(month > m)
            {
                document.getElementById('Date_error').innerHTML = "Date cannot be in the future";
                return false;
            }
            else if(month == m)
            {
                if(day > d)
                {
                    document.getElementById('Date_error').innerHTML = "Date cannot be in the future";
                    return false;
                }
            }
        }
        else if(year == "" || month == "" || day == "" || year < "1" || month < "1" || day < "1" )
        {
            document.getElementById('Date_error').innerHTML = "Date must be filled in";
            return false;
        }
        else
        {
            if(month >= 01 && month <= 12)
            {
                if(month == 02)
                {
                    if(day >= 01 && day <= 29)
                    {
                        if(day == 29)
                        {
                            if(isLeapYear(year) == false)
                            {
                                document.getElementById('Date_error').innerHTML = "Not a valid date";
                                return false;
                            }
                        }
                    }
                    else
                    {
                        document.getElementById('Date_error').innerHTML = "Not a vaild date";
                        return false;
                    }
                }

                if(month == 01 || month == 03 || month == 05 || month == 07 || month == 08 || month == 10 || month == 12)
                {
                    if(day > 31 || day < 01)
                    {
                        document.getElementById('Date_error').innerHTML = "Not a valid date";
                        return false;
                    }

                }
                else if(month == 04 || month == 06 || month == 09 || month == 11)
                {
                   if(day > 30 || day < 01)
                    {
                        document.getElementById('Date_error').innerHTML = "Not a valid date";
                        return false;
                    }
                }
            }
        }

        //Email
        document.getElementById('email_error').innerHTML = "";
        var email = document.getElementById('email_text').value;
        if(email != "")
        {
            if (/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/.test(email) == false)
            {
                document.getElementById('email_error').innerHTML = "Email must contain valid character followed by an @ follwed my a vaild ending";
                return false;
            }

        }
        else
        {
            document.getElementById('email_error').innerHTML = "Email must be filled in";
            return false;
        }

        //Username
        document.getElementById('user_error').innerHTML = "";
        var user = document.getElementById('user_text').value;
        if(user != "")
        {
            if (/^.*[^\s{1,}]\s.*/.test(user) == true)
            {
                document.getElementById('user_error').innerHTML = "Username cannot contain a space";
                return false;
            }

        }
        else
        {
            document.getElementById('user_error').innerHTML = "Must be filled in";
            return false;
        }

        //Password
        document.getElementById('pass_error').innerHTML = "";
        var pass = document.getElementById('pass_text').value;
        if(pass != "")
        {
            if (/^.*[^\s{1,}]\s.*/.test(pass) == true)
            {
                document.getElementById('pass_error').innerHTML = "Password cannot contain a space";
                return false;
            }

        }
        else
        {
            document.getElementById('pass_error').innerHTML = "Must be filled in";
            return false;

        }


    }


    function isLeapYear(year){
        return_value = true;

    // There is no leap year if the year is not divisible by 4
        if ((year % 4) != 0)
            return_value = false;

    // There is no leap year if the year is divisible by 100 but not 400
        else if (((year % 100) == 0) & ((year % 400) != 0))
            return_value = false;

        return return_value;
    }
