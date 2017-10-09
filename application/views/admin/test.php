<html>
<body>
<script>
function mouseOut(){
   var x = document.getElementById('text1').value;
   var y = document.getElementById("sourceCode").value;
   document.getElementById("sourceCode").value= x;
}
function mouseOut1(){
   var x = document.getElementById('text1').value;
   var y = document.getElementById("sourceCode").value;
    document.getElementById('text1').value = y;
}

</script>
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
  <textarea cols="50" rows="10" id="text1" name="text" onmouseout="mouseOut()">
    </textarea>
  <br>
  <textarea cols="50" rows="10" 
  id = 'sourceCode' name="code" onmouseout="mouseOut1()" >  
  </textarea>
</body>
</html>