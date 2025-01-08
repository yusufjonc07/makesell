const staticCacheName = 'site-static-v5'
const assets = [
    '/css/site.css',
    '/css/bootstrap.min.css',
    "/site/no-internet",
];

self.addEventListener('install', evt => {

    // Let us open our database
    
    evt.waitUntil(
        caches.open(staticCacheName).then(cache => {
            cache.addAll(assets)
        })
    )

});

// activate event
self.addEventListener('activate', evt => {
    evt.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(keys.filter(key => key !== staticCacheName).map(key => caches.delete(key)))
        })
    )
});

// fetch event
self.addEventListener('fetch', evt => {
    evt.respondWith(
        caches.match(evt.request).then(cacheRes => {
            return cacheRes || fetch(evt.request)
        }).catch(()=>caches.match("/site/no-internet"))
    )
});