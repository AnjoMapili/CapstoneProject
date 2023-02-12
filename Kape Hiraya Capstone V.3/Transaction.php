<?php
include "Connections/dbconnect.php";
?>

<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet" />
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/> 
      <link rel="stylesheet" href="CSS/transaction.css" />
<div class="grid-container"> 
    <?php
        include "templates/header.php";
        include "templates/sidebar.php";
    ?>     
    
        <!-- Main -->    
    
    <main class="main-container">
    <!-- <div class="scroll">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat gravida libero rhoncus ut.</div> -->
    <?php
      include "templates/dropdownlist.php";
      ?>
    
  
    

  <div class="container-fluid px-4">
    <h2 class="mt-4">Transactions</h2>
   
  
<!-- Modal Fade Add Customer Customer Form -->
<div class="modal fade" id="TransactionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content ">
      <div class="modal-header " style="color:black;">
        <h4 class="modal-title" id="exampleModalLabel" >Add Sales</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

  
      <!-- Modal Body -->
<div class="modal-body" style="color:black">

<div class="col-12 mt-4">
    <label for="titleInfo" class="form-label"><H3>CUSTOMER INFORMATION</H3></label>
  </div>

<form name="my-form" class="row g-3">
  <div class="col-md-6">
    <label for="ID" class="form-label">ID</label>
    <input type="text" class="form-control" id="inputID">
  </div>
  <div class="col-md-6">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="inputDate">
  </div>
  <div class="col-md-6">
    <label for="customer" class="form-label">Customer</label>
    <input type="text" class="form-control" id="inputCustomer" placeholder="Enter your customer name">
  </div>
  <div class="col-md-6">
    <label for="inputPayment" class="form-label">Payment Method</label>
    <select name="payment" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option selected>--Select--</option>    
  <option value="1">Cash</option>
  <option value="2">Gcash</option>
  
</select>

  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Address</label>
    <input type="email" class="form-control" id="inputEmail4" placeholder="Enter your address">
  </div>
    
  <div class="col-6 mb-4">
    <label for="inputAddress" class="form-label">Cotanct #</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Enter your contact number">
  </div>
  <hr style="height:1px;border-width:0;color:black;background-color:black;margin-top:20px;margin-bottom:40px;">
  <div class="col-12">
    <label for="inputAddress2" class="form-label"><H3>ITEM INFORMATION</H3></label>
  </div>
  <table class="table mt-0 fs-5">
  <thead>
    <tr >
      <th scope="col">Flavor</th>
      <th scope="col">Type of Roast</th>
      <th scope="col">Type of Grind</th>
      <th scope="col">Quantity</th>
      <th scope="col">Grams</th>
      <th scope="col">Price</th>
      <th scope="col">Input Item</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        
      <select name='flavor' class='flavor-item form-control fs-5' aria-label='Default select example'>
      <option disabled selected>--select--</option>
      <?php
        $sql = "SELECT * FROM products";
        $result = $con->query($sql);
        
      
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
        
          
        ?>
        <option value="<?=$row['id']?>"><?=$row['name']?></option>
      
        <?php }
        }
        ?>
        </select>
</td>

      <td><select name='roast' class='roast-item form-control fs-5' aria-label='Default select example'>
      <option disabled selected>--select--</option>
      <?php
        $sql = "SELECT * FROM  typeofroast
        ";
        $result = $con->query($sql);
      
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          
        ?>
        <option value="<?=$row['id']?>"><?=$row['name']?></option>
        <?php }
        }
        ?>
        </select> </td>
      <td><select name='roast' class='roast-item form-control fs-5' aria-label='Default select example'>
      <option disabled selected>--select--</option>
      <?php
        $sql = "SELECT * FROM  typeofgrind
        ";
        $result = $con->query($sql);
      
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          
        ?>
        <option value="<?=$row['id']?>"><?=$row['name']?></option>
        <?php }
        }
        ?>
        </select></td>
      <td> <div class="input-group">
  <input type="text" class="form-control" placeholder="Quantity" aria-label="Recipient's username" aria-describedby="basic-addon2">
         </td>
      
      <td><?php
        $selected="--select--";
        $options = array('--select--','250G','500G','1KG');
        

        echo"<select name='grams' class='form-control fs-5' aria-label='Default select example'>";
        foreach($options as $option){
          if($selected == $option){
          echo"<option selected = 'selected' value='$option'>$option</option>";
        }
        else{
        echo"<option value='$option'>$option</option>";
          }
        }
        echo"</select>";
        ?></td>
      <td> <div class="input-group">
  <input type="text" class="form-control" placeholder="Price" aria-label="Recipient's username" aria-describedby="basic-addon2">

</div>
</td>
      <td>
        <button type="button" class="add-more-item btn btn-info btn-sm">Add Item</button>
      </td>
    
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    
  </tbody>
</table>

 


</div>
<!-- Modal Footer -->
<div class="modal-footer">
        <button type="submit" value="Submit" class="btn btn-success">sumbit</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"onclick="myFunction()" value="Reset form">close</button>
 
      </div> 
</form>   
      </div>                                
    </div>
  </div>
       <!-- Add Customer button Modal -->
<button type="button" id="btncustomer" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#TransactionModal">
  Add Sales

</button>


</main>
<!-- End Main -->
        
</div>


<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script src="JS/transaction.js "></script>


      