<?php
	 $pagination = $_GET['pagination'];
   if(isset($_GET['pagination'])) 
   {
	$_SESSION['pagination'] = $pagination; 
	$limit = $_SESSION['pagination'] ; 
	}
	else
	{
	$_SESSION['pagination'] = 10;
	$limit = $_SESSION['pagination']; 
     }
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	$result1= $_SESSION['result1'];
	 $result2 =$_SESSION['result2'];
	 $result3 =$_SESSION['result3'];
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = $result2;
//total number of records
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
       
if($total_pages == '' or $total_pages == 0)
 $total_pages=0;

	$query1 = $result3;
//total number of records
	$total_pages1 = mysql_query($query1);
	$total_pages1 = mysql_num_rows($total_pages1);

	//echo $total_pages;
	
	/* Setup vars for query. */
	//$targetpage = "searchresult.php"; 	//your file name  (the name of this file)
					//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$limitsql = "LIMIT $start, $limit";
	$result1;
	$sql =$result1.' '.$limitsql;
	//echo $sql;
	
	$resultquery = mysql_query($sql)or die(mysql_error());
	//echo $result;
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\"></span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?pagination=$limit && page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?pagination=$limit && page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?pagination=$limit && page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?pagination=$limit && page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?pagination=$limit && page=$next\">next </a>";
		else
			$pagination.= "<span class=\"disabled\"></span>";
		$pagination.= "</div>\n";		
	}
?>
 
