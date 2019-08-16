//
// Imports
//

import scrollto from '../modules/scrollto';


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
    const init = function () {
        scrollto();
    };


    // ------------------------------------
    // DOM should be ready, since js is
    //  getting loaded at the bottom
    //
    init();
}(window.SK = window.SK || {}));
