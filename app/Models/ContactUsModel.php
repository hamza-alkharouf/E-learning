<?php 
namespace App\Models;

use CodeIgniter\Model;


class Contact extends Model{
    protected $table = 'contact';
    /**
     * Create a new contact 
     *
     * @param array $data
     * @return array
     */
    function insertcontact($data){
        $db = \Config\Database::connect();
        $builder = $db->table('contact');
        $builder->insert($data);
    }


 /**
  * Return  user contact
  *
  * @param int $nb_paginate
  * @return array
  */
  function getmessage($nb_paginate){
    $db = \Config\Database::connect();
    return  $this->paginate($nb_paginate);
}


   
    

}
?>