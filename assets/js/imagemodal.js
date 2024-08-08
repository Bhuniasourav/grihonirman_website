
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("myModal");
    var modal1 = document.getElementById("myModal1");

    var img = document.getElementById("myImg");
    var img1 = document.getElementById("myImg1");

    var modalImg = document.getElementById("img01");
    var modalImg1 = document.getElementById("img011");

    var captionText = document.getElementById("caption");
    var captionText1 = document.getElementById("caption1");

    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    img1.onclick = function(){
        modal1.style.display = "block";
        modalImg1.src = this.src;
        captionText1.innerHTML = this.alt;
    }

    var span = document.getElementsByClassName("close")[0];
    var span1 = document.getElementsByClassName("close")[1];

    span.onclick = function() {
        modal.style.display = "none";
    }

    span1.onclick = function() {
        modal1.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
});