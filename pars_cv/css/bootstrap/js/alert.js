var close = document.getElementsByClassName("closebtn");
      var i;

      for (i = 0; i < close.length; i++) 
      {
        close[i].onclick = function()
        {
          var div = this.parentElement;
          div.style.opacity = "0";
          setTimeout(function()
                    {
                      div.style.display = "none"; 
                      window.location.href="#";
                    }, 600);
        }
      }

      function check()
      {
        var x = document.getElementById("check");
        while(x.checked == false)
        {
          x.checked = true;
        }
      }

