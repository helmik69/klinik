<?php 
function indonesian_date ($timestamp = '', $date_format = 'l, j M  y H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
}

function base_url(){
    $url="http://localhost/00/app-assets/js/scripts/custom.js"; // URL HALAMAN DEPAN
    return $url ;
}



function day_count ($e,$s) {
    $datediff = strtotime($e) - strtotime($s);
    return  round($datediff / (60 * 60 * 24)) ; 
}

function stat_item ($where=NULL) {
    include "config.php" ;
    $sql = "SELECT  a.status  FROM transactions_ppob a  
    INNER JOIN ppob_data b ON (a.ppob_data_id = b.id)
    INNER JOIN ppob_detail c ON (b.ppob_detail_id = c.id)
    WHERE a.status  = '00'    ";
    $item  = implode(",",$where["item"]);
    $start = $where["start"];
    $end = $where["end"] ;
    if (!empty($item)){
        $sql.= " and ppob_id in ($item) " ;
    }
    if (!empty($start) and !empty($end)){
        $sql.= " and a.created_at between '$start' and '$end' " ;
    }
    $res =  mysqli_query($conn,$sql);
    $data =   mysqli_num_rows($res);
    mysqli_close($conn);
    return $data ;
}

function stat_item_ekspedisi ($where=NULL) {
    
    include "config.php" ;
    $sql = "SELECT  a.status  FROM transaction_ecommerces a  
    WHERE transaction_type_id = 2 and a.status = 'done' and a.deleted_at  is NULL   ";
    $item  = implode(",",$where["item"]);
    $start = $where["start"];
    $end = $where["end"] ;
    if (!empty($item)){
        $sql.= " and status in ($item) " ;
    }
    if (!empty($start) and !empty($end)){
        $sql.= " and a.created_at between '$start' and '$end' " ;
    }
    $res =  mysqli_query($conn,$sql);
    $data =   mysqli_num_rows($res);
    mysqli_close($conn);
    return $data ;
}

function stat_item_eco ($where=NULL) {
    
    include "config.php" ;
    $sql = "SELECT  a.status  FROM transaction_ecommerces a  
    WHERE transaction_type_id = 1 and a.status = 'done' and a.deleted_at  is NULL   ";
    $item  = implode(",",$where["item"]);
    $start = $where["start"];
    $end = $where["end"] ;
    if (!empty($item)){
        $sql.= " and status in ($item) " ;
    }
    if (!empty($start) and !empty($end)){
        $sql.= " and a.created_at between '$start' and '$end' " ;
    }
    $res =  mysqli_query($conn,$sql);
    $data =   mysqli_num_rows($res);
    mysqli_close($conn);
    return $data ;
}

function sendWA ($key, $message,$phone_no,$url=NULL){
    $message = preg_replace( "/(\n)/", "<ENTER>", $message );
    $message = preg_replace( "/(\r)/", "<ENTER>", $message );
    
    $phone_no = preg_replace( "/(\n)/", ",", $phone_no );
    $phone_no = preg_replace( "/(\r)/", "", $phone_no );
    // c30ed6fab9e0c2f1307da8d56929ed16ed78620568999ba9
    $data = array("phone_no" => $phone_no, "key" => $key, "message" => $message);

    $as = "send_message" ;
    if (!empty($url)){
        $data["url"] = $url ;
        $as = "async_send_image_url" ;
    }

    $data_string = json_encode($data); 
    //$ch = curl_init('http://116.203.92.59/api/async_send_message');
    $ch = curl_init('http://116.203.92.59/api/'.$as);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string)) 
    ); 
    return $result = curl_exec($ch);
}

function sendWA2 ($message,$phone_no){
	$message = preg_replace( "/(\n)/", "<ENTER>", $message );
	$message = preg_replace( "/(\r)/", "<ENTER>", $message );
	
	$phone_no = preg_replace( "/(\n)/", ",", $phone_no );
	$phone_no = preg_replace( "/(\r)/", "", $phone_no );
	

	$data = array("phone_no" => $phone_no, "key" => "493b9eef313ebcb4f0d2fe1a237c2f46f8c85cf5f9675adb", "message" => $message);
	
	
	$data_string = json_encode($data); 
	$ch = curl_init('http://116.203.92.59/api/async_send_message');
	//$ch = curl_init('http://116.203.92.59/api/send_message');
	//$ch = curl_init('http://116.203.92.59/api/send_message');
	//$ch = curl_init('http://116.203.92.59/api/send_message_split');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string)) 
	); 
	$result = curl_exec($ch);
	return $result;
}

function unique_code($limit)
{
  	return strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit));
}

function uid_code()
{
  	return hexdec(uniqid());
}

function isLocal()
{
    // i = local , 0 live
  	return 1;
    // return 0 ;
}
?>