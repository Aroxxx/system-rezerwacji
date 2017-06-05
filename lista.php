<!DOCTYPE html>
<html lang="pl-PL">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width,user-scalable=no" />
<title> Lista </title>  

<style type="text/css">

@import url(http://fonts.googleapis.com/css?family=Patua+One|Open+Sans);
* {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  background: #353a40;
}

table {
  border-collapse: separate;
  background: #fff;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  margin: 20px auto;
  -moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
}

thead {
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
}

thead th {
  font-family: 'Patua One', cursive;
  font-size: 16px;
  font-weight: 400;
  color: #fff;
  text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.5);
  text-align: left;
  padding: 10px;
  background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzY0NmY3ZiIvPjxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzRhNTU2NCIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
  background-size: 100%;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #646f7f), color-stop(100%, #4a5564));
  background-image: -moz-linear-gradient(#646f7f, #4a5564);
  background-image: -webkit-linear-gradient(#646f7f, #4a5564);
  background-image: linear-gradient(#646f7f, #4a5564);
  border-top: 1px solid #858d99;
}
thead th:first-child {
  -moz-border-radius-topleft: 5px;
  -webkit-border-top-left-radius: 5px;
  border-top-left-radius: 5px;
}
thead th:last-child {
  -moz-border-radius-topright: 5px;
  -webkit-border-top-right-radius: 5px;
  border-top-right-radius: 5px;
}

tbody tr td {
  font-family: 'Open Sans', sans-serif;
  font-weight: 400;
  color: #5f6062;
  font-size: 13px;
  padding: 10px;
  border-bottom: 1px solid #e0e0e0;
}

tbody tr:nth-child(2n) {
  background: #f0f3f5;
}

tbody tr:last-child td {
  border-bottom: none;
}
tbody tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 5px;
  -webkit-border-bottom-left-radius: 5px;
  border-bottom-left-radius: 5px;
}
tbody tr:last-child td:last-child {
  -moz-border-radius-bottomright: 5px;
  -webkit-border-bottom-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

tbody:hover > tr td {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=50);
  opacity: 0.5;
  /* uncomment for blur effect */
  /* color:transparent;
  @include text-shadow(0px 0px 2px rgba(0,0,0,0.8));*/
}

tbody:hover > tr:hover td {
  text-shadow: none;
  color: #2d2d2d;
  filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
  opacity: 1;
}
#szukaj{
	width: 300px;
	margin: 20px auto;

}

.pr{
	width:170px;
	float: left;
	border-radius: 5px;
    background-color: #404040;
    padding: 15px;
    margin: 5px;
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

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

#szukaj input {
	width: 300px;
}
</style>
</head>
<body onload="myF()">


  <script>
function myF() {
    var $rows = $('#tabela tbody tr');
$('#szukaj_osoby').keyup(function() {
	    
	    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
	        reg = RegExp(val, 'i'),
	        text;
	    
	    $rows.show().filter(function() {
	        text = $(this).text().replace(/\s+/g, ' ');
	        return !reg.test(text);
	    }).hide();
	});
}
</script>

<div id="kont">
<div id="szukaj">
<input type="text" id="szukaj_osoby" placeholder="wpisz nazwisko lub nr. tel">
</div>
<table id="tabela">
	<thead>
    <tr>
        <th>miejsce</th>
        <th>nazwisko</th>
        <th>telefon</th>
        <th>e-mail</th>
        <th>usun</th>
   </tr>
    </thead>
    <tbody>
  
<?php
	if (isset($_GET["day"])) {

		$day = $_GET["day"];
		
echo '<div class="pr"> <form action="magik1.php" method="get"><input type = "hidden" name = "day" value = "'.$day.'" /><input type="submit" value="widok sali"></form></div>';

		$conn = new mysqli("192.168.101.58", "aroxxx_magik", "e=QQ0w)?Z%)6", "aroxxx_magik");
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

if ($day == 1)
    {

$sql = "SELECT id, name, miejsce, tel1, mail1 FROM magik WHERE reserved = 3" ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["miejsce"]. " </td><td>" . $row["name"]. " </td><td>". $row["tel1"]. " </td><td>" . $row["mail1"]. "</td><td><a href='usun.php?id=".$row["id"]."&day=".$day."'>x</a></td></tr>";
    }
} else {
    echo "0 sprzedanych";
}
}
if ($day == 2)
    {

$sql = "SELECT id, name2, miejsce, tel2, mail2 FROM magik WHERE reserved2 = 3" ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["miejsce"]. " </td><td>" . $row["name2"]. " </td><td>". $row["tel2"]. " </td><td>" . $row["mail2"]. "</td><td><a href='usun.php?id=".$row["id"]."&day=".$day."'>x</a></td></tr>";
    }
} else {
    echo "0 sprzedanych";
}
}
$conn->close();
}
?> 
</tbody>
  </table>
  </div>

</body>
</html>
