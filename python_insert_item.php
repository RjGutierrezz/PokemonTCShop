
<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $name = escapeshellarg($_POST['name']);
    $age = escapeshellarg($_POST['supplier_id']);
    $email = escapeshellarg($_POST['email']);
    

    $command = 'python3 insert_new_item.py ' . $name . ' ' . $supplier_id . ' ' . $quantity. ' ' . $unit_price;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    //echo "<p>command: $command <p>"; 
    // run insert_new_item.py
    system($escaped_command);           
}
?>


