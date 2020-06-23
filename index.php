<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; 
charset=iso-8859-1" />
<title>Notícias Dev Media</title>
</head>
<body>
<h1>Lendo NFe- xml</h1>
<?php
    
    $xml= simplexml_load_file("11200563755045000196550010000004471616358856.xml");   
    if (!$xml) {
        echo "Erro ao abrir arquivo!";
        exit;
    } 
$attributes = $xml->attributes();   
$nItem = strval($attributes['versao']);

echo "Essa é a versão da NFe: ".$nItem;

$children = $xml->children();

$data = array();
$data['cUF'] = (strval($children->NFe->infNFe->ide->cUF));
$data['cNF'] = (strval($children->NFe->infNFe->ide->cNF));


echo "<br> Esse é a UF: ".$data['cUF'];
echo "<br> Esse é a Nº da Nota: ".$data['cNF'];
echo "<br> Esse é o CNPJ: ".$xml->NFe->infNFe->emit->CNPJ;
echo "<br> Esse é o Nome do Fornecedor : ".$xml->NFe->infNFe->emit->xNome."<br>";
(float)$total=0;
foreach ($xml->NFe->infNFe as $key ) {
    
 for ($i=0; $i < count($key->det) ; $i++) { 
    echo "<br> Nome do produto ".($i+1)." : R$ ".$key->det[$i]->prod->xProd;
     echo "<br> Valor total do item ".($i+1)." : R$ ".$key->det[$i]->prod->vProd."<br>";

     (float)$total+=(float)$key->det[$i]->prod->vProd;
 }

 
}
echo "<br><br> Total dessa nota : <strong>R$ ".(float)$total."</strong>";




    echo '<pre>';
    print_r($xml);

    

?>
</body>
</html>