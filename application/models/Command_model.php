<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Command_model extends MY_Model {

	public $table = 'command'; // you MUST mention the table name
    public $primary_key = 'COMMAND_ID'; // you MUST mention the primary key
    public $fillable = array('USER_ID', 'COMMAND', 'NEWS_ID'); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array('DATE'); // ...Or you can set an array with the fields that cannot be filled by insert/update
    public function __construct()
    {
        // you can disable the use of timestamps. This way, MY_Model won't try to set a created_at and updated_at value on create methods. Also, if you pass it an array as calue, it tells MY_Model, that the first element is a created_at field type, the second element is a updated_at field type (and the third element is a deleted_at field type if $this->soft_deletes is set to TRUE)
        $this->timestamps = FALSE;

        // you can set how the model returns you the result: as 'array' or as 'object'. the default value is 'object'
        $this->return_as = 'array';

        parent::__construct();
    }
}
