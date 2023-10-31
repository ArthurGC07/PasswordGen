<script>
    function confirm_del(){
        var answer = window.confirm('Delete Record?')
        if(answer == true){
            window.location.href = "user_home.php"
        }
        else{
            return false;
        }
    }
</script>

<?php
class Connection{
    protected $db = null;
 
 
    public function Open(){
        try {
        $dsn      = "mysql:dbname=dummie_pw; host=localhost";
        $user     = "root";
        $password = "";
 
        $options  = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
 
            $this->db = new PDO($dsn, $user, $password, $options);
 
            return $this->db;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
 
    public function Close()
    {
        $this->db = null;
        return true;
    }
}

class database extends Connection{
    private $sql;

    public function select_where($app_name){
        parent::open();
        $this -> sql = "SELECT * FROM tb_pw WHERE nm_app = '". $app_name."'";
        $result = $mysqli -> query($this -> sql);
        if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                echo '
                <tr>
                    <th scope="row">'.$row['id_pw'].'</th>
                    <td>'.$row['nm_app'].'</td>
                    <td>'.$row['pw'].'</td>
                    <!--o href passa parametros via get "sintax: ?nome_do_paramentro(equivale ao name=".." do formulario) = valor do parametro"-->
                    <td><a href="form_update.php?id='.$row['id_pw'].'" style ="float: right;" class="btn btn-primary">Update</a></td>
                    <td><a href="../getdata.php?del_id='.$row['id_pw'].'" style ="float: right;" class="btn btn-danger">Delete</a></td>
                    
                </tr>
                ';
            }
        }

    }
    
    public function select(){
        $db = parent::open();
        $this->sql = "SELECT * FROM tb_pw WHERE tb_user_id_user = ?";
        $stmt = $db->prepare($this->sql);
        $stmt->execute([$_SESSION['id_user']]);
        $result = $stmt->fetchAll();

        
        foreach($result as $row){
            echo '
            <tr>
                <td>'.$row['nm_app'].'</td>
                <td>'.$row['app_login'].'</td>
                <td>'.$row['pw'].'</td>
                <td><a href="form.php?id='.$row['id_pw'].'" style ="float: right;" class="btn btn-primary">Update</a></td>
                <td><a href="form.php?del_id='.$row['id_pw'].'" style ="float: right;" class="btn btn-danger" onclick="return confirm_del()">Delete</a></td>

                
            </tr>

            ';
        }
    }
    
   public function create_pw($length){
        
        $pw = range(chr(33),chr(126));
        
        for($i = 0; $i < $length; $i++){
            $control = rand(0,93);
            @$final_pw = $final_pw . $pw[$control];
        }
        //avoid certain characters in the password;
        $array = array(chr(34),chr(39),chr(96),chr(60));
        $control = rand(0,93);
        $final_pw = str_replace($array, $pw[$control],$final_pw);
        return $final_pw;
    
    }

}

?>