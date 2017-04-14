<?php
	set_time_limit(0);
	
	extract($_GET);
	$data="udata.txt";
	while(true){
		if(isset($_GET['timestamp']))
		$last_call=(int)($timestamp);
		else
		$last_call=null;	
			
		clearstatcache();
		
		$last_change=filemtime($data);
		if ($last_call == null || $last_change> $last_call) {

        // get content of data.txt
        //$d = file_get_contents($data);
		$f=file("udata.txt");
		$d=$f[sizeof($f)-1];
        // put data.txt's content and timestamp of last data.txt change into array
        $result = array(
            'data' => $d,
            'timestamp' => $last_change
        );
		$json = json_encode($result);
        echo $json;

        // leave this loop step
        break;

    } else {
        // wait for 1 sec (this blocks the PHP/Apache process, but that's how it goes)
        sleep( 1 );
        continue;
    }
}


?>