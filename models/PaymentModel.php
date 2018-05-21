<?php
    include('db/DBHelper.php');
    class PaymentModel extends DBHelper{
    private $table = "tbl_payment";
    private $fields = array(
        'payment_id',
        'payment_receipt_id',
        'student_id',
        'tshirt',
        'ticket'
        );

        //constructor
        function __construct()                                              { DBHelper:: __construct();}
        function addPayment($data)                                          { return  DBHelper :: register($this->table,$this->fields,$data);}
        function getAllPayment()                                            { return  DBHelper :: getAllRecords($this->table);}
        function getPayment($field,$data)                                   { return  DBHelper :: getRecord($this->table,$field,$data);}
        function deletePayment($field,$id)                                  { return DBHelper :: deleteRecord($this->table,$field,$id);}
        function edit($fields,$data,$field_id,$ref_id)                      { return DBHelper :: updateRecord($this->table,$fields,$data,$field_id,$ref_id);                                                                }
        function studentID($field,$ref_id)                                  { return  DBHelper :: joinToGetIdNum($this->table,$field,$ref_id);}
        function tshirtticket($field,$ref_id)                               { return  DBHelper :: joinToGetPrice($this->table,$field,$ref_id);}
        function updateTshirtTicket($fields,$data,$field_id,$ref_id)        { return  DBHelper :: updateCertainRecords($fields,$data,$field_id,$ref_id);}
    }//end of class

?>