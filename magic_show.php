<!DOCTYPE html>
<html lang="pl-PL">
<head>
<meta name="viewport" content="width=device-width,user-scalable=no" />
 
 <title> Rezerwacja MagicShow </title>  

<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<script>
function myFunction() {
    var x = document.getElementById('formularz');
     var y = document.getElementById('przycisk');
    x.style.display = 'block';
       y.style.display = 'none';
}
</script>

<style type="text/css">


body
{
	background-image: url("bg.jpg");
    background-repeat: no-repeat;
	font-family: 'Merriweather Sans', sans-serif;
	text-align: center;
	text-decoration: none;
	margin: 0 auto;
	font-size: 12px;
	color: white;
	font-weight: 700;
}

#contener{
width:1895px;
margin: 0 auto;
}

a
{
text-decoration: none;
color: white;
}

li
{
	border: none;
	margin:5px;
	list-style: none;
	float: left;
	font-size: 18px;
}


#left
{
	margin-right: 20px;
	width:350px;
	float: left;
}

#right
{
	width:350px;
	float: left;
}

#content
{
	margin-right: 20px;
	width:900px;
	float:left;
}

#row1
{
	height: 35px;
	width:892px;
	float:left;
}

#middle
{
	width:870px;
	float:left;
}

#left li, #middle li, #right li 
{
	width:35px;
	height:25px;
	 border-radius: 5px;
}

#rzedy
{
	float:left;
	width:22px;
}

#rzedy li
{
height: 25px;
}

.clear
{
	clear: both;
	height: 10px;
}

.pr{
	width:170px;
	float: left;
	border-radius: 5px;
    background-color: #404040;
    padding: 15px;
    margin: 5px;
}

#formularz
{
	font-size: 18px;
	display: none;
}


#npnspr
{
	width:350px;
	float: left;
	margin: 0 auto;
	height:100px;
}

#dzien
{
margin: 5px auto;
width: 290px;
height: 50px;
}

#legenda
{
	float: left;
	width: 170px;
	line-height: 37px;
}

#legenda li
{
	width:35px;
	height:25px;
}



#formularz2 input[type=text] {
    width: 35px;
    padding: 6px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}


#formularz input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit], button{
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover, button:hover {
    background-color: #45a049;
}

#sektor
{

position: absolute;
margin: 0 auto;
top: 50px;
z-index: -1;
}

#sektor li {
	float: left;
	width: 100px;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 18px;
    background: #6d7075;
   padding: 5px ;
   margin-left: 80px;
  
      border-radius: 30px;
     text-align: center;
    list-style: none;
}

</style>
</head>

<body>


<div id="contener">

<div style="font-size: 18px;"> Rezerwacja MagicShow </div>

 <?php
  
if (isset($_GET["id"]) && isset($_GET["reserved"]) && isset($_GET["day"])) {

		$id = $_GET["id"];
		$reserved = $_GET["reserved"];
		$day = $_GET["day"];

		$conn = new mysqli("192.168.101.58", "aroxxx_magik", "e=QQ0w)?Z%)6", "aroxxx_magik");
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		if ($day == 1)
		{
			$sql = "UPDATE magik SET reserved = '" . $reserved . "' WHERE id = " . $id ;
	    }
	    else
	    {
	    	$sql = "UPDATE magik SET reserved2 = '" . $reserved . "' WHERE id = " . $id ;
	    }
		if ($conn->query($sql) === TRUE) {
	
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	} 



if (isset($_GET["od"]) && isset($_GET["day"])) {

		$od = $_GET["od"];
		$day = $_GET["day"];


$conn = new mysqli("192.168.101.58", "aroxxx_magik", "e=QQ0w)?Z%)6", "aroxxx_magik");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($day == 1){
$sql = "SELECT id FROM magik WHERE reserved = 1";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      		$sql = "UPDATE magik SET reserved = 1 WHERE id >= ". $row['id'] ." AND reserved <> 3 LIMIT ".$od ;

		if ($conn->query($sql) === TRUE) {
	
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
} else {
    echo "Nie zaznaczono zadnego miejsca lub wiecej niz 1";
}
}
else{
$sql = "SELECT id FROM magik WHERE reserved2 = 1";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {	        
    
	    	$sql = "UPDATE magik SET reserved2 = 1 WHERE id >= ". $row['id'] ." AND reserved2 <> 3 LIMIT ".$od ;
	 
		if ($conn->query($sql) === TRUE) {
	
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
} else {
    echo "Nie zaznaczono zadnego miejsca lub wiecej niz 1";
}
}
$conn->close();

	
			} 

 
   try
   {

   	$pdo = new PDO('mysql:host=192.168.101.58;dbname=aroxxx_magik', 'aroxxx_magik', 'e=QQ0w)?Z%)6');
        }
   catch(PDOException $e)
   {
      echo 'Polaczenie zerwane: ' . $e->getMessage();
      die();
   }


if (isset($_GET["day"])) {

$day = $_GET["day"];

			if ($day == 1) 
			{
				
		$query = $pdo -> prepare('SELECT  id, name, reserved  FROM magik');
				//$query -> bindValue(':day', $day );
				$query -> execute();

					 if (($data = $query->rowCount()) > 0 )
					 {
					 	$i = 1; 

					echo '<div id="dzien"><a href="?day=1"><li><div style="background-color:black; border: 2px solid white;">Godzina 10:00</div></li></a>';
					echo '<a href="?day=2"><li><div style="background-color:grey; color: #d9d9d9 ">Godzina 12:00</div></li></a></div>';
			echo '<div class="clear"> </div>';
			echo '<div id="rzedy"><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li><li>31</li> </div>';
					 	echo '<div id="left"><div id="sektor"><li>sektor C</li></div>';
						 foreach($query as $row)
						      {
						       
						   
						       if (($i > 7) && ($row['id'] < 217) && ($row['id'] > 0))
						       {
						       	$i = 1;
						       }
						       elseif (($i < 1) && ($row['id'] < 787) && ($row['id'] >= 217))
						       {
								$i = 19;
						       }
						       elseif (($i < 1) && ($row['id'] < 999) && ($row['id'] >= 787))
						       {
						       	$i =7;	
						       }

						      	if ($row['id'] == 217 ){
						      		echo '</div><div id="content"><div id="row1"></div><div id="rzedy"><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li></div><div id="middle"><div id="sektor"><li>sektor B</li></div>';
						      		$i =19;
						      		
						      	}

						      	if ($row['id'] == 787 ){
						      		echo '</div></div><div id="rzedy"><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li></div> <div id="right"><div id="sektor"><li>sektor A</li></div>';
						      	}
						      		



						      	if ($row['id'] <= 216 ){
						      		
							       	if ($row['reserved'] == 1)
							       	{
							       		
							       	echo ' <div id=seat'.$row['id'].'><a href="?id='.$row['id'].'&reserved=0&day=1"><li style="background-color:red">'.$i.'</li></a></div> ';
							      	}
							      	elseif ($row['reserved'] == 0)
							      	{
							      	echo ' <div id=seat'.$row['id'].'><a href="?id='.$row['id'].'&reserved=1&day=1"><li style="background-color:#65d287">'.$i.'</li></a></div> ';	
							      	}	
							      	else 
							      	{
							      	echo ' <div id=seat'.$row['id'].'><li style="background-color:grey; cursor:default">'.$i.'</li></div> ';	
							      	}	
							      	$i++;
						      	}
						      	else 
						      	{
						      		if ($row['reserved'] == 1)
							       	{
							       		
							       	echo ' <div id=seat'.$row['id'].'><a href="?id='.$row['id'].'&reserved=0&day=1"><li style="background-color:red">'.$i.'</li></a></div> ';
							      	}
							      	elseif ($row['reserved'] == 0)
							      	{
							      	echo ' <div id=seat'.$row['id'].'><a href="?id='.$row['id'].'&reserved=1&day=1"><li style="background-color:#65d287">'.$i.'</li></a></div> ';	
							      	}	
							      	else 
							      	{
							      	echo ' <div id=seat'.$row['id'].'><li style="background-color:grey; cursor:default">'.$i.'</li></div> ';	
							      	}
							      	$i=$i-1;
						      	}
						      }
					

					}
			}


			if ($day == 2)
			{

				$query = $pdo -> prepare('SELECT  id, name, reserved2  FROM magik');
				//$query -> bindValue(':day', $day );
				$query -> execute();

					 if (($data = $query->rowCount()) > 0 )
					 {
					 	$i = 1; 

						echo '<div id="dzien"><a href="?day=1"><li><div style="background-color:grey; color: #d9d9d9 ">Godzina 10:00</div></li></a>';
						echo '<a href="?day=2"><li><div style="background-color:black; border: 2px solid white;">Godzina 12:00</div></li></a></div>';
			echo '<div class="clear"> </div>';
			echo '<div id="rzedy"><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li><li>31</li> </div>';
					 	echo '<div id="left"><div id="sektor"><li>sektor C</li></div>';
						 foreach($query as $row)
						      {
						       
						   
						       if (($i > 7) && ($row['id'] < 217) && ($row['id'] > 0))
						       {
						       	$i = 1;
						       }
						       elseif (($i < 1) && ($row['id'] < 787) && ($row['id'] >= 217))
						       {
								$i = 19;
						       }
						       elseif (($i < 1) && ($row['id'] < 999) && ($row['id'] >= 787))
						       {
						       	$i =7;	
						       }

						      	if ($row['id'] == 217 ){
						      		echo '</div><div id="content"><div id="row1"></div><div id="rzedy"><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li></div><div id="middle"><div id="sektor"><li>sektor B</li></div>';
						      		$i =19;
						      		
						      	}

						      	if ($row['id'] == 787 ){
						      		echo '</div></div><div id="rzedy"><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li></div> <div id="right"><div id="sektor"><li>sektor A</li></div>';
						      	}
						      		



						      	if ($row['id'] <= 216 ){
						      		
							       	if ($row['reserved2'] == 1)
							       	{
							       		
							       	echo ' <div id=seat'.$row['id'].'><a href="?id='.$row['id'].'&reserved=0&day=2"><li style="background-color:red">'.$i.'</li></a></div> ';
							      	}
							      	elseif ($row['reserved2'] == 0)
							      	{
							      	echo ' <div id=seat'.$row['id'].'><a href="?id='.$row['id'].'&reserved=1&day=2"><li style="background-color:#65d287">'.$i.'</li></a></div> ';	
							      	}	
							      	else 
							      	{
							      	echo ' <div id=seat'.$row['id'].'><li style="background-color:grey; cursor:default">'.$i.'</li></div> ';	
							      	}	
							      	$i++;
						      	}
						      	else 
						      	{
						      		if ($row['reserved2'] == 1)
							       	{
							       		
							       	echo ' <div id=seat'.$row['id'].'><a href="?id='.$row['id'].'&reserved=0&day=2"><li style="background-color:red">'.$i.'</li></a></div> ';
							      	}
							      	elseif ($row['reserved2'] == 0)
							      	{
							      	echo ' <div id=seat'.$row['id'].'><a href="?id='.$row['id'].'&reserved=1&day=2"><li style="background-color:#65d287">'.$i.'</li></a></div> ';	
							      	}	
							      	else 
							      	{
							      	echo ' <div id=seat'.$row['id'].'><li style="background-color:grey; cursor:default">'.$i.'</li></div> ';	
							      	}
							      	$i=$i-1;
						      	}
						      }
				
					}
				}

					echo '</div>';
					echo '<div class="pr" id="formularz"><form action="kupione.php" method="get"><label for="lname">Nazwisko:</label> <input type="text" id="lname" name="name" placeholder="Wpisz nazwisko.." required> <label for="tel">Nr. Telefonu</label> <input type="text" id="tel" name="tel" placeholder="Wpsz nr. telefonu"><label for="mail">Adres e-mail</label> <input type="text" id="mail" name="mail" placeholder="Wpsz adres e-mail"><input type = "hidden" name = "day" value = "'.$day.'" /><input type="submit" value="Potwierdz"></form></div><div class="pr" id="przycisk"><button onClick="myFunction()";>Rezerwuj</button></div><div class="pr">';

					
					echo '<div id="legenda"><li style="background-color:#65d287"></li>- Wolne</div>';
					echo '<div id="legenda"><li style="background-color:red"></li>- Wybrane</div>';
					echo '<div id="legenda"><li style="background-color:grey"></li>- Sprzedane</div></div>';

					echo '<div class="pr" id="formularz2"><form action="" method="get"><br>Zaznacz <input type="text" name="od"> miejsc od wybranego.<br> <input type = "hidden" name = "day" value = "'.$day.'" /><input type="submit" value="Zaznacz"></form><br><br>Wazne: miejsca zaznaczane sa od lewej do prawej bez wzgledu na numeracje. Aby miejsca sie zaznaczyly musi byc zaznaczone tylko jedno miejsce. Nastepnie wykonujemy rezerwacje jak dotychczas</div>';

					echo '<div class="pr"> <form action="odznacz.php" method="get"><label for="lname">Odznacz wszystko</label><input type = "hidden" name = "day" value = "'.$day.'" /><input type="submit" value="Odznacz"></form></div>';

					echo '<div class="pr"> <form action="lista.php" method="get"><label for="lname">Pokaz rezerwacje</label><input type = "hidden" name = "day" value = "'.$day.'" /><input type="submit" value="Rezerwacje"></form></div>';

			}
		else 
		{
			echo '<div id="dzien"><a href="?day=1"><li><div style="background-color:grey">Godzina 10:00</div></li></a>';
			echo '<a href="?day=2"><li><div style="background-color:grey">Godzina 12:00</div></li></a></div>';
		}

?>

<div class="clear"> </div>
</div>


</body>
</html>
