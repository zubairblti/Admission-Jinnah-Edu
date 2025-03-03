importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js');

if (workbox) {
console.log(`Yay! Workbox is loaded 🎉`);
} else {
console.log(`Boo! Workbox didn’t load 😬`);
}

workbox.routing.registerRoute(
new RegExp('/*'),
new workbox.strategies.NetworkFirst({
// Use a custom cache name.
cacheName: 'home',
})
);
