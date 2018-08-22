<?php

class Excel2html {
    /* variables */

    var $pathin;
    var $workbook;
    var $sheet;
    var $range;
    var $celladdress;

    /* Constructor */

    function excel2html()
    { 
        // Instantiate Excel
        $this->ex = new COM("Excel.sheet") or Die ("Did not instantiate Excel");

        return 1;
    } 

    function XL($workbook, $pathin = "", $sheet = "Sheet1")
    {
        if ($workbook) {
            // Load the workbook
            $wkb = $this->ex->application->Workbooks->Open($pathin . $workbook) or Die ("Did not open $pathin $workbook");
        } else {
            // New workbook
            $wkb = $this->ex->application->Workbooks->Add or Die ("Unable to add a workbook");
        } 

        if ($sheet) {
            // Activate the sheet
            $sheets = $wkb->Worksheets($sheet) or Die ("Unable to activate $sheet");
        } else {
            // new sheet
            $sheet = "Sheet1" ;
        } 
        // Excel Won't prompt the user when replacing or closing workbooks
        // Comment the line below if you want Excel to prompt
      //$this->ex->application->DisplayAlerts = "False";
        return 1;
    } 

    function readrange($sheet = "Sheet1", $range)
    { 
        // Read all the cells in the range to $result and return it
        unset ($result);

        $range = trim($range); 
        // Determine start and end of range
        $tokstart = strtok($range, ":");
        $tokend = strtok(":");
        if ($tokend == "") {
            // Read one single cell
            $sheets = $this->ex->Application->Worksheets($sheet);
            $sheets->activate; 
            // Select the cell
            $selcell = $sheets->Range($range);
            $selcell->activate;
            return $selcell->value;
        } 
        // Read a range of cells
        // determine column and row numbers
        $sheets = $this->ex->Application->Worksheets($sheet);
        $sheets->activate;
        $rgstart = $sheets->range($tokstart);
        $colstart = $rgstart->column;
        $rowstart = $rgstart->row;
        $rgend = $sheets->range($tokend);
        $colend = $rgend->column;
        $rowend = $rgend->row;
        if ($colstart > $colend or $rowstart > $rowend) {
            Print ("Notation Error! Cell Column/Row should be increasing.");
            return;
        } 
        // Now read each cell
        if ($colstart == $colend) {
            // Read Vertically
            $j = 0;
            For ($i = $rowstart; $i <= $rowend; $i++) {
                $selcell = $sheets->cells($i, $colstart);
                $selcell->activate;
                $result[$j] = $selcell->value;
                $j++;
            } 
        } else {
            // Read vertically
            $k = 0;
            For ($l = $rowstart; $l <= $rowend; $l++) {
                // Read horizontally
                $j = 0;
                For ($i = $colstart; $i <= $colend; $i++) {
                    $selcell = $sheets->cells($rowstart, $i);
                    $selcell->activate;
                    $result[$j] = $selcell->value; 
                    // echo "result:$result[$j]<br>";
                    $j++;
                } 
                $resultArray[$k] = $result;
                $rowstart++;
                $k++;
            } 
        } 

        return $resultArray;
    } 
    // Returns the file name
    function myfile($pathin)
    {
        $pathComponent = explode("\\", $pathin);
        for($i = 0;$i < count($pathComponent)-1;$i++)
        if (!$path)
            $path = $pathComponent[$i];
        else
            $path = $path . "\\" . $pathComponent[$i];

        return $workbook = $pathComponent[count($pathComponent)-1];
    } 
    // Returns the file path
    function mypath($pathin)
    {
        $pathComponent = explode("\\", $pathin);
        for($i = 0;$i < count($pathComponent)-1;$i++)
        if (!$path)
            $path = $pathComponent[$i];
        else
            $path = $path . "\\" . $pathComponent[$i];

        return $pathin = $path . "\\";
    } 
    // Returns the Starting Cell String value
    function getCellString($celladdress)
    {
        for($i = 1;$i <= strlen($celladdress);$i++) {
            if (is_numeric(substr($celladdress, - ($i)))) {
                $cellStr = substr($celladdress, 0, strlen($celladdress) - $i);
            } 
        } 
        return $cellStr;
    } 
    // Returns the starting cell Numeric value
    function getCellNum($celladdress)
    {
        for($i = 1;$i <= strlen($celladdress);$i++) {
            if (is_numeric(substr($celladdress, - ($i))))
                $cellnum = substr($celladdress, - $i) ;
        } 
        return $cellnum;
    } 

    function closexl()
    { 
        // Close active workbook without prompt from Excel
        $this->ex->application->ActiveWorkbook->Close("False");
        return 1;
    } 
} 
/* end of Excel class */

?>

