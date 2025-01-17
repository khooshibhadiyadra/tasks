<html>
    <title>

    </title>
    <body>
        <form action="registeration_database" method="POST">
            <h1>Registration Form</h1> 
            First Name:<input type="first_name" id="f_name"><br>
            Last Name:<input type="last_name" id="l_name"><br>
            Email:<input type="email_address" id="email_a"><br>
            Password:<input type="password" id="pass"><br>
            Confirm Password:<input type="password" id="confirm_pass"><br>
            Profile Image:<input type="file" id="profile_img"><br>
            Address:<input type="textarea" id="add"><br>
            Phone Number:<input type="number" id="ph_num"><br>
            Gender:
            <input type="radio" name="gender" id="gen" value="female">Female
            <input type="radio" name="gender" id="gen" value="male">Male
            <br>
            Hobby:
            <input type="checkbox" name="Reading" id="read" value="reading">Reading
            <input type="checkbox" name="writing" id="write" value="writing">Writing
            <input type="checkbox" name="drawing" id="draw" value="drawing">Drawing
            <br>
            Country:
            <select name="country" id="country">
                <option value="India">India</option>
                <option value="Australia">Australia</option>
                <option value="South Africa">South Africa</option>
                <option value="Canada">Canada</option>
                <option value="Germany">Germany</option>
            </select>
            <br>
            <input type="button" value="Submit">



        </form>
    </body>


</html>
