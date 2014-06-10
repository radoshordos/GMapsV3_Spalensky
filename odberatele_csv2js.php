<?php

class OdberateleCsv2js
{
    CONST CSV_UTF8_FILE = 'data-odberatele.csv';
    CONST OUTPUT_FILE = 'data-odberatele.js';

    public function readCsvData()
    {

        $i = 0;
        $row = array();
        $file = file_get_contents(self::CSV_UTF8_FILE);
        $line = explode('\r', $file);


        echo count($line);

        foreach ($line as $val) {
            $row = explode(';', $val);
            file_put_contents(self::OUTPUT_FILE, $row[2]);

        }
    }
}

$od = new OdberateleCsv2js();
$od->readCsvData();