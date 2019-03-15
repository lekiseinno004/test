<?php include 'include/head.php'; ?>
</head>
<body>
<div class="container">
  <h2>OM PACKAGING SOLUTION</h2>

  <div class="input-group">
      <input type="text" class="form-control text-center" style="width: 100%;font-size:30px;text-transform: uppercase;" name="txtSearch" id="txtSearch" placeholder="โปรดกรอกไอดี LOT NO..." onkeypress="if(event.charCode==13){return false;}" autofocus>
      <span class="input-group-btn">
        <button class="btn btn-success" type="button" name="btnSearch" id="btnSearch"> <i class="fa fa-search" ></i> SEARCH </button>
      </span>
    </div><!-- /input-group -->

  <!-- <form id="frmsearch" class="form-inline">
  <div class="form-panel">
  <input type="text" name="txtSearch" id="txtSearch" class="form-control" style="width: 100%;font-size:30px;" placeholder="โปรดกรอกไอดี LOT NO..." onkeypress="if(event.charCode==13){return false;}" autofocus>
  <a href="#" name="btnSearch" id="btnSearch" class="btn btn-success"><i class="fa fa-search" ></i> SEARCH</a>
  </div>
  </form>  -->

  <br>
  <div class="form-panel">
  <div id="result"></div>
  </div>
</div>
<!-- ค้นหา Lot No -->
<script>
  $(document).ready(function(){
    $("#btnSearch").click(function(){
      if($("#txtSearch").val()==""){
        alert("โปรดกรอกไอดี LOT NO...");
      }else{
      $.post("ajax/search.php",
      {
        txtSearch: $("#txtSearch").val()
      },
      function(data){
        // alert($("#txtSearch").val());
        $("#result").html(data);
      });
      }
    });
  });
</script>
<?php include 'include/footer.php'; ?>