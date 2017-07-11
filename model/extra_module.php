<?php
class extraModule{

    function extra1(){
        global $smarty;
        global $con; 
        $query="SELECT `countries`.title
        FROM `countries`
        LEFT JOIN `airLines` ON `countries`.id = `airLines`.countryId
        WHERE `airLines`.countryId IS NULL ";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[]=$row;
        }
        $smarty->assign('countries', $rows);
        return $smarty->fetch('extra/extra1.tpl.html');        
    }
    
    function extra2(){
        global $smarty;
        global $con; 
        
        $countriesQuery="SELECT * FROM `countries`";
        $result = mysqli_query ($con, $countriesQuery);
        while ($row = mysqli_fetch_assoc($result)) {
            if($rows['countryId']==$row['id'])
                $row['selected']='selected';
            $countries[]=$row;
        }
        $smarty->assign('countries', $countries); 
        if($_POST)     
        $smarty->assign('airports', $this->search_by_country());
        return $smarty->fetch('extra/extra2.tpl.html');        
    }
    
    function search_by_country(){
        global $con;  
        $id=mysqli_real_escape_string($con,$_POST['countryid']); 
        $query="SELECT `airport`.title FROM `airLines`
        LEFT JOIN `airportAirLines` ON `airLines`.id = `airportAirLines`.airLineId
        LEFT JOIN `airport` ON `airportAirLines`.airportId = `airport`.id
        WHERE `airLines`.countryId='{$id}' GROUP BY `airport`.title ORDER BY `airport`.title ASC 
        ";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[]=$row;
        }
        return $rows;
    }
        
}
?>