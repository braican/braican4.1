
/**
 * Get the Y position of the element we're scrolling to.
 * @param {Element} el What we're trying to get the Y position of
 */
const elYPosition = (el) => {
    let y = el.offsetTop;
    let node = el;
    while (node.offsetParent && node.offsetParent !== document.body) {
        node = node.offsetParent;
        y += node.offsetTop;
    } return y;
};


/**
 * Determine the document's height
 * @returns {Number}
 */
const getDocumentHeight = function () {
    return Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight,
    );
};


/**
 * Calculate the easing pattern
 * @link https://gist.github.com/gre/1650294
 * @param {String} type Easing pattern
 * @param {Number} time Time animation should take to complete
 * @returns {Number}
 */
const easingPattern = function (time) {
    // acceleration until halfway, then deceleration
    return time < 0.5 ? 4 * time * time * time : (time - 1) * (2 * time - 2) * (2 * time - 2) + 1;
};

function smoothScrollTo(el) {
    const startY = window.pageYOffset;
    const stopY = elYPosition(el);
    const distance = stopY - startY;
    const documentHeight = getDocumentHeight();

    const speed = 600;

    let timeLapsed = 0;
    let start;
    let percentage;
    let position;
    let animationInterval;


    /**
     * Cancel a scroll-in-progress
     */
    const cancelScroll = function () {
        // clearInterval(animationInterval);
        cancelAnimationFrame(animationInterval);
    };

    /**
     * Stop the scroll animation when it reaches its target (or the bottom/top of page)
     * @param {Number} position Current position on the page
     * @param {Number} endLocation Scroll to location
     * @param {Number} animationInterval How much to scroll on this loop
     */
    const stopAnimateScroll = function (pos, endLocation) {
        // Get the current location
        const currentLocation = window.pageYOffset;

        // Check if the end location has been reached yet (or we've hit the end of the document)
        if (
            pos === endLocation ||
            currentLocation === endLocation ||
            ((startY < endLocation && window.innerHeight + currentLocation) >= documentHeight)
        ) {
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
    const loopAnimateScroll = function (timestamp) {
        if (!start) { start = timestamp; }
        timeLapsed += timestamp - start;
        percentage = (timeLapsed / parseInt(speed, 10));
        percentage = (percentage > 1) ? 1 : percentage;
        position = startY + (distance * easingPattern(percentage));
        window.scrollTo(0, Math.floor(position));
        if (!stopAnimateScroll(position, stopY)) {
            window.requestAnimationFrame(loopAnimateScroll);
            start = timestamp;
        }
    };

    window.requestAnimationFrame(loopAnimateScroll);
}


function init_scrollto() {
    const anchors = document.querySelectorAll('a[href^="#"]');

    anchors.forEach((anchor) => {
        anchor.addEventListener('click', function (event) {
            event.preventDefault();
            const href = this.getAttribute('href').slice(1);
            const scrollToEl = document.getElementById(href);
            if (scrollToEl) {
                smoothScrollTo(scrollToEl);
            }
        });
    });
}

export default init_scrollto;
