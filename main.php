<?php
function compareFiles($file1, $file2, $output1, $output2) {
    $handle1 = fopen($file1, "r");
    $handle2 = fopen($file2, "r");
    $out1 = fopen($output1, "w");
    $out2 = fopen($output2, "w");

    if (!$handle1 || !$handle2 || !$out1 || !$out2) {
        die("Error opening files.\n");
    }

    $line1 = fgets($handle1);
    $line2 = fgets($handle2);

    while ($line1 !== false || $line2 !== false) {
        if ($line1 === false) {
            fwrite($out2, $line2);
            $line2 = fgets($handle2);
        } elseif ($line2 === false) {
            fwrite($out1, $line1);
            $line1 = fgets($handle1);
        } elseif (trim($line1) < trim($line2)) {
            fwrite($out1, $line1);
            $line1 = fgets($handle1);
        } elseif (trim($line1) > trim($line2)) {
            fwrite($out2, $line2);
            $line2 = fgets($handle2);
        } else {
            $line1 = fgets($handle1);
            $line2 = fgets($handle2);
        }
    }

    fclose($handle1);
    fclose($handle2);
    fclose($out1);
    fclose($out2);
}

compareFiles("input1.txt", "input2.txt", "output1.txt", "output2.txt");
