const mysql = require('mysql2');

// Configuración de la base de datos
const config = {
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'gestion_eventos',
    waitForConnections: true,
    connectionLimit: 10,
    queueLimit: 0
};

console.log('Conectando a MySQL...');
console.log('Base de datos:', config.database);

const pool = mysql.createPool(config);

// Probar conexión
pool.getConnection((err, connection) => {
    if (err) {
        console.error('Error conectando a MySQL:', err.message);
    } else {
        console.log('Conexión a MySQL exitosa!');
        connection.release();
    }
});

const promisePool = pool.promise();
module.exports = promisePool;