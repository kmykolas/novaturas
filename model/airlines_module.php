<?php
class airlinesModule{
    
    function formatAirlinesList(){
        global $smarty;
        global $con;
        if($_POST) {
            $message=$this->deleteAirlineItem();  
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
            $search_query=" where `airLines`.title LIKE '%{$search}%' OR `countries`.title LIKE '%{$search}%'";   
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
        $query = "SELECT `airLines`.id, `airLines`.title, `countries`.title AS `countriie_name` FROM airLines
        LEFT JOIN `countries` ON `airLines`.countryId=`countries`.id
         $search_query $order LIMIT $start_from, $per_page";
        $result = mysqli_query ($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[]=$row;
        }
        $smarty->assign('airlines', $rows);
        //paging
        $query = "SELECT `airLines`.id, `airLines`.title, `countries`.title AS `countriie_name` FROM airLines
        LEFT JOIN `countries` ON `airLines`.countryId=`countries`.id
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
        return $smarty->fetch('airlines/list.tpl.html');         
    }
    
    public function formatAirlineItem(){
        global $smarty;
        global $con;  
        if($_POST) {
            $message=$this->updateAirlineItem();  
            $smarty->assign('message', $message);  
        }
        $id=mysqli_real_escape_string($con,$_GET['id']);
        $query="SELECT * FROM airLines WHERE id='{$id}'";
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
        return $smarty->fetch('airlines/item.tpl.html');         
    }
    
    public function updateAirlineItem(){
        global $con;  
        if(($_POST)){
            foreach($_POST as $k=>$itm){
                $p[$k]=mysqli_real_escape_string($con,$itm);
                if(empty($itm))return "Privaloma užpildyti visus laukelius";
            }
            if($p['send']){
                $q="UPDATE `airLines` SET `title`='{$p['title']}',`countryId`='{$p['countryid']}' WHERE `id`='{$p['id']}'";
                $result = mysqli_query ($con, $q);
                return "Sėkmingai atnaujinta";
            }
        }    
    }
    
    public function deleteAirlineItem(){
        global $con;  
        if(($_POST)){
            foreach($_POST as $k=>$itm){
                $p[$k]=mysqli_real_escape_string($con,$itm);
            }
            if($p['send']){
                $q="DELETE FROM `airLines` WHERE `id`='{$p['id']}'";
                $result = mysqli_query ($con, $q);
                mysqli_query($con,"DELETE FROM `airportAirLines` WHERE `airLineId`='{$p['id']}'");
                return "Oro linija sėkmingai pašalinta";
            }
        }            
    }
    
    public function formatAirlinesCreate(){
        global $con;  
        global $smarty;   
        $error=false;
        if(($_POST)){
            foreach($_POST as $k=>$itm){
                $p[$k]=mysqli_real_escape_string($con,$itm);
                //jei yra neuzpildytu prasom uzpildyti
                if(empty($itm)){
                    $error=true;
                    $smarty->assign('message', "Privalote užpildyti visus laukelius");
                }
            }
            if($p['send']==1 && !$error){
                $this->saveAirline($p);   
                $smarty->assign('message', "Avialinija sėkmingai sukurta");              
            }
        }
        $countriesQuery="SELECT * FROM `countries`";
        $result = mysqli_query ($con, $countriesQuery);
        while ($row = mysqli_fetch_assoc($result)) {
            $countries[]=$row;
        }
        $smarty->assign('countries', $countries);
        return $smarty->fetch('airlines/create.tpl.html');
    }
    
    public function saveAirline($post){
        global $con; 
        mysqli_query($con,"INSERT INTO `airLines`(`title`, `countryId`) VALUES ('{$post['title']}','{$post['countryid']}')");
        return true;    
    }
    
    
}
?>