
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

<table style="width:50%">
<?php foreach($data as $key => $value): ?> 
  <tr>
    <th>Id</th>
    <th>Name</th> 
    <th>Price</th>
  </tr>
    <tr>    
      <td><?=$value->id;?></td>
      <td><?=$value->name;?></td>
      <td><?=$value->price;?></td>                   
    </tr>
<?php endforeach; ?>
</table>

</body>
</html>
