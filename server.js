const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
const port = 3000;

// Middleware to parse JSON bodies
app.use(bodyParser.json());

// Database connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'mcis'
});

// Connect to database
db.connect((err) => {
    if (err) {
        throw err;
    }
    console.log('Connected to database');
});

// Route to handle adding a new customer
app.post('/addCustomer', (req, res) => {
    const { fullName, email, contact, type } = req.body;
    const customer = { fullName, email, contact, type };

    // Insert customer into database
    db.query('INSERT INTO customer SET ?', customer, (err, result) => {
        if (err) {
            console.error(err);
            res.status(500).json({ error: 'Failed to add customer' });
        } else {
            console.log('Customer added:', result);
            res.json({ message: 'Customer added successfully' });
        }
    });
});

// Start server
app.listen(port, () => {
    console.log(`Server running on port ${port}`);
});
