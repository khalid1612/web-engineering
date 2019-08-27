 $(document).ready(function() {

   //define Select
   var select = document.getElementById("slot");

   $.post("php/fetch-slot.php", {

     },
     function(data) {
       var objData = jQuery.parseJSON(data);

       for (var i = 0; i < objData.length; i++) {
         var option = document.createElement("option");
         option.text = objData[i][0] + '\xa0\xa0\xa0\xa0\xa0\xa0\xa0' + objData[i][1] + " seats available";
         option.value = objData[i][0];

         if (objData[i][1] <= 0) {
           option.disabled = true;
         }


         select.appendChild(option);
       }
     });

 });
