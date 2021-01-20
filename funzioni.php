<?php
  $file = 'https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-andamento-nazionale/dpc-covid19-ita-andamento-nazionale.csv';
  $csv = array_map('str_getcsv', file($file));
  $numeri=[0,2,3,4,5,6,7,8,9,10,13,14];
  $size=count($csv)-1;
  $giorni=10;
  $date=[];
  $contagi=[];
function form_data($data_ins) {
  $d = new DateTime($data_ins);
  return $d->format('d/m/Y');
}
function form_data1($data_ins) {
  $d = new DateTime($data_ins);
  return $d->format('d/m/Y');
}


function tabella($data_ins) {
  $d = new DateTime($data_ins);
  return $d->format('d m Y');
}

function form_stringa($frase){
  $cerca="_";
  $cambia=" ";
  return ucwords(str_replace($cerca, $cambia, $frase));
}

function  rapporto($num,$den){
  return round( ($num/$den*100),2)."%";
}

$nome =["t1","t2","t3"];
$numi =[1,2,3];
?>
