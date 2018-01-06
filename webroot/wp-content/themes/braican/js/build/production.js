(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});


function elYPosition(el) {
    var y = el.offsetTop;
    var node = el;
    while (node.offsetParent && node.offsetParent !== document.body) {
        node = node.offsetParent;
        y += node.offsetTop;
    }return y;
}

// function scrollIt(yPos) {
//     window.scrollTo(0, yPos);
// }

// function smoothScroll(el) {
//     const startY = window.pageYOffset;
//     const stopY = elmYPosition(el);
//     const distance = stopY > startY ? stopY - startY : startY - stopY;
//     if (distance < 100) {
//         window.scrollTo(0, stopY); return;
//     }
//     let speed = Math.round(distance / 100);
//     if (speed >= 40) speed = 40;
//     const step = Math.round(distance / 25);
//     let leapY = stopY > startY ? startY + step : startY - step;
//     let timer = 1;
//     if (stopY > startY) {
//         for (let i = startY; i < stopY; i += step) {
//             console.log(leapY);
//             // window.scrollTo(0, leapY);
//             setTimeout(() => {
//                 scrollIt(leapY);
//             }, timer * speed);
//             leapY += step;
//             if (leapY > stopY) leapY = stopY;
//             timer += 1;
//         }
//         return;
//     }
//     for (let i = startY; i > stopY; i -= step) {
//         // setTimeout(window.scrollTo(0, leapY), timer * speed);
//         // setTimeout('window.scrollTo(0, ' + leapY + ')', timer * speed);
//         leapY -= step;
//         if (leapY < stopY) leapY = stopY;
//         timer += 1;
//     }
// }

/**
 * Loop scrolling animation
 */
// function loopAnimateScroll(timestamp) {

//     pattern = percentage < 0.5 ? 4 * percentage * percentage * percentage : (percentage - 1) * (2 * percentage - 2) * (2 * percentage - 2) + 1; // acceleration until halfway, then deceleration

//     if (!start) { start = timestamp; }
//     timeLapsed += timestamp - start;
//     percentage = (timeLapsed / parseInt(animateSettings.speed, 10));
//     percentage = (percentage > 1) ? 1 : percentage;
//     position = startLocation + (distance * easingPattern(animateSettings, percentage));
//     window.scrollTo(0, Math.floor(position));
//     if (!stopAnimateScroll(position, endLocation)) {
//         window.requestAnimationFrame(loopAnimateScroll);
//         start = timestamp;
//     }
// };

// function smoothScrollTo(el) {
//     const startY = window.pageYOffset;
//     const stopY = elYPosition(el);

//     let timer = 0;

//     for (let i = startY; i < stopY; i += 4) {
//         setTimeout(() => {
//             window.scrollTo(0, i);
//         }, timer * 2);

//         timer += 1;
//     }
// }

/**
 * Determine the document's height
 * @returns {Number}
 */
var getDocumentHeight = function getDocumentHeight() {
    return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight);
};

/**
 * Calculate the easing pattern
 * @link https://gist.github.com/gre/1650294
 * @param {String} type Easing pattern
 * @param {Number} time Time animation should take to complete
 * @returns {Number}
 */
var easingPattern = function easingPattern(time) {
    // acceleration until halfway, then deceleration
    return time < 0.5 ? 4 * time * time * time : (time - 1) * (2 * time - 2) * (2 * time - 2) + 1;
};

function smoothScrollTo(el) {
    var startY = window.pageYOffset;
    var stopY = elYPosition(el);
    var distance = stopY - startY;
    var documentHeight = getDocumentHeight();

    var speed = 600;

    var timeLapsed = 0;
    var start = void 0;
    var percentage = void 0;
    var position = void 0;
    var animationInterval = void 0;

    /**
     * Cancel a scroll-in-progress
     */
    var cancelScroll = function cancelScroll() {
        // clearInterval(animationInterval);
        cancelAnimationFrame(animationInterval);
    };

    /**
     * Stop the scroll animation when it reaches its target (or the bottom/top of page)
     * @param {Number} position Current position on the page
     * @param {Number} endLocation Scroll to location
     * @param {Number} animationInterval How much to scroll on this loop
     */
    var stopAnimateScroll = function stopAnimateScroll(pos, endLocation) {
        // Get the current location
        var currentLocation = window.pageYOffset;

        // Check if the end location has been reached yet (or we've hit the end of the document)
        if (pos === endLocation || currentLocation === endLocation || (startY < endLocation && window.innerHeight + currentLocation) >= documentHeight) {
            // Clear the animation timer
            cancelScroll();

            // Reset start
            start = null;

            return true;
        }

        return false;
    };

    /**
     * Loop scrolling animation
     */
    var loopAnimateScroll = function loopAnimateScroll(timestamp) {
        if (!start) {
            start = timestamp;
        }
        timeLapsed += timestamp - start;
        percentage = timeLapsed / parseInt(speed, 10);
        percentage = percentage > 1 ? 1 : percentage;
        position = startY + distance * easingPattern(percentage);
        window.scrollTo(0, Math.floor(position));
        if (!stopAnimateScroll(position, stopY)) {
            window.requestAnimationFrame(loopAnimateScroll);
            start = timestamp;
        }
    };

    window.requestAnimationFrame(loopAnimateScroll);
}

function init_scrollto() {
    var anchors = document.querySelectorAll('a[href^="#"]');

    anchors.forEach(function (anchor) {
        anchor.addEventListener('click', function (event) {
            event.preventDefault();
            var href = this.getAttribute('href').slice(1);
            var scrollToEl = document.getElementById(href);
            if (scrollToEl) {
                smoothScrollTo(scrollToEl);
            }
        });
    });
}

exports.default = init_scrollto;

},{}],2:[function(require,module,exports){
'use strict';

var _scrollto = require('../modules/scrollto');

var _scrollto2 = _interopRequireDefault(_scrollto);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

//
// namespace - SK
//

(function (SK) {
    /* --------------------------------------------
     * --public
     * -------------------------------------------- */

    //
    // init the things
    //
    var init = function init() {
        (0, _scrollto2.default)();
    };

    // ------------------------------------
    // DOM should be ready, since js is
    //  getting loaded at the bottom
    //
    init();
})(window.SK = window.SK || {}); //
// Imports
//

},{"../modules/scrollto":1}]},{},[2])

//# sourceMappingURL=production.js.map
