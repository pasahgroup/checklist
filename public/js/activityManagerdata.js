$(document).ready(function(){

      // Department Change
      $('#metaname_model').change(function(){
         // ward
         var v = $(this).val();
           // Empty the dropdown
          $('#asset_model').find('option').not(':first').remove();
         // $('#village').find('option').not(':first').remove();
         // $('#project_name').find('option').not(':first').remove();
         // $('#project_activities').find('option').not(':first').remove();

         // AJAX request
         $.ajax({
           url: 'getA/'+v,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['dataA'] != null){
               len = response['dataA'].length;
             }

                       if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response['dataA'][i].id;
                 var name = response['dataA'][i].asset_name;
                 var option = "<option value='"+id+"'>"+name+"</option>";
                 $("#asset_model").append(option);
               }
             }
             //DAta are here

           }
        });
      });
    });
