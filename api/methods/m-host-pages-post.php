<?php
$route = '/host/:host/pages/';
$app->post($route, function ($host) use ($app){

	$hostlookup = $host;
	
	$host = $_SERVER['HTTP_HOST'];

	$ReturnObject = array();

	$request = $app->request();
 	$param = $request->params();

	if(isset($param['url'])){ $url = mysql_real_escape_string($param['url']); } else { $name = ''; }
	$hostlookup = trim(mysql_real_escape_string($hostlookup));	

	$hostquery = "SELECT * FROM host WHERE host = '" . $hostlookup . "'";
	//echo $hostquery . "<br />";
	$hostresult = mysql_query($hostquery) or die('Query failed: ' . mysql_error());
	
	if($hostresult && mysql_num_rows($hostresult))
		{
			
		$hostitem = mysql_fetch_assoc($hostresult);
		
		$host_id = $hostitem['host_id'];

  		$entryquery = "SELECT * FROM host_pages WHERE url = '" . $url . "' AND host_id = " . $host_id;
		//echo $entryquery . "<br />";
		$entryresults = mysql_query($entryquery) or die('Query failed: ' . mysql_error());			
		if($entryresults && mysql_num_rows($entryresults))
			{	
			//$entryresult = mysql_fetch_assoc($entryresults);
			}
		else 
			{
			$query = "INSERT INTO host_pages(host_id,url) VALUES(" . mysql_real_escape_string($host_id) . ",'" . mysql_real_escape_string($url) . "')";
			//echo $query . "<br />";
			mysql_query($query) or die('Query failed: ' . mysql_error());	
			}
			
		$spec = array();	
		$spec['pages'] = array();				
		$pages = array();
		
		$Query = "SELECT * FROM host_pages WHERE host_id = " . $host_id;
		$itemresult = mysql_query($Query) or die('Query failed: ' . mysql_error());	
		while ($item = mysql_fetch_assoc($itemresult))
			{
			$host_page_id = $item['host_page_id'];
			$page_url = $item['url'];;
			
			$Plan = array();	
			$plan['id'] = $host_page_id;
			$plan['url'] = $page_url;
			
			array_push($pages,$plan);
											
			}

		$spec['pages'] = $pages;	

		}				
	$ReturnObject = $spec;
	//echo(json_encode($spec));
	$app->response()->header("Content-Type", "application/json");
	echo stripslashes(format_json(json_encode($ReturnObject)));
	});
?>  