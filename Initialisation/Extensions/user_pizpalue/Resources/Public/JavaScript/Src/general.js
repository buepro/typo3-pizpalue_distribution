const upDomReady = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
}

(function ()  {
    upDomReady(() => {
        // Process
    });
})();
