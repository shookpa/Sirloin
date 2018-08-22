<?php
/*
* Select data from a mysql database and export it to a file or send it to the browser / excel
* Usage:
*
* select the data from the table
* 1st option short query: 			$xls_xml->short_query('db_name','table_name');
* 2nd option short query extended: 	$xls_xml->short_query('db_name','table_name',array('first_field','second_field'),' ORDER BY first_field LIMIT 50');
* 3rd option long query 			$xls_xml->long_query('db_name','SELECT * FROM table_name WHERE field > 0 AND field < 100 ORDER BY other_field LIMIT 1');
*
* set the filename of the outputted file and create it
* $xls_xml->save_as('output.xml'); 
*
* send the data to browser / excel (it works with libre office too)
* $xls_xml->to_excel('output_to_browser.xml');
*/
class excel_xml{

	var $titles;
	var $data;
	var $num_fields;
	var $output_file_name;
	var $xml_template;
	
	/*
	* Credentials for mysql connection
	*/
	var $mysqlServer = 'localhost';
	var $mysqlUsr = 'idisadmo_sirloin';
	var $mysqlPsswrd = 'S1rl01n';

	function dbConnect( $dbase ) {
	
		$db = mysql_connect($this->mysqlServer,$this->mysqlUsr,$this->mysqlPsswrd) or die  (mysql_error());
		mysql_select_db($dbase,$db);
		return $db;
	}

	function doQuery( $query, $dbase) {
	
		$db = $this->dbConnect($dbase);
		$result = mysql_query($query, $db) or die(mysql_error());
		return $result;
		
	}

	/*
	* retrieves the selected field names 
	*/
    function mysql_field_array( $query ) {
   
        $field = mysql_num_fields( $query );
   
        for ( $i = 0; $i < $field; $i++ ) {
       
            $names[] = mysql_field_name( $query, $i );
       
        }
       
        return $names;
   
    }

	/*
	* create the query string with the passed parameters
	*/
	function short_query( $db, $table, $fields=array(), $extra='' ) {
	
		(empty($fields)) ? $f = '*' : $f = implode(',',$fields);
		
		$query = "SELECT {$f} FROM {$table} {$extra}";
		
		$res = $this->doQuery($query, $db);
		
		$this->set_titles($res);
	
	}
	
	/*
	* create the query string with the passed parameters
	*/
	function long_query( $db, $query ) {
		
		$res = $this->doQuery($query, $db);
		
		$this->set_titles($res);
	
	}
	
	/*
	* set the titles of the excel columns
	*/
	function set_titles ( $res ) {
	
		$arr_titles = $this->mysql_field_array($res);
		
		if(is_array($arr_titles)) {
		
			foreach($arr_titles as $key=>$val) {
			
				$this->titles .= '<ss:Cell  ss:StyleID="s27"><Data ss:Type="String">'.$val.'</Data></ss:Cell>'.chr(10);
				$this->num_fields++;
			
			}
		
		}
		
		$this->set_data( $res );
	
	}
	
	/*
	* set the data in the excel columns
	*/
	function set_data ( $res ) {

		while ($row = mysql_fetch_array($res, MYSQL_NUM)) {
        
            $this->data .= '<ss:Row>'.chr(10);
			for($i = 0; $i < $this->num_fields; $i++) {
				(is_numeric($row[$i])) ? $p = 'Number' : $p = 'String';
				$this->data .= '<ss:Cell><Data ss:Type="'.$p.'">'.htmlentities($row[$i]).'</Data></ss:Cell>'.chr(10);
			}
			$this->data .= '</ss:Row>'.chr(10);
        
        }
		
		$this->export();
	
	}
	
	/*
	* saves the xml file with the given filename (be sure folder is writable)
	*/
	function save_as ( $fn ) {
	
		$this->output_file_name = $fn;
		file_put_contents($this->output_file_name, $this->xml_template);
	
	}

	/*
	* set the data in the xml template
	*/
	function export (  ) {
	
		if($this->output_file_name=='') $this->output_file_name = 'output.xml';
		$this->xml_template = file_get_contents('template.xml');
		$this->xml_template = str_replace('{columns}', $this->titles, $this->xml_template);
		$this->xml_template = str_replace('{data}', $this->data, $this->xml_template);
	
	}
	
	/*
	* send the data to browser / excel
	*/
	function to_excel( $fn ) {
	
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment;filename=".$fn);
		echo($this->xml_template);
	
	}

}
?>
