<?php
$even[]="";
$odd[]="";
$prime[]="";

for ($i=1; $i <100; $i++) {
  // code...
$num = $i % 2;
if ($num==0) {
  // code...
  $even[]=$i;
}else{
  $odd[]=$i;
}

}
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h1> EVEN NUMBERS ARE</h1>";
print_r($even);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<hr>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h1> ODD NUMBERS ARE</h1>";
print_r($odd);

 ?>
