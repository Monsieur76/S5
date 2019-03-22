 $(document ).ready(function() {
     $('.fn_modify_modal').click(function (e) {
         if (confirm("Etes vous sur de vouloir confirmer ?")) {
         } else {
             e.preventDefault();
         }
     })
    });
