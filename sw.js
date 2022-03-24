
let filesToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/assets/img/icons/android-icon-36x36.png',
    '/assets/img/icons/android-icon-48x48.png',
    '/assets/img/icons/android-icon-72x72.png',
    '/assets/img/icons/android-icon-96x96.png',
    '/assets/img/icons/android-icon-144x144.png',
    '/assets/img/icons/android-icon-192x192.png',
];

// install
self.addEventListener("install", e =>{
    e.waitUntil(
        caches.open("static").then(cache => {
            return cache.addAll(filesToCache);
        })
    )
});

// Serve from Cache
self.addEventListener("fetch", e => {
    e.respondWith(
        caches.match(e.request)
            .then(response => {
                return response || fetch(e.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});