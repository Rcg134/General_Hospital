function getcolumn(button) {
    var row = button.parentNode.parentNode; 
    var idcol = row.cells[0].textContent; 
    $("#lblcolumnid").text(idcol)
  }
  
  
  
  
  function submitsetuserrole(event){
      var colid = $("#lblcolumnid").text()
      var selectid = $("#userroleid").val()
      setusertype('../PHP/HospitalappController/admin_user_role_set.php', colid, selectid);
  }
  
  





  function setusertype(PHP,colid,selectid){
    var form_data = new FormData();
  
    form_data.append("Colid", colid)  
    form_data.append("Selectid", selectid)  
  
       
           $.ajax({
            url: PHP,
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            cache: false,
            success: function(dataResult){
                 if(dataResult == true){
                  $("#userrolemodal").modal('hide');
                   location.reload();
                 }
                 else{
                    alert(dataResult);
                 }
                     
            },
            error: function (xhr, ajaxOptions, thrownError){
                 $("#userrolemodal").modal('hide');
                alert(thrownError);
               } 
                 
       });
  
  }