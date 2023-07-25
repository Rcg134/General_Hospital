<form id="schedulesubmit">
 
  <div class="row">
     <div class="col md-6">
          <label for='validationDefault05' class='form-label' >From</label>
            <select class='form-control' id='schedfrom'>
                <option value=2 <?php if ($DayFrom == "2") echo "selected"; ?>>Monday</option>
                <option value=3 <?php if ($DayFrom == "3") echo "selected"; ?>>Tuesday</option>
                <option value=4 <?php if ($DayFrom == "4") echo "selected"; ?>>Wednesday</option>
                <option value=5 <?php if ($DayFrom == "5") echo "selected"; ?>>Thursday</option>
                <option value=6 <?php if ($DayFrom == "6") echo "selected"; ?>>Friday</option>
                <option value=7 <?php if ($DayFrom == "7") echo "selected"; ?>>Saturday</option>
                <option value=1 <?php if ($DayFrom == "1") echo "selected"; ?>>Sunday</option>
            </select>
    </div>
    <div class="col md-6">
          <label for='validationDefault05' class='form-label' >To</label>
            <select class='form-control' id='schedto'>
                <option value=2 <?php if ($DayTo == "2") echo "selected"; ?>>Monday</option>
                <option value=3 <?php if ($DayTo == "3") echo "selected"; ?>>Tuesday</option>
                <option value=4 <?php if ($DayTo == "4") echo "selected"; ?>>Wednesday</option>
                <option value=5 <?php if ($DayTo == "5") echo "selected"; ?>>Thursday</option>
                <option value=6 <?php if ($DayTo == "6") echo "selected"; ?>>Friday</option>
                <option value=7 <?php if ($DayTo == "7") echo "selected"; ?>>Saturday</option>
                <option value=1 <?php if ($DayTo == "1") echo "selected"; ?>>Sunday</option>
            </select>
    </div>
 </div>

 <div class="row">
    <div class="col md-6">
            <label for="validationDefault01" class="form-label">Time From</label>
            <input type="time" class="form-control" id="schedtimefrom" required
            value=<?php $Timefrom = (empty($TimeFrom)) ? '' : $TimeFrom;         
                    echo $Timefrom;
                  ?>
            >
    </div>
    <div class="col md-6">
           <label for="validationDefault01" class="form-label">Time To</label>
           <input type="time" class="form-control" id="schedtimeto" required
           value=<?php $Timeto = (empty($TimeTo)) ? '' : $TimeTo;         
                    echo $Timeto;
                  ?>
           >
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