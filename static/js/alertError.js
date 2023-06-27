const showerror = (msg) => {

      $("#alert").show().fadeIn(200).delay(2000).fadeOut(200);
      $("#errormsg").text(msg);

}


const showsuccess = (msg) => {

      $("#success").show().fadeIn(200).delay(2000).fadeOut(200);
      $("#successmessage").text(msg);

}