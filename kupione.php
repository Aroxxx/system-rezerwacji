 <?php

if (isset($_GET["name"]) && isset($_GET["tel"]) && isset($_GET["mail"]) &&  isset($_GET["day"])) {
		
		$name = $_GET["name"];
		$day = $_GET["day"];
		$tel = $_GET["tel"];
		$mail = $_GET["mail"];
 try
   {

   	$pdo = new PDO('mysql:host=192.168.101.58;dbname=aroxxx_magik', 'aroxxx_magik', 'e=QQ0w)?Z%)6');
        }
   catch(PDOException $e)
   {
      echo 'Polaczenie zerwane: ' . $e->getMessage();
      die();
   }


		$conn = new mysqli("192.168.101.58", "aroxxx_magik", "e=QQ0w)?Z%)6", "aroxxx_magik");
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}


		if ($day == 1)
		{
			$sql = "UPDATE magik SET name = '". $name ."',tel1 = '". $tel ."', mail1 = '". $mail ."', reserved = '3' WHERE reserved = 1" ;
	    }
	    if ($day == 2)
	    {
	    	$sql = "UPDATE magik SET name2 = '". $name ."',tel2 = '". $tel ."', mail2 = '". $mail ."', reserved2 = '3' WHERE reserved2 = 1" ;
	    }
		if ($conn->query($sql) === TRUE) {


	echo "Bilety poprawnie zakupione";

  if ($day == 1)
  {
$query = $pdo -> prepare('SELECT name, miejsce  FROM magik WHERE name = "'.$name.'"');
				//$query -> binddValue(':day', $day );
				$query -> execute();
$wynik = '';
$godzina = '10:00';
$i = 0;
					 if (($data = $query->rowCount()) > 0 )
					 {
						 foreach($query as $row)
						      {
$i++;
//$wynik = $wynik ."\r\n ".$row['miejsce'];
$wynik .= "<tr><td>".$i."</td><td>".$row['miejsce']."</td><td>01.06.2017 ".$godzina."</td></tr>";
						      }
}
}
  if ($day == 2)
  {
$query = $pdo -> prepare('SELECT name2, miejsce  FROM magik WHERE name2 = "'.$name.'"');
				//$query -> bindValue(':day', $day );
				$query -> execute();
$wynik = '';
$godzina = '12:00';
$i = 0;
					 if (($data = $query->rowCount()) > 0 )
					 {
						 foreach($query as $row)
						      {
$i++;
//$wynik = $wynik ."\r\n ".$row['miejsce'];
$wynik .= "<tr><td>".$i."</td><td>".$row['miejsce']."</td><td>01.06.2017 ".$godzina."</td></tr> ";
						      }
}
}

$message = "<html><head></head><body><div>
<p>&nbsp;</p>
<p>Witaj!</p>
<p>Właśnie zamówiłeś bilety na wydarzenie Magic Show: <br> <br> <strong>Dane osobowe:</strong></p>
<p>Nazwisko: ".$name."</p>
<p>Nr telefonu: ".$tel."</p>
<p>Email: ".$mail."</p>
<p><br> <strong><br> Szczegóły zamówienia:</strong></p>
<p></p><table cellpadding='5' cellspacing='0' style='font-size:12px;border:1px solid #ccc;border-collapse:collapse;max-width:600px'> 
<thead style='background-color:#eee'> <tr style='background-color:#eee'><td>Nr. </td>
<td>Miejsce</td><td>Data, godzina</td></tr></thead>
<tbody>".$wynik."
</tbody></table><p></p>
<p></p>
<p>&nbsp;</p>
<p></p>
<p>Dziękujemy,</p>
<p>&nbsp; &nbsp; &nbsp;</p><p>&nbsp;</p>
<p style='font-size:9px'><em>Mail wysłany automatycznie, prosimy na niego nie odpowiadać.</em></p>
</td></tr>
<tr><td></td><td height='15'></td></tr>
<tr><td></td></tr>
</tbody></table></div></body></html>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <rezerwacja@magik.pl>' . "\r\n";
//$headers .= 'Cc: arox87@gmail.com' . "\r\n";



	// wiadomosc
	@$content = "Witamy. \n\nWlasnie kupiles miejsca na przedstawienie na godzine ".$godzina. ": \n".$wynik." \nDziekujemy";
	$header = 	"From: rezerwacja@magik.pl \nContent-Type:".
			' text/plain;charset="iso-8859-2"'.
			"\nContent-Transfer-Encoding: 8bit";
	$header .="Bcc: arox87@gmail.com\r\n";
	if (mail($mail, 'Rezerwacja Magic Show', $message, $headers))
		header( 'Location: http://magik.aroxxx.webd.pl/magik1.php?day='.$day ) ;
	else 
		echo "Error: nie wyslano";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}


		$conn->close();

	} 
?>
