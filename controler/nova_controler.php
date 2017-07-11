<?php class novaControler
{
    public function process()
    {
        require_once ('./model/nova_module.php');
        require_once ('./model/airlines_module.php');
        require_once ('./model/airports_module.php');
        require_once ('./model/extra_module.php');
        $nova = new novaModule();
        $nova->init();
        $airlines = new airlinesModule();
        $airports = new airportsModule();
        $extra = new extraModule();
        if(!empty($_GET['act']))
            $act = $_GET['act'];
        else
            $act="";
        switch ($act) {
            case 'airlines-list':
                $result = $airlines->formatAirlinesList();
                break;
            case 'airline-item':
                $result = $airlines->formatAirlineItem();
                break;
            case 'airlines-new':
                $result = $airlines->formatAirlinesCreate();
                break;
                
            case 'airports-list':
                $result = $airports->formatAirportsList();
                break;
            case 'airport-item':
                $result = $airports->formatAirportItem();
                break;
            case 'airports-new':
                $result = $airports->formatAirportsCreate();
                break;    
                
            case 'extra1':
                $result = $extra->extra1();
                break; 
            case 'extra2':
                $result = $extra->extra2();
                break;               
                
            case 'data':
                $result = $nova->read_save_data_curl();
                break;
            case 'data-form':
                $result = $nova->format_data_form();
                break;
            default:
                $result = $airports->formatAirportsList();
        }
        return $result;
    }
}
?>