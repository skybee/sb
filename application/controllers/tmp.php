<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tmp extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    function index(){
        echo 'Tmp Index Controller';
    }
    
    function _chenge_all_cat_uri(){
        $query = $this->db->query("SELECT `id` FROM  `category` ORDER BY  `id`");
        
        foreach ($query->result_array() as $row){
            $this->chenge_cat_uri( $row['id'] );
        }
        
        echo '<br /> Все изменения завершены<br /><br />';
        
        $this->change_sub_cat_id();
    }
      
    private function chenge_cat_uri( $cat_id ){
        $this->load->model('category_m');
        
        $cat_url = $this->category_m->change_cat_full_uri( $cat_id );
        
        if( $cat_url ){
            echo 'В категории ID: '.$cat_id.' URL изменен на: '.$cat_url.'<br />';
        }
        else{
            echo 'URL не изменен ID: '.$cat_id.'<br />';
        }
    }
       
    private function get_sub_cat_id( $id = 0 ){
        $sql        = "SELECT `id` FROM `category` WHERE `parent_id` = '{$id}' ";
        $query      = $this->db->query( $sql );
        $pIdList    = '';
        
        if( $query->num_rows() < 1 ) return ''; 
        
        foreach( $query->result_array() as $row){
            $pIdList   .= ','.$row['id'];
            $query2     = $this->db->query("SELECT `id` FROM `category` WHERE `parent_id` = '{$row['id']}'");
            if( $query2->num_rows() > 0 ){
                $pIdList .= ','.$this->get_sub_cat_id( $row['id'] );
            }
        }
        
        return trim( $pIdList, ',');
    }
    
    private function change_sub_cat_id(){
        $sql = "SELECT `id` FROM `category` ORDER BY `id` ";
        $query = $this->db->query($sql);
        
        foreach( $query->result_array() as $row ){
            $subId = $this->get_sub_cat_id($row['id']);
            
            if( !empty($subId) ){
                $this->db->query("UPDATE `category` SET `sub_cat_id`='{$subId}' WHERE `id` = '{$row['id']}' ");
                echo 'ID: '.$row['id']."<br />\n".$subId."<br /><br />\n\n";
            }
        }
    }
    
    function _url(){
        
        function url_slug($str, $options = array()) {
            // Make sure string is in UTF-8 and strip invalid UTF-8 characters
            $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

            $defaults = array(
                    'delimiter' => '-',
                    'limit' => null,
                    'lowercase' => true,
                    'replacements' => array(),
                    'transliterate' => false,
            );

            // Merge options
            $options = array_merge($defaults, $options);

            $char_map = array(
                    // Latin
                    'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
                    'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
                    'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
                    'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
                    'ß' => 'ss', 
                    'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
                    'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
                    'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
                    'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
                    'ÿ' => 'y',

                    // Latin symbols
                    '©' => '(c)',

                    // Greek
                    'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
                    'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
                    'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
                    'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
                    'Ϋ' => 'Y',
                    'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
                    'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
                    'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
                    'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
                    'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

                    // Turkish
                    'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
                    'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 

                    // Russian
                    'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
                    'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
                    'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
                    'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
                    'Я' => 'Ya',
                    'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
                    'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
                    'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
                    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
                    'я' => 'ya',

                    // Ukrainian
                    'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
                    'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

                    // Czech
                    'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
                    'Ž' => 'Z', 
                    'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
                    'ž' => 'z', 

                    // Polish
                    'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
                    'Ż' => 'Z', 
                    'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
                    'ż' => 'z',

                    // Latvian
                    'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
                    'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
                    'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
                    'š' => 's', 'ū' => 'u', 'ž' => 'z'
            );

            // Make custom replacements
            $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

            // Transliterate characters to ASCII
            if ($options['transliterate']) {
                    $str = str_replace(array_keys($char_map), $char_map, $str);
            }

            // Replace non-alphanumeric characters with our delimiter
            $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

            // Remove duplicate delimiters
            $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

            // Truncate slug to max. characters
            $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

            // Remove delimiter from ends
            $str = trim($str, $options['delimiter']);

            return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
        }
        
        echo url_slug("Винницкий облсовет    -  признал    Россию агрессором, а \"ДНР\" и \"ЛНР\" - террористами",array('transliterate' => true));
    }
}