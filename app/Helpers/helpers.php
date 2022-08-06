<?php

if (!function_exists('active_class')) {
    function active_class($url)
    {
        $current_url = url()->current();
        if($url == $current_url){
            return 'active';
        }
    }
}

function get_product_statuses(){
    $a = [
        0=>[
            'code' => 'Draft',
            'name' => 'Borrador',
        ],
        1=>[
            'code' => 'Shop',
            'name' => 'Público',
        
        ],
        2=>[
            'code' => 'Disabled',
            'name' => 'Desactivado',
        ],
    ];
    return $a;
}


