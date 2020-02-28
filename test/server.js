const express = require('express');
const app = express();

// app.use((req, res, next) => {
//     res.header('Access-Control-Allow-Origin', '*');

//     // authorized headers for preflight requests
//     // https://developer.mozilla.org/en-US/docs/Glossary/preflight_request
//     res.header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
//     next();

//     app.options('*', (req, res) => {
//         // allowed XHR methods  
//         res.header('Access-Control-Allow-Methods', 'GET, PATCH, PUT, POST, DELETE, OPTIONS');
//         res.send();
//     });
// });

// route GET /
app.get('/', (req, res) =>res.send('ok'))

app.listen(5000, () => {
    console.log('Server running on 5000...');
})