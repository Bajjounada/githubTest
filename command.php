<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["command"])) {
    //$command = escapeshellarg($_POST["command"]);
    $python_script = 'C:\\xampp\\htdocs\\Music\\music_control.py'; // Adjust the path as necessary

    $cmd = "python $python_script";
    exec($cmd, $output, $return_var);

    if ($return_var !== 0) {
        echo "Error: Command execution failed with return code $return_var\n";
    } else {
        echo "Command executed successfully: " . implode("\n", $output);
    }
}
?>
