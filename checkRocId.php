<?php
function checkRocId($id)
{

    if (strlen($id) != 10) return false;

    $id = strtoupper($id);
    $first = substr($id, 0, 1);
    $sec = substr($id, 1, 1);

    $id_head = array(
        'A' => 10, 'B' => 11, 'C' => 12, 'D' => 13, 'E' => 14,
        'F' => 15, 'G' => 16, 'H' => 17, 'J' => 18, 'K' => 19,
        'L' => 20, 'M' => 21, 'N' => 22, 'P' => 23, 'Q' => 24,
        'R' => 25, 'S' => 26, 'T' => 27, 'U' => 28, 'V' => 29,
        'W' => 30, 'X' => 31, 'Y' => 32, 'Z' => 33, 'I' => 34,
        'O' => 35
    );

    $id_head_foreign = array(
        'A' => 0,
        'B' => 1,
        'C' => 2,
        'D' => 3
    );

    $n0 = $id_head[$first];
    $n[] = '0';
    $n[] = substr($n0, 0, 1);
    $n[] = substr($n0, 1, 1);

    for ($lop1 = 1; $lop1 < strlen($id); $lop1++) {
        $n[] = substr($id, $lop1, 1);
    }

    // foreign
    if (!is_numeric($sec) && ($sec == "A" || $sec == "B" || $sec == "C" || $sec == "D")) {
        $n[3] = $id_head_foreign[$sec];
    }

    $result = ($n[1] + ($n[2] * 9) + ($n[3] * 8) + ($n[4] * 7) + ($n[5] * 6) + ($n[6] * 5) + ($n[7] * 4) + ($n[8] * 3) + ($n[9] * 2) + $n[10] + $n[11]) % 10;

    return $result == 0 ? true : false;
}
