<?PHP
class form_model extends Connection{
    private $sql;
    
    public function insert_random_pw($name,$login, $length, $id){
        //starts connection
        $db = parent::open();

        // the colons (:) is a placeholder for values that will be associated. not native to PHP, is from PDO.
        $this->sql = "INSERT INTO tb_pw(nm_app, app_login, pw, tb_user_id_user) VALUES (:name, :login, :length, :id)";
        $stmt = $db->prepare($this->sql);

        //you can pass the associative array directly to execute(), and PDO will bind the values for you.
        $params = array(
            ':name' =>$name,
            ':login' => $login,
            ':length' => $length,
            ':id' =>$id
        );
        //execute and binds the values
        $stmt->execute($params);
        
        //closes DB connection
        parent::Close();
        
        //the query was built like this to avoid sql injection.

        //redirect users to this page
        header('location: user_home.php');

    }
    public function insert_existing_pw(){
        $db = parent::open();

        $this->sql = "INSERT INTO tb_pw(nm_app, app_login, pw, tb_user_id_user) VALUES ('".$_POST['name']."','".$_POST['login']."','".$_POST['pw_exists']."','".$_SESSION['id_user']."')";
        $db->query($this->sql);

        parent::Close();

        header('location: user_home.php');
    }

    public function update_exists_pw(){
        $db = parent::open();
        $this->sql = "UPDATE tb_pw SET nm_app = '".$app_name = $_POST['name']."', app_login = '".$_POST['login']."', pw = '".$this->update_password = $_POST['pw_exists']."' WHERE id_pw = '".$_POST['id']."'";
        $db->query($this->sql);
        parent::close();
    }
    public function update_random_pw(){
        $db = parent::open();
        $generate_pw = new database();
        $this->sql = "UPDATE tb_pw SET nm_app = '".$app_name = $_POST['name']."', app_login = '".$_POST['login']."', pw = '".$generate_pw->create_pw($_POST['length'])."' WHERE id_pw = '".$_POST['id']."'";
        $db->query($this->sql);
        parent::close();
    }

    public function filled_form(){
        $db = parent::open();
        $id = @$_GET['id'];

        if($id != NULL){
            $this -> sql = "SELECT * FROM tb_pw WHERE id_pw = ".$id;
            $query = $db->query($this->sql);
            return $res = $query->fetch();
        }
    }

    public function delete(){
        $db = parent::open();
        $this->sql = "DELETE FROM tb_pw WHERE id_pw = ".$_GET['del_id'];
        $db->query($this->sql);
        parent::close();
    }
}

$obj = new form_model();
$generate_pw = new database;

//inserts
if(@$_POST['id'] == NULL && @$_POST['name'] != NULL && @$_POST['login'] != NULL && @$_POST['length'] != NULL && @$_POST['pw_exists'] == NULL){
    $obj->insert_random_pw($_POST['name'], $_POST['login'], $generate_pw->create_pw($_POST['length']), $_SESSION['id_user']);
    header('location: user_home.php');
}
else if(@$_POST['id'] == NULL && @$_POST['name'] != NULL && @$_POST['login'] != NULL && @$_POST['length'] == NULL && @$_POST['pw_exists'] != NULL){
    $obj->insert_existing_pw();
    header('location: user_home.php');
}

//condition that avoid the user entering the random password and a already existing password at the same time
else if(@$_POST['name'] != NULL && @$_POST['login'] != NULL && @$_POST['length'] != NULL && @$_POST['pw_exists'] != NULL){
    header('location:form.php?par=error');
}
//update
if(@$_POST['id'] != NULL && @$_POST['name'] != NULL && @$_POST['login'] != NULL && @$_POST['length'] == NULL && @$_POST['pw_exists'] != NULL){
    $obj->update_exists_pw();
    header('location: user_home.php');
}
elseif(@$_POST['id'] != NULL && @$_POST['name'] != NULL && @$_POST['login'] != NULL && @$_POST['length'] != NULL && @$_POST['pw_exists'] == NULL){
    $obj->update_random_pw();
    header('location: user_home.php');
}
// avoids that the user updates the password randomly and with a already existing password at the same time
elseif (@$_POST['id'] != NULL && @$_POST['name'] != NULL && @$_POST['login'] != NULL && @$_POST['length'] != NULL && @$_POST['pw_exists'] != NULL) {
    header('location:form.php?id='.$_POST['id'].'&par=error_update');
}
//delete
if(@$_GET['del_id']){
    $obj->delete();
    header('location: user_home.php');
}
?>