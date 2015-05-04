/* get the value from the URL parameter
 * JavaScript has nothing built in for handling query string parameters.
 * We could access location.search,
 * which would give you from the ? character on to the end of the fragment identifer (#foo),
 * whichever came first.
 */
var QueryString = function () {
};
QueryString.prototype.getParameters = function (url) {
    // This function is anonymous, is executed immediately and
    // the return value is assigned to QueryString!
    var query_string = {};

    var query = url.split("?")[1];
    if (typeof query === "undefined") {
        console.log("URL don't have parameters\nURL: " + url);
        return;
    }

    var vars = query.split("&");
    if (typeof vars === "undefined") {
        vars = query;
    }
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        // If first entry with this name
        if (typeof query_string[pair[0]] === "undefined") {
            query_string[pair[0]] = pair[1];
            // If second entry with this name
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [query_string[pair[0]], pair[1]];
            query_string[pair[0]] = arr;
            // If third or later entry with this name
        } else {
            query_string[pair[0]].push(pair[1]);
        }
    }
    return query_string;
};

/*
 * get array of menu and set menu active
 */
function activeMenu() {
    var url = new QueryString();
    //get parameters in address bar
    var urlParameters = url.getParameters(window.location.href);

    var menuItemLink = document.querySelectorAll(".accordion_menu .menu-item-link");
    if (menuItemLink !== null) {
        for (var i = 0; i < menuItemLink.length; i++) {
            var parameters = url.getParameters(menuItemLink[i].getAttribute("href"));
            if (typeof parameters !== "undefined" && urlParameters.page == parameters.page) {
                menuItemLink[i].parentElement.parentElement.parentElement.classList.add("active");
            }
        }
    }
}

// add event handler realization
var addEvent = (function () {
    if (document.addEventListener) {
        return function (el, type, fn) {
            if (el && el.nodeName || el === window) {
                el.addEventListener(type, fn, false);
            } else if (el && el.length) {
                for (var i = 0; i < el.length; i++) {
                    addEvent(el[i], type, fn);
                }
            }
        };
    } else {
        return function (el, type, fn) {
            if (el && el.nodeName || el === window) {
                el.attachEvent('on' + type, function () {
                    return fn.call(el, window.event);
                });
            } else if (el && el.length) {
                for (var i = 0; i < el.length; i++) {
                    addEvent(el[i], type, fn);
                }
            }
        };
    }
})();

// variables
var aLoops = []; // sound loops

// initialization
addEvent(window, 'load', function (event) {

    // load music files
    aLoops[0] = new Audio('media/background.ogg');
    aLoops[0].volume = 0.3;
    aLoops[1] = new Audio('media/button.ogg');
    aLoops[1].volume = 1.0;
    aLoops[2] = new Audio('media/button_click.ogg');
    aLoops[2].volume = 1.0;

    aLoops[0].addEventListener('ended', function () { // loop background sound
        this.currentTime = 0;
        this.play();
    }, false);
    aLoops[0].play();
});

// all the buttons
var aBtns = document.querySelectorAll('#nav li');

// onmouseover event handler
addEvent(aBtns, 'mouseover', function (event) {
    aLoops[1].currentTime = 0;
    aLoops[1].play(); // play click sound
});

// onmouseout event handler
addEvent(aBtns, 'mouseout', function (event) {
    aLoops[1].currentTime = 0;
    aLoops[1].pause(); // play click sound
});

// onclick event handler
addEvent(aBtns, 'click', function (event) {
    aLoops[2].currentTime = 0;
    aLoops[2].play(); // play click sound
});

function addEventListeners() {
    document.addEventListener("DOMContentLoaded", function () {
        activeMenu();
    });
}

addEventListeners();