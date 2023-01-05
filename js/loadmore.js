// ( function( $ ) {
    const loadBtn = document.querySelector(".load-more-btn");
    const loadLnk = document.querySelector('.load-more-link');

    loadBtn.addEventListener("click", loadMorePostsBTN);
    loadLnk.addEventListener("click", loadMorePostsLNK);

    function loadMorePostsBTN(e){
        e.preventDefault();
        loadBTN(e);
    }
    function loadMorePostsLNK(e){
        e.preventDefault();
        console.log( e );

        var lnk = loadLnk.getAttribute('href');
        console.log( lnk );
        loadLNK( lnk );
    }

    function loadBTN( event ) {
        var splitURL = window.location.pathname.split('/');
        var joinedURL;

        if (splitURL[splitURL.length - 2] == "gallery"){
            joinedURL = splitURL.join('/') + 'page/2/';
        } else {
            splitURL[splitURL.length - 2] = parseInt(splitURL[splitURL.length - 2]) + 1;
            joinedURL = splitURL.join('/');
        }

        let nextURL = window.location.origin + joinedURL;
        const nextTitle = 'Ajax Load More';
        const nextState = { additionalInformation: 'Updated the URL with JS' };
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.querySelector(".content-row").innerHTML += xhttp.response.querySelector(".content-row").innerHTML;
                window.history.pushState(nextState, nextTitle, nextURL);

                window.history.replaceState(nextState, nextTitle, nextURL);

            }
        };

        xhttp.open("POST", joinedURL, true);
        xhttp.responseType = "document";
        xhttp.send( );

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
