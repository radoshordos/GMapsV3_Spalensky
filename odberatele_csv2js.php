<?php

class OdberateleCsv2js
{
    CONST CSV_UTF8_FILE = 'data-odberatele.csv';
    CONST OUTPUT_FILE = 'data-odberatele.js';

    CONST LINE_PER_ROW = 17;

    public function readCsvData()
    {


        $fin = '';
        $y = $i = 0;
        $arr = explode("\r\n", file_get_contents(self::CSV_UTF8_FILE));


        foreach ($arr as $val) {
            $row = explode(";", $val);
            $i = 0;
            foreach ($row as $col) {

                $line[$y][$i++] = $col;
            }
            $y++;
        }


        foreach ($line as $row) {


            if (count($row) == 17) {

                $arr = array($row[11], $row[12],"'".$row[2]."'");
                $fin .= "[" . implode(",", $arr) . "],\n";
            }
        }


        file_put_contents(self::OUTPUT_FILE, $fin);

    }
}

$od = new OdberateleCsv2js();
$od->readCsvData();