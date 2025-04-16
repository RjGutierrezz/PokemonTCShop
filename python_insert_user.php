<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    
    $output = shell_exec("python3 insert_new_user.py " . escapeshellarg($name) . " " . escapeshellarg($age) . " " . escapeshellarg($email));
    echo $output;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    echo "<p>command: $command <p>"; 
    // run insert_new_item.py
    system($escaped_command);           
}
?>
