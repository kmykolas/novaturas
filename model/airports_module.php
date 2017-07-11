<?php
class airportsModule{
    
    function formatAirportsList(){
        global $smarty;
        global $con;
        if($_POST) {
            $message=$this->deleteAirportItem();  
            $smarty->assign('message', $message);  
        }
        if(!empty($_GET['sort'])){
            $order_type=mysqli_real_escape_string($con,$_GET['sort']);
            if($order_type==0)$order=" ORDER BY title ASC";  
            if($order_type==1)$order=" ORDER BY title DESC"; 
        }
        else
            $order=" ORDER BY title ASC";
        if(!empty($_GET['search'])){
            $search=mysqli_real_escape_string($con,$_GET['search']);
            $search_query=" where `airport`.title LIKE '%{$search}%' OR `countries`.title LIKE '%{$search}%'";   
        }
        else
            $search_query="";
        $per_page=25;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        else {
            $page=1;
        }
        $start_from = ($page-1) * $per_page;
        $query = "SELECT `airport`.id, `airport`.title,`airport`.longitude, `airport`.latitude, `countries`.title AS `countriie_name` FROM airport
        LEFT JOIN `countries` ON `airport`.countryId=`countries`.id
         $search_query $order LIMIT $start_from, $per_page";
        $result = mysqli_query ($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[]=$row;
        }
        $smarty->assign('airports', $rows);
        //paging
        $query = "SELECT `airport`.id, `airport`.title, `airport`.longitude, `airport`.latitude, `countries`.title AS `countriie_name` FROM airport
        LEFT JOIN `countries` ON `airport`.countryId=`countries`.id
         $search_query";
        $result = mysqli_query($con, $query);
        $total_records = mysqli_num_rows($result);
        $total_pages = ceil($total_records / $per_page);
        for ($i=1; $i<=$total_pages; $i++) {
            $pages[$i]['nr']=$i;
            if($i==$page)
                $pages[$i]['class']='active';
            else
                $pages[$i]['class']='';
        };
        $smarty->assign('pages', $pages);
        return $smarty->fetch('airports/list.tpl.html');         
    }
    
    function formatAirportsCreate(){
        global $smarty;   
        global $con; 
        $countriesQuery="SELECT * FROM `countries`";
        $result = mysqli_query ($con, $countriesQuery);
        while ($row = mysqli_fetch_assoc($result)) {
            $countries[]=$row;
        }
        $smarty->assign('countries', $countries);
        
        $airlinesQuery="SELECT * FROM `airLines`";
        $result = mysqli_query ($con, $airlinesQuery);
        while ($row = mysqli_fetch_assoc($result)) {
            $airlines[]=$row;
        }
        $smarty->assign('airlines', $airlines);
        $message="";
        if(($_POST)){
            foreach($_POST as $k=>$itm){
                if($k!='airlineid'){
                    $p[$k]=mysqli_real_escape_string($con,$itm);
                    if(empty($itm))$message="Privaloma užpildyti visus laukelius<br />";
                }
            }
            if(empty($p['longitude']) || empty($_POST{'latitude'})){
                $message.="Pasirinkite oro uostą žemėlapyje<br />";
            }
            if(empty($_POST['airlineid'])){
                $message.="Pasirinkite oro liniją";
            }
        
        if(empty($message))$message=$this->saveAirport();
        $smarty->assign('message', $message);
        }
        return $smarty->fetch('airports/create.tpl.html'); 
    }
    
    function saveAirport(){
        global $con;  
            foreach($_POST as $k=>$itm){
                if($k!='airlineid'){
                    $p[$k]=mysqli_real_escape_string($con,$itm);
                    if(empty($itm))$message="Privaloma užpildyti visus laukelius<br />";
                }
            }
        mysqli_query($con,"INSERT INTO `airport`( `countryId`, `longitude`, `latitude`, `title`) VALUES ('{$p['countryid']}','{$p['longitude']}','{$p['latitude']}','{$p['title']}')");      
        $airportId=mysqli_insert_id($con);
        foreach($_POST['airlineid'] as $k=>$airlineId){
            $airlineId=mysqli_real_escape_string($con,$airlineId);
            mysqli_query($con,"INSERT INTO `airportAirLines`(`airportId`, `airLineId`) VALUES ('{$airportId}','{$airlineId}')");   
        }
        return "Oro uostas <b>'".$p['title']."'</b> sėkmingai išsaugotas";        
    }
    
    function formatAirportItem(){
        global $smarty;
        global $con;  
        if($_POST) {
            $message=$this->updateAirportItem();  
            $smarty->assign('message', $message);  
        }
        $id=mysqli_real_escape_string($con,$_GET['id']);
        $query="SELECT * FROM airport WHERE id='{$id}'";
        $result = mysqli_query ($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $rows=$row;
        }
        $smarty->assign('item', $rows);
        
        $countriesQuery="SELECT * FROM `countries`";
        $result = mysqli_query ($con, $countriesQuery);
        while ($row = mysqli_fetch_assoc($result)) {
            if($rows['countryId']==$row['id'])
                $row['selected']='selected';
            $countries[]=$row;
        }
        $smarty->assign('countries', $countries);
        
        $airlinesQuery="SELECT `airportAirLines`.airLineId FROM `airportAirLines`
        WHERE `airportAirLines`.airportId='{$id}';
        ";
        $result = mysqli_query ($con, $airlinesQuery);
        while ($row = mysqli_fetch_assoc($result)) {
            $selectedAirlines[]=$row['airLineId'];
        }
        $airlinesQuery="SELECT * FROM `airLines`";
        $result = mysqli_query ($con, $airlinesQuery);
        while ($row = mysqli_fetch_assoc($result)) {
            if(in_array($row['id'],$selectedAirlines))$row['checked']="checked";
            $airlines[]=$row;
        }
        $smarty->assign('airlines', $airlines);
        
        return $smarty->fetch('airports/item.tpl.html');         
    }
    
    function updateAirportItem(){
        global $con; 
            $message=""; 
            foreach($_POST as $k=>$itm){
                if($k!='airlineid'){
                    $p[$k]=mysqli_real_escape_string($con,$itm);
                    if(empty($itm))$message="Privaloma užpildyti visus laukelius<br />";
                }
            }
            if(empty($_POST['airlineid'])){
                $message.="Pasirinkite oro liniją";
            }
            if(!empty($message))return $message;
        
        mysqli_query($con,"UPDATE `airport` SET `countryId`='{$p['countryid']}', `longitude`='{$p['longitude']}', `latitude`='{$p['latitude']}', `title`='{$p['title']}' WHERE `id`='{$p['id']}'");      
        mysqli_query($con,"DELETE FROM `airportAirLines` WHERE `airportId`='{$p['id']}'");
        foreach($_POST['airlineid'] as $k=>$airlineId){
            $airlineId=mysqli_real_escape_string($con,$airlineId);
            mysqli_query($con,"INSERT INTO `airportAirLines`(`airportId`, `airLineId`) VALUES ('{$p['id']}','{$airlineId}')");   
        }
        return "Oro uostas <b>'".$p['title']."'</b> sėkmingai išsaugotas";         
    }
    
    function deleteAirportItem(){
        global $con;  
        if(($_POST)){
            foreach($_POST as $k=>$itm){
                $p[$k]=mysqli_real_escape_string($con,$itm);
            }
            if($p['send']){
                $q="DELETE FROM `airport` WHERE `id`='{$p['id']}'";
                $result = mysqli_query ($con, $q);
                mysqli_query($con,"DELETE FROM `airportAirLines` WHERE `airportId`='{$p['id']}'");
                return "Oro uostas sėkmingai pašalintas";
            }
        }            
    }
     
}
?>