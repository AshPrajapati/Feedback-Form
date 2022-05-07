# Feedback-Form

Config Folder contains database.php
```
<?php
define('DB_HOST','localhost');
define('DB_USER','YOUR_NAME');
define('DB_PASS','YOUR_PASSWORD');
define('DB_NAME','YOUR_DB_NAME');


$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($conn->connect_error)
{
    die('Connection failed' . $conn->connect_error);
}


?>
```

In the place 'YOUR_NAME' replace with the Database_USER_NAME
And similarly for others

Technologies Used:
PHP 
MySQL
HTML,CSS,BootStrap


Screenshots:

**Home Page**
![Screenshot 2022-05-07 191316](https://user-images.githubusercontent.com/66628943/167257148-c22047d0-642d-49e9-a598-72fad3f3edba.png)

<hr>

**Past Feedback Page**
![Screenshot 2022-05-07 191516](https://user-images.githubusercontent.com/66628943/167257215-33c4f3f5-abe9-4a82-a12c-d54aa0650340.png)

<hr>

![Screenshot 2022-05-07 191448](https://user-images.githubusercontent.com/66628943/167257223-67d25e9a-67b5-4e25-8341-143c0c7368c8.png)

![Screenshot 2022-05-07 191537](https://user-images.githubusercontent.com/66628943/167257231-70c73d08-42f9-4c8d-84f6-091a91354cd5.png)

