document.addEventListener("DOMContentLoaded", function() {
  var hide = document.getElementById('searchify');
console.log(hide);

hide.addEventListener("click", function(){


      if(document.getElementById('hide').style.display == 'none'){
      document.getElementById('hide').style.display = 'block';
      }
        else {

            document.getElementById('hide').style.display = 'none';
        }
});

  });
