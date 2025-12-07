const express = require('express');
const session = require('express-session');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();
const PORT = 3000;

// Configuración
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'app/views'));
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Configuración de sesión
app.use(session({
    secret: 'secreto_gestion_eventos',
    resave: false,
    saveUninitialized: true,
    cookie: { secure: false }
}));

// Middleware para mensajes flash
app.use((req, res, next) => {
    res.locals.mensaje = req.session.mensaje;
    delete req.session.mensaje;
    next();
});

// Importar rutas
const eventosRoutes = require('./routes/eventos');
const lugaresRoutes = require('./routes/lugares');
const rolesRoutes = require('./routes/roles');
const asistentesRoutes = require('./routes/asistentes');

// Usar rutas
app.use('/eventos', eventosRoutes);
app.use('/lugares', lugaresRoutes);
app.use('/roles', rolesRoutes);
app.use('/asistentes', asistentesRoutes);

// Ruta principal
app.get('/', (req, res) => {
    res.redirect('/eventos');
});

// Ruta de prueba
app.get('/test', (req, res) => {
    res.send(`
        <p>Servidor Node.js + Express + MySQL funcionando.</p>
        <ul>
            <li><a href="/eventos">Eventos</a></li>
            <li><a href="/lugares">Lugares</a></li>
            <li><a href="/roles">Roles</a></li>
            <li><a href="/asistentes">Asistentes</a></li>
        </ul>
    `);
});

// Iniciar servidor
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});