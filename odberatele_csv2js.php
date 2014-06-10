<?php

class OdberateleCsv2js
{
    CONST CSV_UTF8_FILE = 'data-odberatele.csv';
    CONST OUTPUT_FILE = 'data-odberatele.js';

    CONST LINE_PER_ROW = 17;

    public function readCsvData()
    {

        $y = $i = 0;
        $data = array();
        $file = file_get_contents(self::CSV_UTF8_FILE);
        $row = explode(';', $file);


        foreach ($row as $key => $val) {

            $line[$y][$i++] = $val;

            if ($key % self::LINE_PER_ROW == (self::LINE_PER_ROW - 1)) {
                $y++;
            }
        }


        file_put_contents(self::OUTPUT_FILE, json_encode($line));

    }
}

$od = new OdberateleCsv2js();
$od->readCsvData();