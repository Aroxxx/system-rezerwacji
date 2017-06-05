 <?php

if (isset($_GET["day"])) {
		
		$day = $_GET["day"];

		$conn = new mysqli("192.168.101.58", "aroxxx_magik", "e=QQ0w)?Z%)6", "aroxxx_magik");
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		if ($day == 1)
		{
			$sql = "UPDATE magik SET name = '', reserved = '0' WHERE reserved = 3" ;

	    }
	    else
	    {
	    	$sql = "UPDATE magik SET name2 = '', reserved2 = '0' WHERE reserved2 = 3" ;
	    }
		if ($conn->query($sql) === TRUE) {
	echo "Bilety poprawnie anulowane";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}


		$conn->close();

	} 
?>
