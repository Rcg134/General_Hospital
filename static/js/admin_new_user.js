function getcolumn(button) {
     var firstTdText = button.closest('tr').querySelector('td:first-child').innerText;
     $("#lblcolumnid").text(firstTdText)
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
                    showerror(dataResult)
                 }
                     
            },
            error: function (xhr, ajaxOptions, thrownError){
                 $("#userrolemodal").modal('hide');
                showerror(thrownError)
               } 
                 
       });
  
  }