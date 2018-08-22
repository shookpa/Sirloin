<?
//Fiz essa classe pela necessidade de exportar 
//dados vindos de um banco sql server (vc pode usar BD)
//para se utilizar basta instanciar a classe
//passando como parametros os titulos das colunas
//dentro de um vetor e o segundo parametro sendo a query em si
//a classe chama por padrao o ponteiro $db do ADODB, caso n seja esse o nome
//fique a vontade para modificar a classe
//(A classe GeralExcel n eh minha)
//Creditos a DzaiaCuck - dzaiacuck@ig.com.br 
//Rubens A. Monteiro - unplu@hotmail.com 20/09/05
class sql2excel extends GeraExcel { 
	/**
	 * Genera excel en base a query de Mssql
	 *
	 * @param String $Archivo
	 * @param Array $tit
	 * @param String $sql
	 * @return excel
	 */	
	function sql2excel($Archivo,$tit, $sql) 
		{
			global $conexionmssql; 
			$this->GeraExcel();
			
			for ($i=0; $i<count($tit); $i++) 
			{					
					$this->MontaConteudo(0,$i,$tit[$i]);
	 		}
	 		
			$qr=$conexionmssql->execute($sql);
			$j=1;
			$numbCampos=count($tit);
			while (!$qr->EOF)
			{	
				
				for ($i=0; $i<$numbCampos; $i++) 
				{
					
					$this->MontaConteudo($j,$i,$qr->fields[$tit[$i]]);
				}
				$j++;
				$qr->MoveNext();
			}
			/*
			while ($reg=$qr->FetchRow())
			{
						echo "<br>";
					for ($i=0; $i<count($reg); $i++) 
					{
							echo $reg[$i]."--".$i;
							$this->MontaConteudo($j,$i,$reg[$i]);
					}
					$j++;
			}*/
			$this->GeraArquivo($Archivo);
		}
}
class  GeraExcel{

// define parametros(init)
function  GeraExcel(){

$this->armazena_dados   = ""; // Armazena dados para imprimir(temporario)
$this->ExcelStart();
}// fim constructor

     
// Monta cabecario do arquivo(tipo xls)
function ExcelStart(){

//inicio do cabecario do arquivo
$this->armazena_dados = pack( "vvvvvv", 0x809, 0x08, 0x00,0x10, 0x0, 0x0 );
}

// Fim do arquivo excel
function FechaArquivo(){
$this->armazena_dados .= pack( "vv", 0x0A, 0x00);
}


// monta conteudo
function MontaConteudo( $excel_linha, $excel_coluna, $value){

$tamanho = strlen( $value );
$this->armazena_dados .= pack( "v*", 0x0204, 8 + $tamanho, $excel_linha, $excel_coluna, 0x00, $tamanho );
$this->armazena_dados .= $value;
}//Fim, monta Col/Lin

// Gera arquivo(xls)
function GeraArquivo($Archivo){

//Fecha arquivo(xls)
$this->FechaArquivo();
/*
header("Content-type: application/zip");
//header("Content-type: text/x-comma-separated-values");
header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header("Content-disposition: inline; filename=$Archivo.xls");
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Pragma: public");
*/
 header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT");
       header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
        header ( "Pragma: no-cache" );
        header ( "Content-type: application/octet-stream; name=$Archivo.xls" );
        header ( "Content-Disposition: inline; filename=$Archivo.xls"); 
        header ( "Content-Description: PHP ExcelGen Class" );

print  ( $this->armazena_dados);
}// fecha funcao
# Fim da classe que gera excel
}
?>