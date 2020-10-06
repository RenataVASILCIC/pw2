<?

$lista_produse = [
    [
        "denumire"=>"Mar",
        "categorie"=>"Fructe",
        "pret"=> 32.75
    ],
    [
        "denumire"=>"Codru salam",
        "categorie"=>"Carne",
        "pret"=> 80.25
    ],
    [
        "denumire"=>"Paine",
        "categorie"=>"Brutarie",
        "pret"=> 4.55
    ],
    [
        "denumire"=>"Jersey blue",
        "categorie"=>"Lactate",
        "pret"=> 110.75
    ],
    [
        "denumire"=>"Bubble alice",
        "categorie"=>"Dulciuri",
        "pret"=> 0.55
    ],
    [
        "denumire"=>"Ananas",
        "categorie"=>"Fructe",
        "pret"=> 150.05
    ]
];

function find_produs($a, $lista_produse){
    foreach ($lista_produse as $key => $data) {
        if(strtolower($data["denumire"]) == strtolower($a)){
            return $data["denumire"]. ", ". $data["categorie"] . " pret: " .$data["pret"];
        }
    }
};

function minmax($lista_produse){
    $max = 0;
    $min = 999;
    $m_key = 0;
    $mi_key = 0;

    foreach ($lista_produse as $key => $data) {
        if( $data["pret"] > $max){
            $max =  $data["pret"];
            $m_key= $key;
        }
        if( $data["pret"] < $min){
            $min =  $data["pret"];
            $mi_key = $key;
        }
    };
    return "Max: " .$lista_produse[$m_key]["denumire"] . " Min: " . $lista_produse[$mi_key]["denumire"];
};

?>
    <style type="text/css">
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <form action="index_.php" method="POST">
        <input type="text" name="denumire_produsului">
        <input type="submit" name="send">
    </form>
<?
if(!$lista_produse){
    die("wow, such empty array.");
}
if($_POST["denumire_produsului"]){
?>

<p>
<? echo find_produs($_POST["denumire_produsului"], $lista_produse) ?>
</p>

<?
}
?>
<table>
  <tr>
    <th>Denumire</th>
    <th>Categorie</th>
    <th>Pret</th>
  </tr>
  <?
  foreach ($lista_produse as $data) {
  ?>
  <tr>
  <?
  foreach ( $data as $row) {
  ?>
  <td>
  <? echo $row ?>
  </td>
  <?
  }
  ?>
  </tr>
  <?
  }
  ?>
</table>
<br>
<p>Produsele cu pretul mai mic de 1 lei </p>
<table>
  <tr>
    <th>Denumire</th>
    <th>Categorie</th>
    <th>Pret</th>
  </tr>
  <?
  foreach ($lista_produse as $data) {
  if($data["pret"] <= 1.00){
  ?>
  <tr>
  <?
  foreach ( $data as $row) {
  ?>
  <td>
  <? echo $row ?>
  </td>
  <?
  }
  ?>
  </tr>
  <?
  }
  }
  ?>
</table>
<p>
<?

echo minmax($lista_produse);
?>
</p>
<?
$medium_pret = 0;
$count = 0;
foreach ($lista_produse as $data) {
$medium_pret += $data["pret"];
if($data["pret"]>=100.00){
$count++;
};
};
echo "Pretul medium: ".number_format($medium_pret/count($lista_produse), 2) . "<br>\n";
echo "Numarul produselor cu pretul egal sau mai mare de 100: ".$count;

$med_des = array_column($lista_produse, "pret");
array_multisort($med_des, SORT_DESC, $lista_produse);

?>