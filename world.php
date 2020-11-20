<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$cname = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<?php if(isset($cname) && isset($_GET['context'])){
 
  $stmt = $conn->query("SELECT * FROM countries JOIN cities ON cities.country_code=countries.code WHERE countries.name LIKE '%$cname%'");
  // $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$cname%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>

  <table>
    <tr>
      <th>name</th>
      <th>District</th>
      <th>Population</th>
    </tr>
    <?php foreach($results as $row){?>
      <tr>
        <td><?= $row['name']?></td>
        <td><?= $row['district']?></td>
        <td><?= $row['population']?></td>
      </tr>
    <?php } ?>
  </table>
  <?php } ?>

  <?php if(isset($cname) && !isset($_GET['context'])){
 
//  $stmt = $conn->query("SELECT * FROM countries JOIN cities ON cities.country_code=countries.code WHERE countries.name LIKE '%$cname%'");
 $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$cname%'");
 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);?>

 <table>
   <tr>
     <th>name</th>
     <th>Continent</th>
     <th>Independence</th>
     <th>Head of State</th>
   </tr>
   <?php foreach($results as $row){?>
     <tr>
       <td><?= $row['name']?></td>
       <td><?= $row['continent']?></td>
       <td><?= $row['independence_year']?></td>
       <td><?= $row['head_of_state']?></td>
     </tr>
   <?php } ?>
 </table>
 <?php } ?>

 



