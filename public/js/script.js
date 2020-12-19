$(function(){
    $(".alert").delay(500).fadeOut(1000, function () { $(this).remove(); });
    $(".rating input:radio").attr("checked", false);

    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });


    $('.leavecomment .rate span').on('click',function(){
      $(this).toggleClass('checked');
    });
	var height=0;
  if($('.category-block').eq(0).height()>height){
    height=$('.category-block').height();
  }
  else if($('.category-block').eq(1).height()>height){
    height=$(this).height();
}
else if($('.category-block').eq(2).height()>height){
  height=$(this).height();
}
else if($('.category-block').eq(3).height()>height){
  height=$(this).height();
}
else if($('.category-block').eq(4).height()>height){
  height=$(this).height();
}
$('.category-block').height(height);

$('.toggle2_info').click(function(){

		$(this).toggleClass('selected').parent().next('.user').fadeToggle();
		if($(this).hasClass('selected')){
		    $(this).html('<i class="fa fa-minus float-right fa-2x"></i>');
		}else{
		    $(this).html('<i class="fa fa-plus float-right fa-2x "></i>');

		}


	});

function ajax(type,url,data,processData,contentType)
{
	var results;
    $.ajax
      ({
      type: type,
      url: url,
      dataType: 'json',
      data: data,
      async:false, //stop untill the ajax request done
	  processData: processData,
	  contentType: contentType,
      success: function (data)
      {
        console.log(data);
        results = data;
      },
      error:function(data)
      {
        console.log(data);
        results = data;
      }
      });
    // console.log(results);
    return results;
}
$(document).on('click','.delete',function(){//$('.delete').on('click')==>will cause problems
	event.preventDefault();
	var url = $(this).attr('href');
	var currentUrl = location.href;
	var result = ajax('GET',url,'',true,false);
	swal(result.success,
	{
	  icon: "success",
	  buttons: false,
	  timer: 1500,
    });
    $('.ajax-table').load(currentUrl+' #ajax-container');
});
$(document).on('click','.delete',function(){//$('.delete').on('click')==>will cause problems
	event.preventDefault();
	var url = $(this).attr('href');
	var currentUrl = location.href;
	var result = ajax('GET',url,'',true,false);
	swal(result.success,
	{
	  icon: "success",
	  buttons: false,
	  timer: 1500,
    });
    $('.ajax-member-table').load(currentUrl+' #ajax-member-container');
});

$(document).on('submit','#add',function(){
   event.preventDefault();
   var url = $(this).attr('action');
   var currentUrl = location.href;
   var form = '#'+$(this).attr('id');
   var formData = new FormData($(form)[0]);
   //console.log(url);
   var result = ajax('POST',url,formData,false,false);
   if(result.success == "Added Successfully")
   {
	    swal(result.success,
		{
		  icon: "success",
		  buttons: false,
		  timer: 1500,
        });

        $('.ajax-block').load(currentUrl+' #ajax-add-container');

    }
   else
   {

	   errors = result.responseJSON.errors;
       console.log(result.responseJSON.errors);
       getAJAX(conutriesURL);

	   $.each(errors,function(key,value){
		  console.log(key);
		  console.log(value);
		  console.log($('input[name="' + key + '"]'));
		  if($('input[name="' + key + '"]').next().has('span'))
		  {
			$('input[name="' + key + '"]').next().remove();
          }
          if($('select[name="' + key + '"]').next().has('span'))
		  {
			$('select[name="' + key + '"]').next().remove('span');
		  }
		  $('input[name="' + key + '"]').after('<span class="text-danger"><strong>'+value+'</strong></span>');
		  $('select[name="' + key + '"]').after('<span class="text-danger"><strong>'+value+'</strong></span>');



	   });


   }
});

$(document).on('change','#quantity_change',function(){
    event.preventDefault();
	var url = $(this).parent('form').attr('action');
    var currentUrl = location.href;
    var form = '#'+$(this).parent('form').attr('id');
    var formData = new FormData($(form)[0]);
    var result = ajax('Post',url,'',true,false);
    if(result.success == "Added Successfully")
    {
         swal(result.success,
         {
           icon: "success",
           buttons: false,
           timer: 1500,
         });

         $('.cart-product').load(currentUrl+' #quantity_form');

     }

})

$('.edit-profile').on('dblclick',function(){
   event.preventDefault();
   $('input').prop("disabled", false); // Element(s) are now enabled.


});


/** countries governates cities ***/
  function getAJAX(url)
  {
    var results;
    $.ajax
      ({
      type: 'GET',
      url: url,
      dataType: 'json',
      data: {},
      async:false, //stop untill the ajax request done
      success: function (data)
      {
        console.log(data);
        results = data;
      },
      error:function(data)
      {
        console.log(data);
        results = data;
      }
      });
    //console.log(results);
    return results;
  }
  var language= $("html").attr("lang"); //get language from html set lang="en" or lang ="ar" if you don't set it

   /** countries **/
   var conutriesURL = 'http://api.geonames.org/countryInfoJSON?q=&country=&lang='+language+'&username=abdulnaser_mohsen'; //url that get your conuntries
   var countries = getAJAX(conutriesURL); // the importance of async test without aync or aync is true
   //console.log(countries);
   //console.log(countries.geonames);
   $(countries.geonames).each(function(index,item){
     //console.log(item.countryName , item.geonameId);
     var selectOption = $("<option>")
     selectOption.attr("value",item.geonameId).attr("data-value",item.countryName).append(item.countryName);
     $('#countryId').append(selectOption);
   });



     /** states **/
   $(document).on("change","#countryId",function(){

    $('.select').css('display','block');
    $('.chosen-city').remove();
    $('.chosen-country').remove();
    $('.chosen-state').remove();

     $('#stateId option:not(option:first)').remove(); // clear states
     $("[name='country']").val($(this).find('option:selected').attr("data-value"));
     var geonameid= $(this).val(); //get country id
     var statesURL = 'http://api.geonames.org/childrenJSON?lang='+language+'&geonameId='+geonameid+'&username=abdulnaser_mohsen'; //url that get your states



     var states = getAJAX(statesURL);
     console.log(states);
     //console.log(states.geonames);



     $(states.geonames).each(function(index,item){
       //console.log(item.name , item.geonameId);
       var selectOption = $("<option>")
       selectOption.attr("value",item.geonameId).attr("data-value",item.name).append(item.name);
       $('#stateId').append(selectOption);
     });
   });



   $(document).on("change","#stateId",function(){
     $('#cityId option:not(option:first)').remove(); // clear cities
     $("[name='state']").val($(this).find('option:selected').attr("data-value"));
     var geonameid= $(this).val(); //get country id
     var citiesURL = 'http://api.geonames.org/childrenJSON?lang='+language+'&geonameId='+geonameid+'&username=abdulnaser_mohsen'; //url that get your cities



     var cities = getAJAX(citiesURL);
     //console.log(cities);
     //console.log(cities.geonames);



     $(cities.geonames).each(function(index,item){
       //console.log(item.name , item.geonameId);
       var selectOption = $("<option>")
       selectOption.attr("value",item.geonameId).attr("data-value",item.name).append(item.name);
       $('#cityId').append(selectOption);
     });
   });

   $(document).on("change","#cityId",function(){
     $("[name='city']").val($(this).find('option:selected').attr("data-value"));
   });

});
