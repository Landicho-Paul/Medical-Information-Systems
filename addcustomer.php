<button type="submit" id="openModalBtn" class="btn btn-primary table-button uil uil-plus">Add User</button>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="savecustomer.php" method="post">
      <center><h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4></center>
      <hr>
      <div id="ac">
        <span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="Full Name" Required/><br>
        <span>Address : </span><input type="text" style="width:265px; height:30px;" name="address" placeholder="Address"/><br>
        <span>Contact : </span><input type="text" style="width:265px; height:30px;" name="contact" placeholder="Contact"/><br>
        <span>Product Name : </span><textarea style="height:70px; width:265px;" name="prod_name"></textarea><br>
        <span>Total: </span><input type="text" style="width:265px; height:30px;" name="memno" placeholder="Total"/><br>
        <span>Note : </span><textarea style="height:60px; width:265px;" name="note"></textarea><br>
        <span>Expected Date: </span><input type="date" style="width:265px; height:30px;" name="date" placeholder="Date"/><br>
        <div style="float:right; margin-right:10px;">
          <button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("openModalBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
      modal.style.display = "block";
    }

    span.onclick = function() {
      modal.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  });

  
</script>
