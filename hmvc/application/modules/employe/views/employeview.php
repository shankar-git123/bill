<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
  .gradient-custom-3 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}
.gradient-custom-4 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))


}
</style>
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5"><u>REGISTRATION FORM</u></h2>

              <form method="post" action="<?= base_url() ?>Employe/savedata">

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name"/>
                </div>
                <hr>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3cg">Age</label>
                  <input type="text" id="form3Example3cg" class="form-control form-control-lg" name="age" />
                </div>
                <hr>
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3cg">Gender</label><br>
                <input type="radio" id="male" name="fav_gender" value="Male">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="fav_gender" value="Female">
                <label for="female">Female</label><br>
                <input type="radio" id="other" name="fav_gender" value="other">
                <label for="other">Other</label><br>
                </div>
                <hr>
                <div class="form-outline mb-4">
                <label for="language">Language</label><br>
                <input type="checkbox" id="language1" name="language1" value="nepali">
                <label for="language1"> Nepali</label><br>
                <input type="checkbox" id="language2" name="language1" value="english">
                <label for="language2"> English</label><br>
                <input type="checkbox" id="language3" name="language1" value="hindi">
                <label for="language3"> Hindi</label><br>
                </div>
                <hr>
                <label for="country">Choose a country:</label>
                <div class="form-group">
                <select name="country" id="country" class="form-control input-lg">
                <option value="">Select Country</option>
                <?php
                foreach($country as $row)
                {
                echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
                }
                ?>
                </select>
                </div>
                <hr>
                <label for="province">Choose a province</label>
                <div class="form-group">
                <select name="province" id="province" class="form-control input-lg">
                <option value="">Select Province</option>
                </select>
                </div>
                <hr>
                <label for="Municipality">Choose a Municipality</label>
                <div class="form-group">
                <select name="municipality" id="municipality" class="form-control input-lg">
                <option value="">Select Municipality</option>
                </select>
                </div>
                <hr>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Address</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="address" />
                </div>
                <hr>
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Mobile Number</label>
                  <input type="number" id="form3Example1cg" class="form-control form-control-lg" name="mobile"/>
                </div>
                <hr>
                <!-- <div class="form-outline mb-4"> -->
                  <!-- <label class="form-label" for="form3Example1cg">Patient ID</label> -->
                  <!-- <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="patient_id" /> -->
                <!-- </div> -->
                <hr>
                <div>
                  <label for="datetime">Date And Time</label>
                  <input type="datetime-local" name="date_time">
                </div>
                <hr>
                <br>

                <button type="submit" class="btn btn-primary" id="butsave" name="save">Register</button>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$(document).ready(function(){
 $('#country').change(function(){
  var country_id = $('#country').val();
  if(country_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Employe/fetch_province",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     $('#province').html(data);
     $('#municipality').html('<option value="">Select Municipality</option>');
    }
   });
  }
  else
  {
   $('#province').html('<option value="">Select province</option>');
   $('#municipality').html('<option value="">Select Municipality</option>');
  }
 });
 $('#province').change(function(){
  var province_id = $('#province').val();
  if(province_id != '')
  {
    $.ajax({
      url:"<?php echo base_url(); ?>Employe/fetch_municipality",
      method:"POST",
      data:{province_id:province_id},
      success:function(data)
      {
        $('#municipality').html(data);
      }
    // else
    // {
    //   // $('#province').html('<option value="">Select province</option>');
    //   $('#municipality').html('<option value="">Select Municipality</option>');

    // }
    });
  }
 });
});
</script>




<!-- <script>
$(function() {
    //  getTableData();
});


$("#createBtn").click(function() {
    var employename = $("#employename").val();
    var employeid = $("#employeid").val();
    var employemail = $("#employemail").val();

    // saveupdate("#createBtn","getTableData");


    // var url = "http://192.168.100.251/priyanka/2291/3643/accounts/Employe/saveEmployee";

    var url = "<?php echo base_url()."employe/saveEmployee" ?>";

    $.post(url, {
            employename,
            employeid,
            employemail
        },
        function(checkdata) {

            checkdata = JSON.parse(checkdata);

            if (checkdata.status == "success") {
                alert(" Data save");
            } else {
                alert("failed");
            }

        });


    //FOR READ

});
</script> -->