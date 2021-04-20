<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include('database.php');
		$d_id = $_GET['d_id'];

		$start = $_POST['start'];
		$end = $_POST['end'];
		$day = $_POST['day'];
		$loc = $_POST['location'];
		$max_p =  $_POST['max_p'];

		$loc = trim($loc);
		$loc = strtoupper($loc);

        $today=date("l");
		$today=strtoupper($today);
		$tim=date('Y-m-d',time());
		if($today=="SUNDAY" && $day=="SUNDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +7 days"));
	
	    }
		else if($today=="SUNDAY" && $day=="MONDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +1 days"));
	
	    }
		else if($today=="SUNDAY" && $day=="TUESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +2 days"));
	
	    }
		else if($today=="SUNDAY" && $day=="WEDNESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +3 days"));
	
	    }
		else if($today=="SUNDAY" && $day=="THURSDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +4 days"));
	
	    }
		else if($today=="SUNDAY" && $day=="FRIDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +5 days"));
	
	    }
		else if($today=="SUNDAY" && $day=="SATURDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +6 days"));
	
	    }
		else if($today=="MONDAY" && $day=="SUNDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +6 days"));
	
	    }
		else if($today=="MONDAY" && $day=="MONDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +7 days"));
	
	    }
		else if($today=="MONDAY" && $day=="TUESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +1 days"));
	
	    }
		else if($today=="MONDAY" && $day=="WEDNESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +2 days"));
	
	    }
		else if($today=="MONDAY" && $day=="THURSDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +3 days"));
	
	    }
		else if($today=="MONDAY" && $day=="FRIDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +4 days"));
	
	    }
		else if($today=="MONDAY" && $day=="SATURDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +5 days"));
	
	    }
		else if($today=="TUESDAY" && $day=="SUNDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +5 days"));
	
	    }
		else if($today=="TUESDAY" && $day=="MONDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +6 days"));
	
	    }
		else if($today=="TUESDAY" && $day=="TUESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +7 days"));
	
	    }
		else if($today=="TUESDAY" && $day=="WEDNESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +1 days"));
	
	    }
		else if($today=="TUESDAY" && $day=="THURSDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +2 days"));
	
	    }
		else if($today=="TUESDAY" && $day=="FRIDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +3 days"));
	
	    }
		else if($today=="TUESDAY" && $day=="SATURDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +4 days"));
	
	    }
		else if($today=="WEDNESDAY" && $day=="SUNDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +4 days"));
	
	    }
		else if($today=="WEDNESDAY" && $day=="MONDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +5 days"));
	
	    }
		else if($today=="WEDNESDAY" && $day=="TUESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +6 days"));
	
	    }
		else if($today=="WEDNESDAY" && $day=="WEDNESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +7 days"));
	
	    }
		else if($today=="WEDNESDAY" && $day=="THURSDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +1 days"));
	
	    }
		else if($today=="WEDNESDAY" && $day=="FRIDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +2 days"));
	
	    }
		else if($today=="WEDNESDAY" && $day=="SATURDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +3 days"));
	
	    }
		else if($today=="THURSDAY" && $day=="SUNDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +3 days"));
	
	    }
		else if($today=="THURSDAY" && $day=="MONDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +4 days"));
	
	    }
		else if($today=="THURSDAY" && $day=="TUESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +5 days"));
	
	    }
		else if($today=="THURSDAY" && $day=="WEDNESDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +6 days"));
	
	    }
		else if($today=="THURSDAY" && $day=="THURSDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +7 days"));
	
	    }
		else if($today=="THURSDAY" && $day=="FRIDAY")
		{
			
			
			$date=date("Y-m-d",strtotime("$tim +1 days"));
	
	    }
		else if($today=="THURSDAY" && $day=="SATURDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +2 days"));
	
	    }
		else if($today=="FRIDAY" && $day=="SUNDAY")
		{
			
			$date=date("Y-m-d",strtotime("$tim +2 days"));
	
	    }
		else if($today=="FRIDAY" && $day=="MONDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +3 days"));
	
	    }
		else if($today=="FRIDAY" && $day=="TUESDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +4 days"));
	
	    }
		else if($today=="FRIDAY" && $day=="WEDNESDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +5 days"));
	
	    }
		else if($today=="FRIDAY" && $day=="THURSDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +6 days"));
	
	    }
		else if($today=="FRIDAY" && $day=="FRIDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +7 days"));
	
	    }
		else if($today=="FRIDAY" && $day=="SATURDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +1 days"));
	
	    }
		else if($today=="SATURDAY" && $day=="SUNDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +1 days"));
	
	    }
		else if($today=="SATURDAY" && $day=="MONDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +2 days"));
	
	    }
		else if($today=="SATURDAY" && $day=="TUESDAY")
		{
			
			$date=date("Y-m-d",strtotime("$tim +3 days"));
	
	    }
		else if($today=="SATURDAY" && $day=="WEDNESDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +4 days"));
	
	    }
		else if($today=="SATURDAY" && $day=="THURSDAY")
		{
			
			$date=date("Y-m-d",strtotime("$tim +5 days"));
	
	    }
		else if($today=="SATURDAY" && $day=="FRIDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +6 days"));
	
	    }
		else if($today=="SATURDAY" && $day=="SATURDAY")
		{
			$date=date("Y-m-d",strtotime("$tim +7 days"));
	
	    }
		$query = 'INSERT INTO `schedule`( `D_ID`, `DAY`, `START`, `END`, `LOCATION`, `MAX_P`,`date`) 
		VALUES ('.$d_id.',"'.$day.'","'.$start.'","'.$end.'","'.$loc.'",'.$max_p.',"'.$date.'");';
		echo $query;
		$result = mysqli_query($conn, $query);
		if($result){
			header("Location: userpage.php?id=".$d_id);
		}

	?>
</body>
</html>