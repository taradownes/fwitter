$(document).ready(() => {
  $(".delete").click((e) => {
    let id = {id: event.target.id};

    $.ajax({
      method: "POST",
      url: "delete.php",
      data: id,
      cache: false,
      success: function(result){
        console.log(result);
        setTimeout(() => {window.location.replace('posts.php')}, 2000);
      }
    })

  });


  $(".update").click((e) => {
    let id = e.target.id;
    let post = $("#" + id).children(".post").text();
    let title = $("#" + id).children(".post_title").text();

    let data = {
      id: id,
      post: post,
      title: title
    }
   
    $("#update" + id).slideToggle();
    // $("button")
    // $.ajax({
    //   method: "POST",
    //   url: "server.php",
    //   data: data,
    //   cache: false,
    //   success: function(result){
    //     console.log("yoooooo", result);
       

    //   }
    // })

  });

  //  $("#update-post").val(post);
  // $("#update-title").val(title);

  $("input[name=submit]").click((e) => {
    e.preventDefault();
    let name = $("#name").val();
    let email = $("#email").val();
    let password = $('#password').val();
    let gender = $('input[name="gender"]:checked').val();
    
    let data = {
        name: name,
        email: email,
        password: password,
        gender: gender
      };

    $.ajax({
        method: "POST",
        url: "process.php",
        data: data,
        cache: false,
        success: function(result){
          console.log(result);
        }
      })
  });

 

  $("input[name=submit-post]").click((e) => {
    e.preventDefault();
    let post = $("#post").val();
    let title = $("input[name=title]").val();
    
    let data = {
        post: post,
        title: title,
      };

    $.ajax({
        method: "POST",
        url: "create.php",
        data: data,
        cache: false,
        success: function(result){
          console.log("HERE IT IS",result);
          window.location.replace('posts.php');
        }
      })
  });

  $("input[name=submit-update]").click((e) => {
    e.preventDefault();
    let id = parseInt(e.target.id);
    let title = $("#update-title").val();
    let post = $("#update-post").val();
    
    let data = {
        id: id,
        post: post,
        title: title,
      };
      console.log(data)
    $.ajax({
        method: "POST",
        url: "server.php",
        data: data,
        cache: false,
        success: function(result){
          console.log("HERE IT IS",result);
        }
      })
       setTimeout(()=> { 
         window.location.replace('posts.php');
       }, 500);
    });
  
    $('#add-post').click(() => {
      $('.create-post').slideToggle();
    })

})