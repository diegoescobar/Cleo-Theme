// ( function( $ ) {
    const loadBtn = document.querySelector(".load-more-btn");
    const loadLnk = document.querySelector('.load-more-link');

    loadBtn.addEventListener("click", loadMorePostsBTN);
    loadLnk.addEventListener("click", loadMorePostsLNK);

    function loadMorePostsBTN(e){
        e.preventDefault();
        loadBTN();
    }
    function loadMorePostsLNK(e){
        e.preventDefault();

        var lnk = loadLnk.getAttribute('href');
        loadLNK( lnk );
    }

    function loadBTN() {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            document.querySelector(".content-row").innerHTML = xhttp.responseText;
            }
        };
        var data = {
            'page' : 2,
            'paged': 2,
        }

        xhttp.open("GET", "/wp-admin/admin-ajax.php", true);
        xhttp.send( data );
    }

    function loadLNK( lnk ) {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
                document.querySelector(".content-row").innerHTML = xhttp.responseText;
            }
        };

        /*var data = {
            'page' : 2,
            'paged': 2,
        }*/

        xhttp.open("GET", lnk, true);
        // xhttp.send( data );
    }
