<script>
  $(function() {
    $( "#customers_" ).autocomplete({
      source: 'autocomplete/search.php'
    });
  });
  </script>

<?php include_once "underheader.php"; ?>
         
 <?php include_once 'menu.php'; ?>
     <div class="home-cases-section">
      <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading c-list">
            <span class="title">التنفيذ</span>
           <ul class="pull-left c-controls">
                    <li><a href='index.php?action=newexecution'><i class="glyphicon glyphicon-plus"></i></a></li>

                </ul>
           </div>
          <div class="panel-body">
           <div>
           
           <form action="index.php?action=cases" method="post">
              <div class="form-group" style="direction: rtl;">
               <div class="row">
                 <div class="col-sm-12">
                 <label for="exampleInputEmail1">الموكل</label>
                  <input type="text" class="form-control"  placeholder="" name="customers_" id="customers_" 
                          value="<?php if(isset($_POST['customers'])) echo $_POST['customers'];?>"> 
                 
                 </div>
               </div>
              </div>
              <div class="form-group">
                      <div class="row">
                         <div style="direction: rtl; text-align: center;">
                   <div > 
                       <button type="submit" class="btn btn-primary" style=" width: 200px;" name="submit">بحث</button>
                   </div>
                 </div>
                          </div>
                  </div>
            </form>
           </div>
          </div>
        </div>
     </div>