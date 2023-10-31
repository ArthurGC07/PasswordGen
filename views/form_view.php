<!--Display data-->
<style>
  .table{
    width: 70%; 
    border: 1px solid white;
    margin-top: 2%;
  }
</style>
<center><table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Login</th>
      <th scope="col">Senha</th>
      <th scope="col" style="width: 1%;"></th>
      <th scope="col"><a href="form.php" class="btn btn-success" style="float: right;">New Record</a></th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(@$_GET['app_name'] === NULL){
      $read = new database();
      $read -> select();
    }
    /*else{
      $select = new database();
      $select -> select_where($_GET['app_name']);
    }
*/
    ?>
  </tbody>
</table>
  </center>
</body>
</html>