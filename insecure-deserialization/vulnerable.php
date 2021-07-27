<!-- research from: https://blog.convisoappsec.com/en/introduction-to-insecure-deserialization-in-php/ -->



<?php
Class  Employee
{
    public $username = 'Alice';
    public $team = 'Sales';
    public $age = 42;
    public $office = 'Volunteer';
    public $accountAdmin =  False;
    public  function  validateAdmin(){
    if ($this->accountAdmin){
        echo  ' [+] '  .  $this->username .  ' is administrator\n';
    } else {
        echo  ' [+] '  .  $this->username .  ' not is administrator\n';
        }
    }
}
$employee =  new  Employee();
echo  serialize($employee);
?>