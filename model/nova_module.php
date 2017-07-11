<?php
class novaModule{

    function init(){
        /*global $smarty;  
          */
        
    }
        
    function format_list_html(){
        global $smarty;
        global $con;
        if(!empty($_GET['sort'])){
            $order_type=mysqli_real_escape_string($con,$_GET['sort']);
            if($order_type==0)$order=" ORDER BY title ASC";  
            if($order_type==1)$order=" ORDER BY title DESC"; 
            
            if($order_type==2)$order=" ORDER BY author ASC";  
            if($order_type==3)$order=" ORDER BY author DESC";
            
            if($order_type==4)$order=" ORDER BY type ASC";  
            if($order_type==5)$order=" ORDER BY type DESC";
            
            if($order_type==6)$order=" ORDER BY year ASC";  
            if($order_type==7)$order=" ORDER BY year DESC"; 
        }
        else
            $order=" ORDER BY title ASC";
        if(!empty($_GET['search'])){
            $search=mysqli_real_escape_string($con,$_GET['search']);
            $search_query=" where title LIKE '%{$search}%' OR author LIKE '%{$search}%' OR type LIKE '%{$search}%' OR year LIKE '%{$search}%' ";   
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
        $query = "SELECT * FROM books $search_query $order LIMIT $start_from, $per_page";
        $result = mysqli_query ($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[]=$row;
        }
        $smarty->assign('books', $rows);
        //paging
        $query = "select * from books $search_query";
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
        return $smarty->fetch('list.tpl.html');            
    } 
    
    function fomat_item_html(){
        global $smarty;
        global $con;  
        $id=mysqli_real_escape_string($con,$_GET['id']);
        $query="SELECT * FROM books WHERE id='{$id}'";
        $result = mysqli_query ($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $rows=$row;
        }
        $smarty->assign('item', $rows);
        return $smarty->fetch('item.tpl.html');   
    } 
    
    function format_data_form (){
        global $smarty;
        $smarty->assign('inserted', 0);
        return $smarty->fetch('data-form.tpl.html');    
    }
    
    function read_save_data_curl(){
        global $con;
        global $smarty;
        $ch = curl_init(mysqli_real_escape_string($con,"http://www.nationsonline.org/oneworld/country_code_list.htm"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        $content = curl_exec($ch);
        curl_close($ch);  
        include('simple_html_dom.php');
        include('Debug.php');
        $html = str_get_html($content);
        $k=0;
        mysqli_query($con,"DELETE FROM `countries`");
        mysqli_query($con,"ALTER TABLE countries AUTO_INCREMENT = 1");
        foreach ( $html->find('tr[class=border1]') as $item ) {
            $countrie['title']=trim($item->find('td', 1)->plaintext);
            $countrie['code']=trim($item->find('td', 2)->plaintext)."/".trim($item->find('td', 3)->plaintext);
            if(!empty($countrie['title']) && $countrie['title']!='&nbsp;'){
                $k++;
                mysqli_query($con,"INSERT INTO countries (title,code)VALUES ('{$countrie['title']}','{$countrie['code']}')");
            }
        }
        $smarty->assign('inserted', $k++);
        return $smarty->fetch('data-form.tpl.html');        
    }   
    
}
?>