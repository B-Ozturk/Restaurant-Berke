<?Php
// The class for the user
class User{
    public $id;
    public $email;
    public $password;
    public $name;
    public $role;

    public function _construct(){
        settype($this->id, 'integer');
    }
}
?>