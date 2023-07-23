<form id="schedulesubmit">
 
  <div class="row">
     <div class="col md-6">
          <label for='validationDefault05' class='form-label' >From</label>
            <select class='form-control' id='schedfrom'>
                <option value=2>Monday</option>
                <option value=3>Tuesday</option>
                <option value=4>Wednesday</option>
                <option value=5>Thursday</option>
                <option value=6>Friday</option>
                <option value=7>Saturday</option>
                <option value=1>Sunday</option>
            </select>
    </div>
    <div class="col md-6">
          <label for='validationDefault05' class='form-label' >To</label>
            <select class='form-control' id='schedto'>
                <option value=2>Monday</option>
                <option value=3>Tuesday</option>
                <option value=4>Wednesday</option>
                <option value=5>Thursday</option>
                <option value=6>Friday</option>
                <option value=7>Saturday</option>
                <option value=1>Sunday</option>
            </select>
    </div>
 </div>

 <div class="row">
    <div class="col md-6">
            <label for="validationDefault01" class="form-label">Time From</label>
            <input type="time" class="form-control" id="schedtimefrom" required>
    </div>
    <div class="col md-6">
           <label for="validationDefault01" class="form-label">Time To</label>
           <input type="time" class="form-control" id="schedtimeto" required>
    </div>
 </div>

 <hr>

 <div class="row">
    <div class="col md-12">
          <div class="text-center">
          <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
    </div>

 </div>


</form><!-- End settings Form -->