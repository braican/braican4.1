(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

/**
 * Get the Y position of the element we're scrolling to.
 * @param {Element} el What we're trying to get the Y position of
 */
var elYPosition = function elYPosition(el) {
    var y = el.offsetTop;
    var node = el;
    while (node.offsetParent && node.offsetParent !== document.body) {
        node = node.offsetParent;
        y += node.offsetTop;
    }return y;
};

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
