<?php$route = '/location_countries/:id/';$app->delete($route, function ($id)  use ($app){	$request = $app->request();	$_GET = $request->params();	$Query = "DELETE FROM location_countries WHERE id = '" . $id . "'";	mysql_query($Query) or die('Query failed: ' . mysql_error());	$ReturnObject = array();	$ReturnObject['message'] = "Location_countries Deleted!";	$ReturnObject['id'] = $id;	$app->response()->header("Content-Type", "application/json");	echo stripslashes(format_json(json_encode($ReturnObject)));	});?>