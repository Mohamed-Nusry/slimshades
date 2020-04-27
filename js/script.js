
$(document).ready(function(){
  $('#userImg').mouseenter(function(){
    $('.UserDropdown').show();
  });

  $('.UserDropdown').mouseenter(function(){
    $(this).show();
  });

  $('.UserDropdown').mouseleave(function(){
    $(this).hide();
  });
});



$(function () {
  
  $('#qnty').keyup(function () {

    var price=$('#prodprice').val();
    
    var qnty=$('#qnty').val();
    if(qnty==""){
      var qnty=1;
    }else{

    }
    
    
    $.ajax({
      
      url: 'server/prod_cal.php',
      method:'post',
      data:{price,qnty},
      cache:false,
      success: function (data) {
        if(data=="1"){
          data=1;
        }else{

        }
        
        
        document.getElementById('totprice').value=(data);
      },
      error: function () {
        alert("ERROR");
      }
      
      
    });
  });
});

$('#colourRed').click(function(){
  document.getElementById('prodclrtxt').value="Red";
  $(this).css("border-style","solid");
  $('#colourBlue').css("border-style","none");
  $('#colourBlack').css("border-style","none");
  $(this).css("border-color","orange");
});
$('#colourBlack').click(function(){
  document.getElementById('prodclrtxt').value="Black";
  $(this).css("border-style","solid");
  $('#colourRed').css("border-style","none");
  $('#colourBlue').css("border-style","none");
  $(this).css("border-color","orange");
});
$('#colourBlue').click(function(){
  document.getElementById('prodclrtxt').value="Blue";
  $(this).css("border-style","solid");
  $('#colourBlack').css("border-style","none");
  $('#colourRed').css("border-style","none");
  $(this).css("border-color","orange");
});

$('#btnAdd').click(function(){

  var user="Mark";
  var product=$('#prodName').text();
  var Img=$('#prodImg').text();
  var Price=$('#prodprice').val();
  var productColour=$('#prodclrtxt').val();
  var prodsize=$('#prodSize').text();
  var prodDelivery=$('.delivery').text();
  var Quantity=$('#qnty').val();
  var productPrice=$('#totprice').val();
  var Payment=$('#payMethod').text();
  var Gurantee=$('#prodGurantee').text();
  var Logo=$('#logoName').text();
  
  
  $.ajax({
    url:'server/addToCart.php',
    method:'post',
    data:{user:user,product:product,Img:Img,Price:Price
      ,productColour:productColour,prodsize:prodsize,prodDelivery:prodDelivery,
      Quantity:Quantity,productPrice:productPrice,Payment:Payment,Gurantee:Gurantee,Logo:Logo},
      cache:false,
      success:function(res){
        $('#btnAdd').hide();
        $('<p id="cartInfo">ADDED TO THE CART</p>').insertAfter('#prodGurantee');
        var count= $('#cartCount').text();
        count++;
        $('#cartCount').text(count);
        
        
        
        
        
        
      }

    });
  
});




$(window).on('beforeunload', function() {
//Let jQuery take care of detecting browser and implement
WindowCloseHanlder();
});
function WindowCloseHanlder()
{
  location.href = 'server/clear_session.php'
}



// $('#imgSec').click(function(){
 
//   $('#imgShow').replaceWith(this);
//   $( "#imgSec" ).addClass( "myClass"); 
//   $('#imgThird').removeClass("myClass");
//   $('#imgFourth').removeClass("myClass");

// });


// $('#imgThird').click(function(){
  
 
//   $('#imgShow').replaceWith(this);
//   $( "#imgThird" ).addClass( "myClass");
//   $('#imgSec').removeClass("myClass");
//   $('#imgFourth').removeClass("myClass"); 
// });


// $('#imgFourth').click(function(){
 
  
 
//   $('#imgShow').replaceWith(this);
//   $( "#imgFourth" ).addClass( "myClass"); 
//   $('#imgSec').removeClass("myClass");
//   $('#imgThird').removeClass("myClass");
  
// });


$('#btncmnt').click(function(){

  
  var cmnt=document.getElementById("cmntText").value;
  var result=document.getElementById("result");
  var prodID=$('#productid').text();
  var info='Comment='+cmnt+'ProductID='+prodID;
  var usernme=$('#uname').text();
  var cmntimage=$('#cmntimg').text();

  
  $.ajax({
    type:"post",
    url:"server/Comment.php",
    data:{Comment:cmnt,ProductID:prodID},
    success:function(value){
     
    // <img width="50px" src="Images/users/<?php echo $userImage ?>">
     // <label style=" font-weight: bold"><?php echo $user ?></label>
     // <label style="margin-left: 50px; font-weight: bold"><?php echo $Comment ?></label>

  //    result.innerHTML=(value);
     // $('<img width="50px" src="Images/users/user.png">').insertAfter('.cmntPosted  '); //fix here

     $('<br><br> <div class="cmntPosted1" style="border-style: solid;"><br><img width="50px" src="Images/users/'+cmntimage+' ?>"><label id="uimg" style=" font-weight: bold"></label><label id="cmntpostsub" style="margin-left: 50px; font-weight: bold"></label><br><br></div><br><h4> Your comment has been posted </h4>').insertAfter('#btncmnt');
     uimg.innerHTML=(usernme+" - "); 
     cmntpostsub.innerHTML=(value);

   }
 });
});


$('#btnPurchase').click(function(){
  $('.divPurchase').hide();
  $('<h1 style="font-weight:bold;">You have successfully purchased your product</h1>').insertAfter('.divPurchase');


});

$('#searchProd').on('keypress',function(e) {
  if(e.which == 13) {
    var search=$(this).val();
    window.location.href="Search.php?search="+search;
  }
});
$(document).ready(function(){



  var lblchtname=$('#lblchtname').text();
  var lblchtmsg=$('#lblchtmsg').text();
  var lblchtTime=$('#lblchtTime').text();
  var cmntCount=$('#cmntCount').text();

  

  function make_chat_dialog_box(to_user_id, to_user_name){
    var modal_content = '<div id="user_dialog_'+to_user_id+'"class="user_dialog" title="You have chat with '+to_user_name+'">';

    modal_content +='<label id="chtTonme">'+to_user_name+'</label>'

    modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px; class="chat_history" data-touserid="'+to_user_id+'" class="chat_messagebx" id="chat_history_'+to_user_id+'">';
    
    
    
    modal_content+='<div class="chtmsg_'+to_user_name+' chtmsg"></div>';

    modal_content+='<div class="chtnewdiv"></div>';
    
    modal_content+='</div>';
 

    modal_content += '<div class="form-group">';
    modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message" class="form-control chat_messagebox"></textarea>';
    modal_content += '</div><div class="form-group" align="right">';
    modal_content += '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div</div>';
    
    $('#user_model_details').html(modal_content);

  }


//$('.start_chat').click(function(){
  $(document).on('click', '.start_chat', function(){
    var to_user_id=$(this).data('touserid');
    var to_user_name=$(this).data('tousername');
  //
 // alert('abc');

 make_chat_dialog_box(to_user_id,to_user_name);
 $("#user_dialog_"+to_user_id).dialog({
  autoOpen:false,
  width:400
});
 $('#user_dialog_'+to_user_id).dialog('open');
 //setupRefresh();

uchatName=$('#chtTonme').text();

function refresh() {
 rec_chat(to_user_name);
 //$('#chtnewdiv').hide();
 $('.chtnewdiv').hide();
  //rec_chat(uchatName);

  setTimeout(refresh, 10000);

 }

refresh();


});
});



 
function rec_chat(to_user_name){
 //var ChattoName=$(this).data('tousername');
 var ChattoName=to_user_name;
 //alert(ChattoName);

 $.ajax({
  type:"post",
  url:"server/rec_chat.php",
  data:{chtToname:ChattoName},
  success:function(value){
    
    
//alert(value);
    $('.chtmsg_'+to_user_name).html(value);
    


  }
});
   //alert('ok');
 // setTimeout(rec_chat(ChattoName), 5000);
}
 


 function fetch_chat_data(){
  var chtname=$('#lblchtname').text();
  var chtusername=$('#lblchtusername').text();
  var chtmessage=$('#chat_message').val();
  var chtTime=new Date();
  var chtTo=$('#chtTonme').text();

alert(chtname);
 

 var divnme="#chtnewdiv";
 $.ajax({
  type:"post",
  url:"server/fetch_chat.php",
  data:{Divnme:divnme,chatname:chtname,chatTo:chtTo,chatmessage:chtmessage,chatTime:chtTime},
  success:function(value){
  $('.chtnewdiv').show();
  $('.chtnewdiv').html('<div id="#chtnewdiv"><label id="lblchtname">You - </label><label id="lblchtmsg">'+chtmessage+'</label><br><label id="lblchtTime">'+chtTime+'<br></label></div>');
  //$('.chtnewdiv').html(value);
  $('#chat_message').val("");
  }
});
}


//window.onload = setupRefresh;
function setupRefresh()
{

        setInterval("refreshBlock();",115000);
     }
     
     function refreshBlock()
     {

       var elem = document.getElementsByClassName('chat_messagebx');
        //var elem = document.getElementById('chat_messagebx');
      //var elem= $('.chatbox');
       // alert(elem.scrollTop);
       //  if(elem.scrollHeight==null || elem.scrollHeight==""){
       //   // elem.scrollHeight=100;
       //  alert("null");
       // }else{
          alert(elem.scrollHeight);
       // }
       
       elem.scrollTop = elem.scrollHeight;
     

       
       
     }

    




     
     
// var count = 0;

// function refresh() {

// //your stuff to refresh your divs here (ajax requests...)

//   $("#chtbx").html(count);
//   count++;
//   setTimeout(refresh, 1000);
// }

// refresh();
// $('.send_chat').click(function(){
//   var chtname=$('#lblchtname').text();
//   var chtmessage=$('#chat_msg').val();
//    var chtTime=new Date();
//    alert('a');

// $('<div id="#chtnewdiv"><label id="lblchtname">'+chtname+'</label><label id="lblchtmsg">'+chtmessage+'</label><br><label id="lblchtTime">'+chtTime+'<br></label></div>').append('.chtmsg');
//   });

$(document).on('click', '.send_chat', function(){
  fetch_chat_data();
  //$('#chtnewdiv').hide();



  
});

$(document).on('click', '#snd_cht', function(){
 // $('#chtnewdiv').hide(1000);
 // $('#chtnewdiv').append("");



  
});
