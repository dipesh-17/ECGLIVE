<script>
        var form1 = document.getElementById('form1');
        var form2 = document.getElementById('form2');
       
        var next1 = document.getElementById('next1');
        
        var back1 = document.getElementById('back1');
       

        var progress = document.getElementById('progress');

        var x = window.matchMedia("(max-width: 900px)");

        next1.onclick = function () {
            form1.style.left = "-100%";
            progress.style.width = "100%";

            if (x.matches) { // If media query matches
                form2.style.left = "0%";
            } else {
                form2.style.left = "15%";
            }
        }

        back1.onclick = function () {
            // form1.style.left = "15%";
            form2.style.left = "100%";
            progress.style.width = "50%";
            if (x.matches) { // If media query matches
                form1.style.left = "0%";
            } else {
                form1.style.left = "15%";
            }
        }
</script>
